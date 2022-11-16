<?php include 'classes/session.php';
$database = new Db();
$res = $database->query("SELECT * FROM voter_count");
$count = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "update `voter_count` set count=" . $_POST['count'] . "";
    $event = $database->query($sql);
    header('location:voter_count.php');
}
include "header.php";
?>

<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Voter Count</h5>

                <!-- Voter Count -->
                <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <label for="count" class="form-label">Count</label>
                        <input type="text" class="form-control" id="count" name="count" value="<?=$count['count']?>"
                            required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End Voter Count -->

            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include "footer.php"?>