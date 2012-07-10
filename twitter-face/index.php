<?php
/*
Plugin Name: Twitter and Facebook Tabbed
Plugin URI: http://www.blueboxphp.com
Description: Twitter &amp; Facebook Tabbed content widget
Author: Keith Jackson
Version: 1.0
Author URI: http://www.blueboxphp.com
*/

define ('DEVELOPMENT_ENVIRONMENT',true);
define ('PLUGIN_NAME','twitter-face');
define("BASE_URL",get_bloginfo('url'));

include_once '_includes/helpers.php';

class KMJ_TwitFaceWidget extends WP_Widget
{
	public $name = 'Twitter Face tabbed content';
	public $description = 'Twitter &amp; Facebook tabbed content widget';	
	public $control_options = array();
	
	function __construct() {

		$this->control_options['use_tabs'] = array('label'=>'Show using tabs:', 'type'=>'checkbox', 'default'=>'on');
		$this->control_options['display_first'] = array('label'=>'Display first:', 'type'=>'dropdown', 'options' => array('Twitter', 'Facebook'), 'default'=>'Twitter');
		
		//twitter
		$this->control_options['use_twitter'] = array('label'=>'Show Twitter block:', 'type'=>'checkbox', 'default'=>'on');
		$this->control_options['twitter_tag'] = array('label'=>'Twitter name:', 'type'=>'text', 'default'=>'BlueBoxPHP');
		$this->control_options['number_tweets'] = array('label'=>'Number Tweets:', 'type'=>'text', 'default'=>'3');
		//facebook
		$this->control_options['use_facebook'] = array('label'=>'Show Facebook block:', 'type'=>'checkbox', 'default'=>'on');
		$this->control_options['use_face_likebox'] = array('label'=>'Show Facebook Likebox:', 'type'=>'checkbox', 'default'=>'on');
		$this->control_options['facebook_page'] = array('label'=>'Facebook page Username to like:', 'type'=>'text', 'default'=>'blueboxhome');
		$this->control_options['use_face_comments'] = array('label'=>'Show Facebook Comments box:', 'type'=>'checkbox', 'default'=>'on');
		$this->control_options['facebook_comments_url'] = array('label'=>'facebook comments URL:', 'type'=>'text', 'default'=>'http://blueboxphp.com');
		$this->control_options['facebook_num_posts'] = array('label'=>'Number posts:', 'type'=>'text', 'default'=>'2');


		$widget_options = array('classname' => __CLASS__, 'description' => $this->description );
		parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);
		
		//Register any CSS & JS
		if ( is_active_widget(false, false, $this->id_base) ) {
			add_action('wp_enqueue_scripts', 'KMJ_Helpers::add_stylesheets_to_header');
			add_action('wp_enqueue_scripts', 'KMJ_Helpers::add_jscripts_to_header');
		}

	}
 	
  function form($instance) {
		$placeholders = array();
		$placeholders['image_path'] = BASE_URL.'/wp-content/plugins/'.PLUGIN_NAME.'/_images/';
		
		foreach ($this->control_options as $key => $value) {
			
			if(is_array($value)) {
				$settings = $this->get_settings();
				$placeholders[$key.'.id'] = $this->get_field_id($key);
				$placeholders[$key.'.name'] = $this->get_field_name($key);
				$placeholders[$key.'.label'] = $value['label'];
				// this helps to avoid "Unidentified index" instances
				switch ($value['type']) {
					case 'text':
						if( isset( $instance[$key] ) ) {
							$placeholders[$key.'.value'] = esc_attr( $instance[$key] );
						} else {
							$placeholders[$key.'.value'] = esc_attr( $this->control_options[$key]['default'] );	
						}
						break;
					case 'checkbox':
						if( isset( $instance[$key] ) ) {
							$placeholders[$key.'.value'] = $instance[$key] == 'on'? 'checked="checked"':'';
						} else {
							if($this->control_options[$key]['default'] == 'on' ) {
								$placeholders[$key.'.value'] = ' checked="checked" ';
							}
						}
						break;
					case 'dropdown':
						$optionStr = '';
						foreach( $value[options] as $op) {
							$op = htmlspecialchars($op);
							$sel = "";
							if($instance[$key] == $op) {$selFlaf = true; $sel = 'selected="selected"'; }
							$optionStr .= '<option value="'.$op.'" '.$sel.'>'.$op.'</option>';
						}
						$placeholders[$key.'.options'] = $optionStr;
						break;
					default:
						break;
				}
			}
			
		}
		$tpl = file_get_contents(dirname(__FILE__).'/_tpls/widget-control.tpl');
		$res = KMJ_Helpers::parse($tpl, $placeholders);
		print $res;
   }
		
	function update($new_instance, $old_instance) {
    $instance = $old_instance;
		$instance['use_tabs'] = isset($new_instance['use_tabs']) ? 'on':'off';
		$instance['display_first'] = $new_instance['display_first'];

		//twitter
		$instance['use_twitter'] = isset($new_instance['use_twitter']) ? 'on':'off';
		$instance['twitter_tag'] = $new_instance['twitter_tag'];
    $instance['number_tweets'] = $new_instance['number_tweets'];
		
		//facebook
		$instance['use_facebook'] = isset($new_instance['use_facebook']) ? 'on':'off';
		// like box
		$instance['use_face_likebox'] = isset($new_instance['use_face_likebox']) ? 'on':'off';
		$instance['facebook_page'] = $new_instance['facebook_page'];
		//comments
		$instance['use_face_comments'] = isset($new_instance['use_face_comments']) ? 'on':'off';
		$instance['facebook_comments_url'] = $new_instance['facebook_comments_url'];
		$instance['facebook_num_posts'] = $new_instance['facebook_num_posts'];

    return $instance;
  }
	
	function widget($args, $instance) {
		
		$instance['image_path'] = BASE_URL.'/wp-content/plugins/'.PLUGIN_NAME.'/_images/';
		$placeholders = array_merge($args, $instance);
		$placeholders['title'] = '';
		
		if($placeholders['use_twitter'] == "on") {
			$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/twitter.tpl');
			$twitter = KMJ_Helpers::parse($tpl, $placeholders);
		}

		if($placeholders['use_facebook'] == "on") {
			$placeholders['facebook_like_box'] = "";
			if($placeholders['use_face_likebox'] == "on") {
				$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/facebook_like_box.tpl');
				$placeholders['facebook_like_box'] = KMJ_Helpers::parse($tpl, $placeholders);
			}
			$placeholders['facebook_comments_box'] = "";
			if($placeholders['use_face_comments'] == "on") {
				$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/facebook_comments_box.tpl');
				$placeholders['facebook_comments_box'] = KMJ_Helpers::parse($tpl, $placeholders);
			}
			$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/facebook.tpl');
			$facebook = KMJ_Helpers::parse($tpl, $placeholders);
		}
		
		if($placeholders['display_first'] == "Twitter") {
			$placeholders['tab_1'] = 'Twitter';
			$placeholders['tab_1_contents'] = $twitter;
			$placeholders['tab_2'] = 'Facebook';
			$placeholders['tab_2_contents'] = $facebook;
		} else {
			$placeholders['tab_1'] = 'Facebook';
			$placeholders['tab_1_contents'] = $facebook;
			$placeholders['tab_2'] = 'Twitter';
			$placeholders['tab_2_contents'] = $twitter;
		}
		
		
		if($placeholders['use_tabs'] == "on") {
			$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/tab_control.tpl');
		} else {
			$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/none_tab_control.tpl');
		}
		$placeholders['content'] = KMJ_Helpers::parse($tpl, $placeholders);
		
		
		//Main control
		$tpl = file_get_contents(dirname(__FILE__) . '/_tpls/widget.tpl');
		print KMJ_Helpers::parse($tpl, $placeholders);
				
//    extract($args, EXTR_SKIP);
//    echo $before_widget;
//    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
//    if (!empty($title))  echo $before_title . $title . $after_title;;
//    echo $after_widget;
  }

	static function register_widget() {
		register_widget(__CLASS__);
	}
	static function add_menu_item() {
		add_submenu_page(
						'plugins.php',												// menu page to attach to 
						'Content Rotator Config',							// page title
						'Content Rotator',										// menu title 
						'manage_options',											// permissions 
						'content-rotation',										// page name (used in th URL)
						'ContentRotator::generate_admin_page'	// clicking callback
		);
	}

}

add_action( 'widgets_init', 'KMJ_TwitFaceWidget::register_widget' );

//EOF
