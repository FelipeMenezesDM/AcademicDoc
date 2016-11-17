<?php

function get_page( $print = true ) {
	
	$page = "home";
	
	if( isset( $_GET[ "page" ] ) && !empty( $_GET[ "page" ] ) ) {
	
		$page_value =  trim( $_GET[ "page" ] );
		
		if( file_exists( "pages/" . $page_value . ".php" ) ) {
			$page = $page_value;
		}
		
	}
	
	if( (boolean)$print )
		include_once( "pages/" . $page . ".php" );
	else
		return $page;
	
}

function get_title() {
	
	$sitename = "AcademicDoc";
	
	$title = array(
		"contact" => "Contato",
		"about"   => "Quem somos",
		"help"    => "Ajuda"
	);
	
	$page = get_page( false );
	
	if( isset( $title[ $page ] ) )
		$print = $title[ $page ] . " | " . $sitename;
	else
		$print = $sitename;
	
	print( $print );
	
}

function get_head() {
	
	$page = get_page( false );
	$return;
	
	if( file_exists( "includes/css/" . $page . ".css" ) )
		$return[ "css" ][] = "includes/css/" . $page . ".css";
	elseif( file_exists( "includes/css/" . $page . "-style.css" ) )
		$return[ "css" ][] = "includes/css/" . $page . "-style.css";
		
	if( file_exists( "includes/js/" . $page . ".js" ) )
		$return[ "js" ][] = "includes/js/" . $page . ".js";
	elseif( file_exists( "includes/js/" . $page . "-settings.js" ) )
		$return[ "js" ][] = "includes/js/" . $page . "-settings.js";
		
	
	if( isset( $return[ "css" ] ) ) {
		foreach( $return[ "css" ] as $id => $file ) {
			print( '<link rel="stylesheet" type="text/css" href="' . $file . '" />' );
		}
	}
	
	if( isset( $return[ "js" ] ) ) {
		foreach( $return[ "js" ] as $id => $file ) {
			print( '<script type="text/javascript" src="' . $file . '"></script>' );
		}
	}
	
}