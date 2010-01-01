<?php
/*
Plugin Name: Language Code Classification
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Allowes content to be associated in a custom field with <a href="http://www.sil.org/iso639-3/">ISO 639-3</a> codes.
Version:  0.1.3 Beta
Author: Kevin Cline
Author URI: http://LingEx.org/wordpress/?page_id=71/#Kevin
*/
 
  $language_code_db_version = "1.0"; 

function language_code_install() {
   global $wpdb;
   global $language_code_db_version;
   $table_name = $wpdb->prefix . "language_code";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
    $sql = "CREATE TABLE " . $table_name . " (
      `Id`      char(3) NOT NULL,
      `Part2B`  char(3) NULL,
      `Part2T`  char(3) NULL,
      `Part1`   char(2) NULL,         
      `Scope`   char(1) NOT NULL,     
      `Type`    char(1) NOT NULL,                                   
      `Ref_Name`   varchar(150) NOT NULL,      
      `Comment`    varchar(150) NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
      
    $columns = "Id, Part2B, Part2T, Part1, Scope, Type, Ref_Name, Comment";
    
    $csv = fopen(ABSPATH ."wp-content/plugins/language-code/codes.tab", "r");

    if ($csv) {
      $data = fgetcsv($csv, 4096, "\t");
      while(!feof($csv)) {
        $data = fgetcsv($csv, 4096, "\t");
        $insertValues = array();  
        foreach( $data as $v ) {
      	   $insertValues[] = "'".addslashes(trim($v))."'";
        }
        //$insertValues[] = $insertValues[6];
        $values=implode(',',$insertValues);
        $insert = "INSERT INTO " . $table_name . " ( $columns ) VALUES ( $values )";  
        $results = $wpdb->query( $insert ); 
      } 
      fclose($csv);
    }  
    add_option("language_code_db_version", $language_code_db_version);
   }
}

register_activation_hook(__FILE__,'language_code_install');


function language_code_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . "language_code";
    if($wpdb->get_var("show tables like '$table_name'") == $table_name) {
      $sql = "DROP TABLE " . $table_name;
      $results = $wpdb->query( $sql );
    }  
    delete_option("language_code_db_version");
}

register_deactivation_hook(__FILE__,'language_code_uninstall');

// This just echoes the chosen line, we'll position it later
function print_language_code($content) {
	global $wp_query;
  $lang = get_post_meta($wp_query->post->ID, '_language_code', 'true');
	if ($lang) $content .= "<p id='lanuage_code'><strong>Language:</strong> $lang</p>";
	return $content;
}

// Now we set that function up to execute when the admin_footer action is called
add_filter('the_content', 'print_language_code');

/* Use the admin_menu action to define the custom boxes */
add_action('admin_menu', 'language_code_add_custom_box');

/* Use the save_post action to do something with the data entered */
add_action('save_post', 'language_code_save_postdata');

/* Adds a custom section to the "advanced" Post and Page edit screens */
function language_code_add_custom_box() {

  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'language_code_sectionid', __( 'Language Code', 'language_code_textdomain' ), 
                'language_code_inner_custom_box', 'post', 'normal', 'high' );
    add_meta_box( 'language_code_sectionid', __( 'Language Code', 'language_code_textdomain' ), 
                'language_code_inner_custom_box', 'page', 'normal', 'high' );
   }
}
   
/* Prints the inner fields for the custom post/page section */
function language_code_inner_custom_box($post) {
  global $wpdb;
  $table_name = $wpdb->prefix . "language_code";
  if($wpdb->get_var("show tables like '$table_name'") == $table_name) {
  
    // Use nonce for verification
  
    echo '<input type="hidden" name="language_code_noncename" id="language_code_noncename" value="' . 
      wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  
    // The actual fields for data entry
    $default = "";
    if ($post->ID) {
        $post_lang = get_post_meta($post->ID, '_language_code', 'true');
        if ($post_lang) { 
          $sql = "SELECT Ref_Name FROM " . $table_name . " WHERE Id='".$post_lang."'";
    
          $lang = $wpdb->get_results($sql, ARRAY_N);
          $default = ' value="('.$post_lang.') '.$lang[0][0].'"';
        }
    }
    
    echo '<label for="language_code">' . __("Choose language:", 'language_code_textdomain' ) . '</label> ';
    echo '<input type="text" name="language_code" id="language_code" size=50'.$default.'>';
  }
}

/* When the post is saved, saves our custom data */
function language_code_save_postdata( $post_id ) {

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['language_code_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ))
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ))
      return $post_id;
  }

  // OK, we're authenticated: we need to find and save the data

  $lang = $_POST['language_code'];
  $lang = substr($lang, 0, 4);
  $lang = ltrim($lang, "(");
  if (get_post_meta($post_id, '_language_code', true)) {
      update_post_meta($post_id, '_language_code', $lang, get_post_meta($post_id, '_language_code', true));
  } else {
      add_post_meta($post_id, '_language_code', $lang, true);
  }
   return $lang;
}

/* Add Prototype and Script.aculo.us to the head */
function language_code_lib_javascript_autocompleter(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('autocompleter',WP_PLUGIN_URL.'/language-code/jquery.autocomplete.js',array('jquery'),'1.0'); 
}
add_action('init', 'language_code_lib_javascript_autocompleter');

/* Add the autocompleter css */
function language_code_css_autocompleter(){
	//Style
	wp_register_style('autocompleter', WP_PLUGIN_URL.'/language-code/autocompleter.css');
	wp_enqueue_style('autocompleter');
	wp_print_styles();
}
add_action('wp_head', 'language_code_css_autocompleter');

/* function which write the javascript call for autocomplete */
/* Add the autocompleter css */
function language_code_javascript_autocompleter(){
	echo '<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("input[name=language_code]").autocomplete(
				"'.WP_PLUGIN_URL.'/language-code/values.php",
				{
					delay:1,
					minChars:2,
					matchSubset:1,
					matchContains:1,
					cacheLength:5,
					onItemSelect:selectItem,
					autoFill:false
				}
			);
		});
		function selectItem(li) {
			jQuery("input#language_code").focus();
		}

	</script>';
}
add_action('admin_head', 'language_code_javascript_autocompleter', 1000);
?>