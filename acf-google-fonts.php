<?php
/**
Plugin Name: ACF Google Fonts
Plugin URI: https://www.bbioon.com
Description: Add google fonts selector field to Advanced custom fields plugin.
Version: 1.0
Author: Ahmad Wael
Author URI: https://github.com/devwael
Text Domain: acf
Domain Path: /languages
 */

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists( 'gf_acf_plugin_google_fonts' ) ) :

class gf_acf_plugin_google_fonts {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
//		add_action('acf/include_fields', array($this, 'include_field'));
		add_action('acf/include_fields', 	array($this, 'include_field')); // v5
//		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	
	/**
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		// support empty $version
//		if( !$version ) $version = 5;
		
		
		// load acfgf
//		load_plugin_textdomain( 'acfgf', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
		
		
		// include
		include_once('fields/class-gf-acf-field-google-fonts-v5.php');
		new gf_acf_field_google_fonts( $this->settings );
	}
	
}


// initialize
new gf_acf_plugin_google_fonts();


// class_exists check
endif;
	
?>