<?php

class KMJ_Helpers
{
	
	static function parse($tpl, $hash) {
		foreach($hash as $key => $value) {
			$tpl = str_replace('[+'.$key.'+]', $value, $tpl);
		}
		return $tpl;
	}
		
	//--------------------------------------------------------------------
	static function add_stylesheets_to_header() {

		if ( file_exists( WP_PLUGIN_DIR . '/twitter-face/_css/twitface.css' ) ) {
			wp_register_style('KMJstyleSheet_0', plugins_url('_css/twitface.css',dirname( __FILE__))); // Respects SSL, .css is relative to the current file
			wp_enqueue_style( 'KMJstyleSheet_0');
		}
	}
	//--------------------------------------------------------------------
	static function add_jscripts_to_header() {
		
		// use from WP included scripts
		// full list included scripts here http://codex.wordpress.org/Function_Reference/wp_enqueue_script
		wp_enqueue_script('jquery');
		//wp_enqueue_script('jquery-form');
		
		// load additional scripts
		if ( file_exists( WP_PLUGIN_DIR . '/twitter-face/_js/twitface.js' ) ) {
			wp_register_script('KMJ_rotator', plugins_url('_js/twitface.js', dirname(__FILE__)));// Respects SSL, .cjs is relative to the current file
			wp_enqueue_script( 'KMJ_rotator');
		}
		
	}
	//--------------------------------------------------------------------

}

