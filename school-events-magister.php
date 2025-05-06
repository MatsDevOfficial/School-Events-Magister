<?php
/*
Plugin Name: School Events Magister
Description: Beheer school events en controleer Magister-status voor deelname.
Version: 1.0
Author: Mats
*/

// Custom Post Type
include_once(plugin_dir_path(__FILE__) . 'includes/custom-post-type.php');

// Admin menu
include_once(plugin_dir_path(__FILE__) . 'admin/admin-panel.php');

// Events page shortcode
include_once(plugin_dir_path(__FILE__) . 'public/events-page.php');
?>
