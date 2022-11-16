<?php include 'classes/session.php';
$database = new Db();
$volunteers = $database->query("SELECT * FROM volunteer_event ORDER BY `created_at` DESC");
$count = 1;
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Volunteers</h5>
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
                                    Email
                                </th>
                                <th>
                                    Age
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Event
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($volunteer = $volunteers->fetch_assoc()) {?>
                            <?php $event = $database->query("SELECT * FROM vf_events WHERE id=" . $volunteer['event_id'] . "")->fetch_assoc();?>
                            <tr>
                                <th><?=$count?></th>
                                <td>
                                    <?=$volunteer['fullname']?>
                                </td>
                                <td>
                                    <?=$volunteer['email']?>
                                </td>
                                <td>
                                    <?=$volunteer['age']?>
                                </td>
                                <td>
                                    <?=$volunteer['mobile']?>
                                </td>
                                <td>
                                    <?=$event['name']?>
                                </td>
                                <td>
                                    <?=$volunteer['status']?>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?=$volunteer['id']?>&tbl=volunteer_event&location=volunteer.php"
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