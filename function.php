<?php 
include "config.php";
require 'Carbon/autoload.php';

use Carbon\Carbon;

if (isset($_POST['fname'])) {
    switch ($_POST['fname']) {
        case 'event-detail':
            e_details();
            break;
        case 'near-me':
            near_me();
            break;
        case 'volunteer-event':
            volunteer_event();
            break;
        case 'host-event':
            host_event();
            break;
        default:
            break;
    }
}

function volunteer_mail($email_to,$firstname,$event,$date)
{
    $to = $email_to;
    $subject = "Volunteer YIF";
    
    $message = '
    <html>
    <head>
    <title>Volunteer!</title>
    </head>
    <body>
    <p>Hello '.$firstname.',</p>
    <p>
        Thank you for your interest in volunteering for democracy. You will be considered for
        <strong>"<?=$event?>"</strong>
        on <strong><?=date_format(date_create($date), "d F\'y")?></strong>.
        Your registration does not guarantee your participation. All volunteers selected must go through a
        short call and a training process with the YIF team. If selected, we will be in touch with you a
        month before the day of the event.
    </p>
    <p>
        Selected or not, we hope to see you participate in the youth’s new hobby - #GetInked! Check your
        voting status <a href="https://youngindians.vote/am-i-registered.php">here</a> or register to vote <a href="#">here</a>.
    </p>
    </body>
    </html>
    ';
    
    // It is mandatory to set the content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers. From is required, rest other headers are optional
    $headers .= 'From: <contact@youngindiafoundation.org>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
}

function host_mail($email_to,$firstname)
{
    $to = $email_to;
    $subject = "Host YIF";
    
    $message = "
    <html>
    <head>
    <title>Host YIF at your Event!</title>
    </head>
    <body>
    <p>Hello ".$firstname.",</p>
    <p>Thank you for your submission!</p>
    <p>We will be in touch soon; don’t forget to check your inbox and spam for updates.</p>
    </body>
    </html>
    ";
    
    // It is mandatory to set the content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers. From is required, rest other headers are optional
    $headers .= 'From: <contact@youngindiafoundation.org>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
}

function voter_count()
{
    $db = new Db();
    $res = $db->query("SELECT * FROM voter_count")->fetch_assoc();
    $count = number_format((int) $res['count']);
    $html = '';
    $c = str_split((string) $count);
    for ($i = 0; $i < strlen((string) $count); $i++) {
        if ($c[$i] === ',') {
            $html .= '<span class="comma">,</span>';
        } else {
            $html .= '<span class="number">' . $c[$i] . '</span>';
        }
    }
    echo $html;
}

function firstname($name){
    $parts = explode(" ", $name);
    $firstname = $parts[0];
    return $firstname;
}

function host_event()
{
    $db = new Db();
    $sql = "insert into `host_event`(`fullname`, `email`) values('" . $_POST['fullname'] . "', '" . $_POST['email'] . "')";
    $res = $db->query($sql);
    $firstname = firstname($_POST['fullname']);
    host_mail($_POST['email'],$firstname);
    header('location:index.php?modal=th-host&firstname='.$firstname.'');
}

function volunteer_event()
{
    $db = new Db();
    $sql = "insert into `volunteer_event`(`fullname`, `email`, `age`, `mobile`, `event_id`) values('" . $_POST['fullname'] . "', '" . $_POST['email'] . "', " . $_POST['age'] . ", " . $_POST['mobile'] . ", " . $_POST['event-id'] . ")";
    $res = $db->query($sql);

    $event = $db->query("select * from vf_events where id=" . $_POST['event-id'] . "")->fetch_assoc();
    $firstname = firstname($_POST['fullname']);
    volunteer_mail($_POST['email'],$firstname,$event['name'],$event['start_date']);
    header('location:index.php?modal=th-vol&event=' . urlencode($event['name']) . '&date=' . $event['start_date'] . '&firstname='.$firstname.'');
}

function near_me()
{
    $lat = $_POST['lat'];
    $long = $_POST['lng'];

    $db = new Db();
    $cities = $db->query("SELECT * FROM cities");
    $events = $db->query("SELECT * FROM vf_events");
    $near = [];
    $eve = [];

    while ($city = $cities->fetch_assoc()) {
        $theta = $long - floatval($city['lng']);
        $dist = sin(deg2rad($lat)) * sin(deg2rad(floatval($city['lat']))) + cos(deg2rad($lat)) * cos(deg2rad(floatval($city['lat']))) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $km = $dist * 60 * 1.1515 * 1.609344;

        if ($km < 500) {
            $near[] = ($city['city']);
        }
    }

    while ($event = $events->fetch_assoc()) {
        if (in_array($event['city'], $near)) {
            $eve[] = ([
                'city' => $event['city'],
            ]);
        }
    }

    echo json_encode($eve);
}

function e_details()
{
    $db = new Db();
    $id = $_POST['id'];
    $event = $db->query("SELECT * FROM vf_events WHERE id = $id")->fetch_assoc();
    $start_date = Carbon::parse($event['start_date']);
    $last_date = Carbon::parse($event['end_date']);
    $etypes = unserialize($event["event_type"]);
    $html = '';
    $html .= '<div class="container-event"';
    if ($event["banner"] == null) {
        $html .= ' style="background-image:url(images/banner/banner.jpg);background-size: cover;">';
    } else {
        $html .= ' style="background-image:url(images/banner/' . $event["banner"] . ');background-size: cover;">';
    }
    $html .= '<div class="event-modal-wrapper"><div class="container">';
    $html .= '<div class="em-name">';
    $html .= '<h4 class="anton">' . $event['name'] . '</h4>';
    $html .= '</div><p class="event-desc">' . $event['description'] . '</p>';
    $html .= '<div class="em-date">' . $start_date->format('j') . ' ' . $start_date->format('M') . ' to ' . $last_date->format('j') . ' ' . $last_date->format('M') . ' ' . $last_date->format('Y') . '</div>';
    $html .= '<div class="em-type">';
    if ($event["event_type"] != null) {
        foreach ($etypes as $et) {
            $html .= '<span>' . $et . '</span>';
        }
    }
    $html .= '</div>';
    $html .= '<div class="em-venue"><i class="bi bi-geo-alt"></i> ' . $event["venue"] . '</div>';
    $html .= '<div class="em-address mb-4">' . $event["city"] . ', ' . $event['state'] . '</div>';
    $html .= '<form id="event-yif-form" method="POST" action="function.php">
    <div class="row">
        <div class="col-md-6 col-12 mb-2">
            <input type="text" class="form-control modalfield" name="fullname" placeholder="Full Name"
                aria-label="Full Name" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <input type="email" class="form-control modalfield" name="email" placeholder="Email"
                aria-label="Email" required>
        </div>
        <div class="col-md-6 col-3 mb-2">
            <input type="number" class="form-control modalfield" name="age" placeholder="Age" aria-label="Age"
                required>
        </div>
        <div class="col-md-6 col-9 mb-2">
            <input type="number" class="form-control modalfield" name="mobile" placeholder="Mobile Number"
                aria-label="Mobile Number" required>
        </div>
        <input type="hidden" name="event-id" value="' . $event["id"] . '">
        <input type="hidden" name="fname" value="volunteer-event">
        <div class="col-12">
            <button type="submit" class="btn btn-sm btn-primary mailbutton">Register</button>
        </div>
    </div>
</form>';
    $html .= '</div></div></div>';
    echo $html;
}

function calender()
{
    $db = new Db();
    $last_event = $db->query("SELECT * FROM vf_events ORDER BY start_date DESC LIMIT 1")->fetch_assoc();
    $last_date = Carbon::parse($last_event['start_date']);
    $std = $last_date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
    $end = $last_date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

    $fe = $db->query("SELECT * FROM vf_events ORDER BY start_date ASC LIMIT 1")->fetch_assoc();
    $date = Carbon::parse($fe['start_date']);
    $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
    $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
    
    if($last_date->year === $date->year){
        $diff = $last_date->month - $date->month;
    } else if($last_date->year > $date->year){
        $diff = 12 - $date->month;
        $diff += $last_date->month;
    }

    $html = '';
    for ($i = 0; $i <= $diff; $i++) {

        $j = $i;
        if ($i == 0) {
            $html .= '<table id="cal-' . $i . '" class="table-cal ' . $date->format('F') . '">';
        } else {
            $html .= '<table id="cal-' . $i . '" style="display:none" class="table-cal ' . $date->format('F') . '">';
        }

        $html .= '<thead>';
        $html .= '<tr class="month-year"><th colspan="7">';
        if ($i >= 1) {
            $html .= '<i class="bi bi-chevron-double-left cal-nav" data-show="cal-' . --$j . '" data-hide="cal-' . $i . '" style="float:left" aria-hidden="true"></i>';
        }

        $html .= '<span class="month">' . $date->format('F') . '</span>&nbsp;';
        $html .= '<span class="year">' . $date->format('Y') . '</span>';
        $j = $i;
        if ($i >= 0 && $i < $diff) {
            $html .= '<i class="bi bi-chevron-double-right cal-nav" data-show="cal-' . ++$j . '" data-hide="cal-' . $i . '" style="float:right" aria-hidden="true"></i>';
        }

        $html .= '</th></tr>';

        $html .= '<tr class="days">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        foreach ($dayLabels as $dayLabel) {
            $html .= '<th class="day-label">' . $dayLabel . '</th>';
        }
        $html .= '</tr></thead>';
        $html .= '<tbody>';
        $count = 1;
        while ($startOfCalendar <= $endOfCalendar) {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $city = $db->query("SELECT * FROM vf_events WHERE start_date = '" . $startOfCalendar->toDateString() . "'")->fetch_assoc();

            if ($count == 1) {
                $html .= '<tr class="day-row">';
            }
            if ($count <= 7) {
                $count++;

                if ($startOfCalendar->format('m') === $date->format('m') && $city) {

                    $name = strlen($city['name']) > 13 ? substr($city['name'], 0, 13) . '...' : $city['name'];
                    $html .= '<td class="day show-register-form ' . $extraClass . '">';
                    $html .= '<span class="content">' . $startOfCalendar->format('j') . '</span><br>';
                    $html .= '<span class="address"><a href="' . $city['website'] . '" target="_blank" class=""><i class="bi bi-geo-alt-fill" aria-hidden="true"></i></a>&nbsp;';
                    $html .= '<a href="#" data-id="' . $city['id'] . '" data-bs-toggle="modal" data-bs-target="#eventModal">' . $name . '</span>';
                    $html .= '</a></td>';
                } else {
                    $html .= '<td class="day ' . $extraClass . '"><span class="content">' . $startOfCalendar->format('j') . '</span>';
                    $html .= '</td>';
                }

                $startOfCalendar->addDay();
            } else {
                $count = 1;
                $html .= '</tr>';
            }
        }
        $html .= '</tbody></table>';
        $date = $date->copy()->addMonthNoOverflow();
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

    }

    return $html;
}