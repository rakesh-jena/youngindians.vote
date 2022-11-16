<?php include 'classes/session.php';
$database = new Db();
$events = $database->query("SELECT * FROM event_types");
$count = 1;

$states = $database->query("SELECT * FROM states");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "insert into `event_types`(`event_type`) values('" . $_POST['event_type'] . "')";
    $event = $database->query($sql);
    header('location:event-types.php');
}
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Event Types</h5>

                <!-- Events List -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($event = $events->fetch_assoc()) {?>
                        <tr>
                            <td>
                                <?=$count?>
                            </td>
                            <td>
                                <?=$event['event_type']?>
                            </td>
                            <td>
                                <a href="edit-event-type.php?id=<?=$event['id']?>"
                                    class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                <a href="delete.php?id=<?=$event['id']?>&tbl=event_types&location=event-types.php"
                                    class="btn btn-danger rounded-pill btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php $count++;}?>
                    </tbody>
                </table>
                <!-- End Events List -->

            </div>
        </div>
    </section>

    <!-- Add Event Type-->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Event Type</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <label for="eventType" class="form-label">Event Type</label>
                        <input type="text" class="form-control" id="eventType" name="event_type" value="" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- Vertical Form -->

            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include "footer.php"?>