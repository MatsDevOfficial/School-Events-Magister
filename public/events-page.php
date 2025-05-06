<?php
function sem_events_page() {
    $events = get_posts(array('post_type' => 'post', 'category_name' => 'event'));

    $output = '<h2>Aankomende Events</h2>';
    foreach($events as $event) {
        $output .= '<h3>' . $event->post_title . '</h3>';
        $output .= '<div>' . $event->post_content . '</div>';
        $output .= '<button onclick="aanmelden(' . $event->ID . ')">Aanmelden</button><hr>';
    }

    $output .= '<div id="response"></div>';
    $output .= '
    <script>
    function aanmelden(eventId) {
        fetch("https://jouw-magister-api-endpoint/check", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({username: "leerling123", password: "geheim"})
        })
        .then(r => r.json())
        .then(data => {
            if(data.status === "allowed"){
                fetch("/wp-json/sem/v1/register/", {
                    method: "POST",
                    headers: {"Content-Type": "application/json"},
                    body: JSON.stringify({
                        event_id: eventId,
                        student_name: data.name,
                        student_number: data.student_number
                    })
                })
                .then(r => r.json())
                .then(res => {
                    document.getElementById("response").innerHTML = res.status;
                });
            } else {
                document.getElementById("response").innerHTML = "Je mag niet meedoen.";
            }
        });
    }
    </script>
    ';

    return $output;
}
add_shortcode('school_events', 'sem_events_page');
?>
