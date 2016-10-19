<?php
if(!defined('CC_DS')) die('Access Denied');

if(isset($_POST['basket_add']) && $_POST['basket_add']==1){
	$GLOBALS['debug']->supress();
	$reload_url = $GLOBALS['rootRel'].'index.php?_a=basket';
	die($GLOBALS['seo']->rewriteUrls("Redir:".$reload_url, true));
}