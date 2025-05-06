<?php
if(isset($_GET['export_csv'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'event_registrations';
    $registrations = $wpdb->get_results("SELECT * FROM $table_name");

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=deelnemers.csv');

    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Event ID', 'Naam', 'Leerlingnummer', 'Datum'));

    foreach($registrations as $reg) {
        fputcsv($output, array($reg->id, $reg->event_id, $reg->student_name, $reg->student_number, $reg->registered_at));
    }

    fclose($output);
    exit;
}
?>
