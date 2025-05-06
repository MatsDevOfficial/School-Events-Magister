<?php
function sem_register_event_post_type() {
    register_post_type('school_event', array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'custom-fields')
    ));
}
add_action('init', 'sem_register_event_post_type');
?>
