<?php
/*
values.php 0.1.2 //returns results for language_code autocomplete   Kevin Cline
Based off of:    Autocompleter   Version: 1.1.2 Author: Nik Chankov
Author URI: http://nik.chankov.net
*/


$path = dirname(dirname(dirname(dirname(__FILE__))));
require_once($path.'/wp-config.php');

function language_code_autocompleter()
{
  global $wpdb;
  $table_name = $wpdb->prefix . "language_code";



	$wpdb =& $GLOBALS['wpdb'];
	$search = $wpdb->escape($_GET['q']);
	if(strlen($search)){
		if($wpdb->get_var("show tables like '$table_name'") == $table_name) {
      $sql = "SELECT Id, Ref_Name FROM " . $table_name ." WHERE Id LIKE '$search%' OR Ref_Name LIKE '%$search%' ";
      $wpdb->query("SET NAMES 'utf8' COLLATE utf8_general_ci");
      $words = $wpdb->get_results($sql, ARRAY_A);
      if (is_array($words)) {
    		foreach ($words as $word){
    			echo "(".$word['Id'].") ".$word['Ref_Name']."\n";
    		}
  		}
		}
	}
}
if($_GET['q']){
	language_code_autocompleter();
}
?>