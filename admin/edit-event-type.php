<?php include 'classes/session.php';
$database = new Db();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $event_type = $database->query("SELECT * FROM event_types WHERE id = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "update `event_types` set event_type='" . $_POST['event_type'] . "' where id=" . $_POST['id'] . "";
    $updated_event_type = $database->query($sql);
    header('location:event-types.php');
}
include "header.php";
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                <i class="bi bi-gem"></i><span>VoterFestival</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="index.php">
                        <i class="bi bi-circle"></i><span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="add-event.php">
                        <i class="bi bi-circle"></i><span>Add Events</span>
                    </a>
                </li>
                <li>
                    <a href="event-types.php" class="active">
                        <i class="bi bi-circle"></i><span>Event Types</span>
                    </a>
                </li>
                <li>
                    <a href="add-event-type.php">
                        <i class="bi bi-circle"></i><span>Add Event Types</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Event Type</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <label for="eventType" class="form-label">Event Type</label>
                        <input type="hidden" value="<?=$id?>" name="id">
                        <input type="text" class="form-control" id="eventType" name="event_type"
                            value="<?=$event_type['event_type']?>" required>
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