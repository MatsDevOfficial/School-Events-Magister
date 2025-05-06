<?php
// Placeholder voor Magister-check en registratie
add_action('rest_api_init', function () {
    register_rest_route('sem/v1', '/register/', array(
        'methods' => 'POST',
        'callback' => 'sem_register_student',
    ));
});

function sem_register_student($data) {
    global $wpdb;
    $params = $data->get_params();

    $wpdb->insert(
        $wpdb->prefix . 'event_registrations',
        array(
            'event_id' => intval($params['event_id']),
            'student_name' => sanitize_text_field($params['student_name']),
            'student_number' => sanitize_text_field($params['student_number'])
        )
    );

    return new WP_REST_Response(array('status' => 'Geregistreerd!'), 200);
}
?>
