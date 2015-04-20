<?php
/*
Plugin Name: nolink
Description: Removes hyperlink of passed string
Version: 1.0b1
Author: Devin Trotter
Author URI: no home
*/
 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'NoLink', 	//Plugin name
	'1.0b1', 		//Plugin version
	'Devin Trotter',  //Plugin author
	'http://www.lilypadmudlib.com/', //author website
	'Removes hyperlink of passed string', //Plugin description
	'theme', //page type - on which admin tab to display
	'strip_link'  //main function (administration)
);

# add a link in the admin tab 'theme'
add_action('theme-sidebar', 'createSideMenu', array($thisfile, 'NoLink'));

# functions
function strip_link($string){
    while(TRUE){
        @list($pre,$mid) = explode('<a',$string,2);
        @list($mid,$post) = explode('</a>',$mid,2);
        $string = $pre.$post;
        if (is_null($post))return $string;
    }
}