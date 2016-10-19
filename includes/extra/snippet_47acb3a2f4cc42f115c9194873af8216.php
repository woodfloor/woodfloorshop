<?php
if(!$GLOBALS['session']->has('prices_with_and_without_tax')) {
$GLOBALS['session']->set('prices_with_and_without_tax', 1);
}