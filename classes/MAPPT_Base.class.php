<?php
class MAPPT {

	public function __construct() {
		
	}
	    
    public function initPostType() {

		$this->setPostTypeArguments();		
		add_action( 'init', array( &$this, 'registerPostType' ) );
    	
    }
    
    public function registerPostType() {
    
		register_post_type( $this->singular, $this->post_type_args );
		    
    }
	
    public function setPostTypeOptions( $singular, $plural, $slug, $supports, $meta_boxes, $icon, $compat ) {
    
    	$this->singular = $singular;
    	$this->plural = $plural;
    	$this->slug = $slug;
    	$this->supports = $supports;
    	$this->meta_boxes = $meta_boxes;
    	$this->icon = $icon;    
    	$this->compatibility_type = $compat;	    	    	    	
    	
    }
    
    public function setPostTypeLabels() {

		$labels = array(
			'name' => _x( $this->singular, 'post type general name' ),
			'singular_name' => _x( $this->singular, 'post type singular name' ),
			'add_new' => __( 'Add New ' . $this->singular ),
			'add_new_item' => __( 'Add New ' . $this->singular ),
			'edit_item' => __( 'Edit ' . $this->singular ),
			'new_item' => __( 'New ' . $this->singular ),
			'all_items' => __( 'All ' . $this->plural ),
			'view_item' => __( 'View ' . $this->singular ),
			'search_items' => __( 'Search ' . $this->plural ),
			'not_found' =>  __( 'No ' . $this->plural . ' found' ),
			'not_found_in_trash' => __( 'No ' . $this->plural . ' found in Trash' ), 
			'parent_item_colon' => '',
			'menu_name' => $this->plural
		);
		
		return $labels;
				    
    }
    
    public function setPostTypeArguments() {

		$post_type_args = array(
			'labels' => $this->setPostTypeLabels(),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => $this->compatibility_type,
			'has_archive' => true, 
			'hierarchical' => true,    
			'menu_position' => 500,
			'rewrite' => true,            
			'rewrite' => array(
			    'slug' => $this->this->slug,
			    'with_front' => FALSE,
			  ),
			'menu_icon' => $this->icon,	  				 
			'supports' => $this->supports,
			'register_meta_box_cb' => array( &$this, $this->meta_boxes )    	
		); 
		
		$this->post_type_args = $post_type_args;
		    
    }

    public function initTaxonomy() {
	    
		add_action( 'init', array( &$this, 'registerTaxonomy' ) );
    	
    }
    
    public function registerTaxonomy() {
	    
		register_taxonomy( 
	    	strtolower( preg_replace( '/[^a-zA-Z]/', '', $this->tax_singular ) ),
			$this->tax_post_types,
			array(
				'hierarchical' => $this->tax_hierarchical,
				'show_admin_column' => $this->show_admin_column,
				'labels' => $this->setTaxonomyLabels(),
				'show_ui' => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var' => true,
				'rewrite' => array( 'slug' => $this->tax_slug )		
			)
		);
		    
    }
	
    public function setTaxonomyOptions( $singular, $plural, $slug, $post_types, $hierarchical, $show_admin_colum = true ) {
    
    	$this->tax_singular = $singular;
    	$this->tax_plural = $plural;
    	$this->tax_slug = $slug;
    	$this->tax_post_types = $post_types;	
    	$this->tax_hierarchical = $hierarchical;  	    	    	
    	$this->show_admin_column = $show_admin_colum;  	    	    	
    	    	
    }
    
    public function setTaxonomyLabels() {

		$labels = array(
		    'name' => _x( $this->tax_plural, 'taxonomy general name' ),
		    'singular_name' => _x( $this->tax_singular, 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search ' . $this->tax_plural ),
		    'all_items' => __( 'All ' . $this->tax_plural ),
		    'parent_item' => __( 'Parent ' . $this->tax_singular ),
		    'parent_item_colon' => __( 'Parent ' . $this->tax_singular . ':' ),
		    'edit_item' => __( 'Edit ' . $this->tax_singular ), 
		    'update_item' => __( 'Update ' . $this->tax_singular ),
		    'add_new_item' => __( 'Add New ' . $this->tax_singular ),
		    'new_item_name' => __( 'New ' . $this->tax_singular . ' Name' ),
		    'menu_name' => __( $this->tax_plural ),
		);
		
		return $labels;
				    
    }
    	 
}
?>