<?php include 'classes/session.php';
$database = new Db();
$states = $database->query("SELECT * FROM states");
$event_types = $database->query("SELECT * FROM event_types");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpFile = $_FILES['banner']['tmp_name'];
    $newFile = '../images/banner/' . $_FILES['banner']['name'];
    $result = move_uploaded_file($tmpFile, $newFile);

    $e_types = serialize($_POST['event_type']);
    $sql = "insert into `vf_events`(`name`, `start_date`, `end_date`, `venue`, `city`, `state`, `event_type`,`description`, `banner`, `person_contact`, `website`, `ex_footfall`) values('" . $_POST['name'] . "','" . date('Y-m-d', strtotime($_POST['start_date'])) . "','" . date('Y-m-d', strtotime($_POST['end_date'])) . "','" . $_POST['venue'] . "','" . $_POST['city'] . "','" . $_POST['state'] . "','" . $e_types . "','" . $_POST['description'] . "','" . $_FILES['banner']['name'] . "','" . $_POST['person_contact'] . "','" . $_POST['website'] . "','" . $_POST['ex_footfall'] . "')";
    $event = $database->query($sql);
    header('location:index.php');
}

include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Event</h5>

                <!-- Vertical Form -->
                <form class="row g-3" enctype="multipart/form-data" method="POST"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <label for="eventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="eventName" name="name" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="venue" class="form-label">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select" required name="state">
                            <option selected disabled value>Choose...</option>
                            <?php while ($state = $states->fetch_assoc()) {?>
                            <option value="<?=$state['name']?>">
                                <?=$state['name']?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="" required>
                    </div>
                    <div class="col-6">
                        <label for="event_type" class="form-label">Event Type</label>
                        <select id="event_type" class="form-select" required multiple name="event_type[]">
                            <?php while ($type = $event_types->fetch_assoc()) {?>
                            <option value="<?=$type['event_type']?>">
                                <?=$type['event_type']?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="col-6">
                        <label for="banner" class="form-label">Banner</label>
                        <input type="file" accept="image/*" class="form-control" id="banner" name="banner">
                    </div>
                    <div class="col-12">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="">
                    </div>
                    <div class="col-6">
                        <label for="ex_footfall" class="form-label">Expected Footfall</label>
                        <input type="text" class="form-control" id="ex_footfall" name="ex_footfall" value="">
                    </div>
                    <div class="col-6">
                        <label for="person_contact" class="form-label">Person(s) of Contact</label>
                        <input type="text" class="form-control" id="person_contact" name="person_contact" value="">
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