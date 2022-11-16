<?php include 'classes/session.php';

if (isset($_GET['fname'])) {
    switch ($_GET['fname']) {
        case 'event':
            event_csv_download();
            break;
        default:
            break;
    }
}

function event_csv_download()
{
    $db = new Db();
    $events = $db->query("SELECT * FROM vf_events");
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Disposition: attachment; filename=event.csv');
    header('Expires: 0');
    header('Pragma: public');

    if (!file_exists('download')) {
        mkdir('download', 0777, true);
    }

    $filename = "download/event.csv";
    $handle = fopen($filename, 'w');
    fputcsv($handle, [
        'ID',
        'Name',
        'Start Date',
        'End Date',
        'Venue',
        'City',
        'State',
        'Event Type',
        'Website',
        'Person(s) of Contact',
        'Expected Footfall',
    ]);

    while ($event = $events->fetch_assoc()) {
        if ($event['event_type'] != null) {
            $e_arr = unserialize($event['event_type']);
            $event_type = implode(', ', $e_arr);
        } else {
            $event_type = '';
        }
        fputcsv($handle, [
            $event['id'],
            $event['name'],
            $event['start_date'],
            $event['end_date'],
            $event['venue'],
            $event['city'],
            $event['state'],
            $event_type,
            $event['website'],
            $event['person_contact'],
            $event['ex_footfall'],
        ]);
    }

    fclose($handle);

    readfile($filename);
}