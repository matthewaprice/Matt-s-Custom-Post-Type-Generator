<?php
/*
Plugin Name: Matt's Post Types
Plugin URI: http://matthewaprice.com
Description: Makes Post Types
Version: 1.0
Author: Matthew Price
Author URI: http://matthewaprice.com
License: GPL2
*/

$mappt_classes = array( 'MAPPT_Base' );
foreach ( $mappt_classes as $mappt_class ) :
	include( "classes/" . $mappt_class . ".class.php" );
endforeach;

$mappt = new MAPPT();

function map_create_post_type( $args ) {
	
	$post_type = new MAPPT();
	$post_type->setPostTypeOptions(
		$args['singular'],
		$args['plural'],
		$args['slug'],
		$args['supports'],
		$args['meta_boxes'],
		$args['icon'],
		$args['compat']
	);
	$post_type->setPostTypeArguments();
	$post_type->initPostType();		

}

function map_create_taxonomy( $args ) {

	$taxonomoy = new MAPPT();
	$taxonomoy->setTaxonomyOptions(
		$args['singular'],
		$args['plural'],
		$args['slug'],
		$args['post_types'],
		$args['hierarchical']
	);
	$taxonomoy->initTaxonomy();	

}