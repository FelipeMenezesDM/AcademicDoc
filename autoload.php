<?php
function autoLoadFunction($class) {
	
	$class = ROOT . SEP . str_replace ("\\", SEP, $class) . ".php";
	
	if( !file_exists($class) )
		throw new Exception("Error in \"{$class}\", file path not found.");
	else
		require_once($class);
	
}

spl_autoload_register( 'autoLoadFunction' );