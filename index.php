<?php

define( "ROOT", dirname( __FILE__ ) );
define( "SEP", DIRECTORY_SEPARATOR );


require_once( ROOT . SEP . 'autoload.php' );
include_once( "includes/courses.php" );
include_once( "functions.php" );
include_once( "header.php" );

?>

<?php get_page();?>

<?php include_once( "footer.php" ); ?>