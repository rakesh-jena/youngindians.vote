<?php include 'classes/session.php';
$database = new Db();
$elections = $database->query("SELECT * FROM election");
$count = 1;

$states = $database->query("SELECT * FROM states");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $st = serialize($_POST['state']);
    $sql = "insert into `election`(`state`, `date`) values('" . $st . "', '" . date('Y-m-d', strtotime($_POST['date'])) . "')";
    $election = $database->query($sql);
    header('location:election.php');
}
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Election Dates</h5>

                <!-- Events List -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                State
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($election = $elections->fetch_assoc()) {?>
                        <?php $e_st = unserialize($election['state']);?>
                        <tr>
                            <th>
                                <?=$count?>
                            </th>
                            <td>
                                <?php if ($election['state'] != null) {?>
                                <?=implode(", ", $e_st)?>
                                <?php }?>
                            </td>
                            <td>
                                <?=$election['date']?>
                            </td>
                            <td>
                                <a href="edit-election.php?id=<?=$election['id']?>"
                                    class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                <a href="delete.php?id=<?=$election['id']?>&tbl=election&location=election.php"
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
                <h5 class="card-title">Add Election Date</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <label for="state" class="form-label">State</label>
                        <select id="state" class="form-select" required multiple name="state[]" value="">
                            <?php while ($state = $states->fetch_assoc()) {?>
                            <option value="<?=$state['name']?>">
                                <?=$state['name']?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="" required>
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