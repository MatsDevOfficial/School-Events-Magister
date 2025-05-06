<?php
function sem_events_page() {
    $events = get_posts(array('post_type' => 'school_event'));
    $output = '<h2>Aankomende Events</h2>';
    foreach($events as $event) {
        $output .= '<h3>' . $event->post_title . '</h3>';
        $output .= apply_filters('the_content', $event->post_content);
    }

    // Placeholder: Magister check
    $output .= '<button onclick="checkMagister()">Check jouw status</button>';
    $output .= '<div id="magister-status"></div>';

    $output .= '
    <script>
    function checkMagister() {
        fetch("https://jouw-magister-api-endpoint/check", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({username: "leerling123", password: "geheim"})
        })
        .then(r => r.json())
        .then(data => {
            document.getElementById("magister-status").innerHTML = 
                "<p>Status: " + data.status + "</p>";
        })
        .catch(err => console.error(err));
    }
    </script>
    ';

    return $output;
}
add_shortcode('school_events', 'sem_events_page');
?>
