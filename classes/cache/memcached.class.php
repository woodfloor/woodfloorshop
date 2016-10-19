<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */

if (!defined('CC_INI_SET')) die('Access Denied');

require CC_ROOT_DIR.'/classes/cache/cache.class.php';

/**
 * Cache specific class
 *
 * @author Al Brookbanks
 * @since 6.0.0
 */
class Cache extends Cache_Controler {

	##############################################

	final protected function __construct() {
		
		global $glob;

		$this->_mode = 'Memcached';
		$this->_memcached = new memcached;
	
		$memcache_servers = isset($glob['memcached_servers']) ? $glob['memcached_servers'] : array(array('127.0.0.1',11211));

		$this->_memcached->setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE, true);
		if (!count($this->_memcached->getServerList())) {
		    $this->_memcached->addServers($memcache_servers);
		}

		//Run the parent constructor
		parent::__construct();
	}
	
	public function __destruct() {
		if($this->_empties_added) $this->write($this->_empties, $this->_empties_id);
	}

	/**
	 * Setup the instance (singleton)
	 *
	 * @return instance
	 */
	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	//=====[ Public ]=======================================

	/**
	 * Clear the cache
	 *
	 * @param string $type Cache type prefix
	 * @return bool
	 */
	public function clear($type = '') {
		//Get the current cache IDs
		$this->getIDs();

		if (!empty($type)) {
			$type = strtolower($type);
			$len = strlen($type);
		}

		$return = true;
		if (!empty($this->_ids)) {
			//Loop through each id to delete it
			foreach ($this->_ids as $id) {
				//If there is a type we need to only delete that
				if (!empty($type)) {
					if (substr($id, 0, $len) == $type) {
						if (!$this->delete($id)) {
							$return = false;
						}
					}
				} else {
					//If no type delete every id
					if (!$this->delete($id)) {
						$return = false;
					}
				}
			}
		}
		return $return;
	}

	/**
	 * Remove a single item of cache
	 *
	 * @param string $id Cache identifier
	 * @return bool
	 */
	public function delete($id) {
	
		return $this->_memcached->delete($this->_makeName($id));
	}

	/**
	 * Check to see if the cache file exists
	 *
	 * @param string $id Cache identifier
	 * @return bool
	 */
	public function exists($id) {
		if(!$this->status) return false;
		
		if(!$this->_memcached->get($this->_makeName($id))) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Get all the cache ids
	 *
	 * @return array
	 */
	public function getIDs() {
		if (empty($this->_ids)) {
		    $keys = $this->_memcached->getAllKeys(); 
		    if(is_array($keys)) {
		    	foreach($keys as $key) {                
                	$this->_ids[] = str_replace(array($this->_prefix, $this->_suffix), '', $key); 
		    	}
			}
		}
		return $this->_ids;
	}
	
	/**
	 * Get the cached data
	 *
	 * @param string $id Cache identifier
	 * @return data/false
	 */
	public function read($id) {

		if(!$this->status) return false;
		
		if(preg_match('/^sql\./',$id) && $this->_empties_id!==$id && isset($this->_empties[$id])) {
			return array('empty' => true, 'data' => $this->_empties[$id]);
		}

		//Setup the name of the cache
		$name = $this->_makeName($id);

		//Make sure the cache file exists
		if ($this->_memcached->get($name)) {
			$contents = $this->_memcached->get($name);
			if (!empty($contents)) {
				//Remove base64 & serialization
				return $contents;
			}
		}

		return false;
	}

	/**
	 * Calculates the cache usage
	 *
	 * @return string
	 */
	public function usage() {
		$stats = $this->_memcached->getStats();
		if(is_array($stats)) {
			$output = '';
			foreach($stats as $server => $data) {
				$output .= $this->_printStats($server,$data);
			}
			return $output;
		} else {
			return "No stats available for memcached.";
		}
	}

	/**
	 * Write cache data
	 *
	 * @param mixed $data Data to write to the file
	 * @param string $id Cache identifier
	 * @param int $expire Force a time to live
	 * @return bool
	 */
	public function write($data, $id, $expire = '') {

		if(!$this->status) return false;
		
		if(preg_match('/^sql\./',$id) && $this->_empties_id!==$id && empty($data)) {
			if(!isset($this->_empties[$id])) {
				$this->_empties[$id] = $data;
				$this->_empties_added = true;
			}
			return false;
		}

		$name = $this->_makeName($id);

		//Write to file
		if ($this->_memcached->set($name, $data, (!empty($expire) && is_numeric($expire)) ? $expire : $this->_expire)) {
			return true;
		}
		trigger_error('Cache data not written (Memcached).', E_USER_WARNING);

		return false;
	}

	//=====[ Private ]=======================================

	/**
	 * Get empty cache queries
	 */
	protected function _getEmpties() {
		$this->_setPrefix();
		$this->_empties = $this->read($this->_empties_id);
	}
	/**
	 * Return string of stats for output
	 */
	private function _printStats($server, $data){ 

		$output = '';
		
		$output .= "<table border='1'>";
		$output .= "<thead><tr><th colspan='2'>Server: ".$server."</th></tr></thead>";
        $output .= "<tbody><tr><td>Memcache Server version:</td><td> ".$data["version"]."</td></tr>"; 
        $output .= "<tr><td>Process id of this server process </td><td>".$data["pid"]."</td></tr>"; 
        $output .= "<tr><td>Number of seconds this server has been running </td><td>".$data["uptime"]."</td></tr>";
        $output .= "<tr><td>Accumulated user time for this process </td><td>".$data["rusage_user_seconds"]." seconds</td></tr>"; 
        $output .= "<tr><td>Accumulated system time for this process </td><td>".$data["rusage_system_seconds"]." seconds</td></tr>"; 
        $output .= "<tr><td>Total number of items stored by this server ever since it started </td><td>".$data["total_items"]."</td></tr>"; 
        $output .= "<tr><td>Number of open connections </td><td>".$data["curr_connections"]."</td></tr>"; 
        $output .= "<tr><td>Total number of connections opened since the server started running </td><td>".$data["total_connections"]."</td></tr>"; 
        $output .= "<tr><td>Number of connection structures allocated by the server </td><td>".$data["connection_structures"]."</td></tr>"; 
        $output .= "<tr><td>Cumulative number of retrieval requests </td><td>".$data["cmd_get"]."</td></tr>"; 
        $output .= "<tr><td> Cumulative number of storage requests </td><td>".$data["cmd_set"]."</td></tr>"; 

        $percCacheHit=((real)$data["get_hits"]/ (real)$data["cmd_get"] *100); 
        $percCacheHit=round($percCacheHit,3); 
        $percCacheMiss=100-$percCacheHit; 

        $output .= "<tr><td>Number of keys that have been requested and found present </td><td>".$data["get_hits"]." ($percCacheHit%)</td></tr>"; 
        $output .= "<tr><td>Number of items that have been requested and not found </td><td>".$data["get_misses"]." ($percCacheMiss%)</td></tr>"; 
        $MBRead= (real)$data["bytes_read"]/(1024*1024); 
        $output .= "<tr><td>Total number of bytes read by this server from network </td><td>".$MBRead." Mega Bytes</td></tr>"; 
        $MBWrite=(real) $data["bytes_written"]/(1024*1024) ; 
        $output .= "<tr><td>Total number of bytes sent by this server to network </td><td>".$MBWrite." Mega Bytes</td></tr>"; 
        $MBSize=(real) $data["limit_maxbytes"]/(1024*1024) ; 
        $output .= "<tr><td>Number of bytes this server is allowed to use for storage.</td><td>".$MBSize." Mega Bytes</td></tr>"; 
        $output .= "<tr><td>Number of valid items removed from cache to free memory for new items.</td><td>".$data["evictions"]."</td></tr>"; 
		$output .= "</tbody></table>"; 
		return $output;
    }
}