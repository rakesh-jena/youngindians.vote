<?php include 'classes/session.php';
$database = new Db();
$events = $database->query("SELECT * FROM vf_events ORDER BY `start_date` ASC");
$count = 1;
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Events</h5>
                    <a class="btn btn-primary rounded-pill btn-sm ms-auto" href="download-csv.php?fname=event"
                        target="_blank" rel="noopener noreferrer">
                        Download
                    </a>
                </div>

                <!-- Events List -->
                <div style="overflow-x:auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Start
                                </th>
                                <th>
                                    End
                                </th>
                                <th>
                                    Banner
                                </th>
                                <th>
                                    Venue
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Website
                                </th>
                                <th>
                                    Ex. Footfall
                                </th>
                                <th>
                                    P.o.C
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($event = $events->fetch_assoc()) {?>
                            <?php $e_ser = unserialize($event['event_type']);?>
                            <tr>
                                <th><?=$count?></th>
                                <td>
                                    <?=$event['name']?>
                                </td>
                                <td>
                                    <?=date_format(date_create($event['start_date']), "d M y")?>
                                </td>
                                <td>
                                    <?=date_format(date_create($event['end_date']), "d M y")?>
                                </td>
                                <td>
                                    <img style="max-height: 150px;" src="../images/banner/<?=$event['banner']?>" alt="banner">
                                </td>
                                <td>
                                    <?=$event['venue']?>
                                </td>
                                <td>
                                    <?=$event['city']?>, <?=$event['state']?>
                                </td>
                                <td>
                                    <?php if ($event['event_type'] != null) {?>
                                    <?=implode(", ", $e_ser)?>
                                    <?php }?>
                                </td>
                                <td>
                                    <?=$event['website']?>
                                </td>
                                <td>
                                    <?=$event['ex_footfall']?>
                                </td>
                                <td>
                                    <?=$event['person_contact']?>
                                </td>
                                <td>
                                    <a href="edit-event.php?id=<?=$event['id']?>"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                    <a href="delete.php?id=<?=$event['id']?>&tbl=vf_events&location=index.php"
                                        class="btn btn-danger rounded-pill btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php $count++;}?>
                        </tbody>
                    </table>
                </div>
                <!-- End Events List -->

            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include "footer.php"?>