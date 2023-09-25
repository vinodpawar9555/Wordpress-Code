<?php
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );
if ( !function_exists( 'child_theme_configurator_css' ) ){
	function child_theme_configurator_css() {
        // enqueue style
         wp_enqueue_style( 'mycustom-css', get_stylesheet_directory_uri() .'/css/new-custom.css');
       // enqueue third party style
        wp_enqueue_style( 'new-googelapi-css', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800&display=swap' );
        wp_enqueue_style( 'newfont-awesome-css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
      
      // enqueue js scripts
        wp_enqueue_script( 'jquery-script', get_stylesheet_directory_uri() . '/jq/jquery-3.3.1.min.js', array(), '', false );
        wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/jq/bootstrap.min.js', array(), '', false );
        
        wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/jq/custom.js', array(), '', false );
      
        // enqueue scripts for particular page
         if (is_single('page-slug') || is_page(page-id)) {
        wp_enqueue_script( 'custom-animation',  get_stylesheet_directory_uri() . '/jq/custom-animation.js', array(), '', true );
        }    
	}
}
