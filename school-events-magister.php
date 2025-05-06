<?php
/*
Plugin Name: School Events Magister
Description: Beheer school events, Magister-check en deelnemers.
Version: 1.0
Author: Mats
*/

include_once(plugin_dir_path(__FILE__) . 'includes/admin-menu.php');
include_once(plugin_dir_path(__FILE__) . 'includes/event-registration.php');
include_once(plugin_dir_path(__FILE__) . 'includes/export-csv.php');
include_once(plugin_dir_path(__FILE__) . 'public/events-page.php');

// DB Table bij plugin activatie
function sem_create_tables() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'event_registrations';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        event_id int NOT NULL,
        student_name text NOT NULL,
        student_number text NOT NULL,
        registered_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'sem_create_tables');
?>
