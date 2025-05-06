<?php
function sem_register_admin_page() {
    add_menu_page('School Events', 'School Events', 'manage_options', 'school-events', 'sem_admin_page');
}
add_action('admin_menu', 'sem_register_admin_page');

function sem_admin_page() {
    echo '<h1>Event toevoegen</h1>';
    echo '<form method="post">
        <input type="text" name="event_title" placeholder="Event Titel" required><br>
        <input type="date" name="event_date" required><br>
        <input type="time" name="event_time" required><br>
        <input type="submit" name="sem_add_event" value="Event toevoegen">
    </form>';

    if(isset($_POST['sem_add_event'])) {
        $title = sanitize_text_field($_POST['event_title']);
        $date = sanitize_text_field($_POST['event_date']);
        $time = sanitize_text_field($_POST['event_time']);

        $event_content = 'Datum: ' . $date . '<br>Tijd: ' . $time;
        wp_insert_post(array(
            'post_title' => $title,
            'post_content' => $event_content,
            'post_type' => 'post',
            'post_status' => 'publish'
        ));
        echo '<p>Event toegevoegd!</p>';
    }

    echo '<h2>Deelnemers exporteren</h2>';
    echo '<a href="?export_csv=true" class="button button-primary">Exporteer CSV</a>';
}
?>
