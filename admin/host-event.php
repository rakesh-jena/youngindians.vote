<?php include 'classes/session.php';
$database = new Db();
$requests = $database->query("SELECT * FROM host_event ORDER BY `created_at` DESC");
$count = 1;
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Requests</h5>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($request = $requests->fetch_assoc()) {?>
                            <tr>
                                <th><?=$count?></th>
                                <td>
                                    <?=$request['fullname']?>
                                </td>
                                <td>
                                    <?=$request['email']?>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?=$request['id']?>&tbl=host_event&location=host-event.php"
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