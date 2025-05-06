<?php
function sem_register_admin_menu() {
    add_menu_page('School Events', 'School Events', 'manage_options', 'school-events', 'sem_admin_page');
}
add_action('admin_menu', 'sem_register_admin_menu');

function sem_admin_page() {
    echo '<h1>School Events Magister Plugin</h1>';
    echo '<p>Hier beheer je je school evenementen.</p>';
}
?>
