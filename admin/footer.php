<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="credits">
        Designed by <a href="kwad.in">KWAD</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"
    integrity="sha256-mBCu5+bVfYzOqpYyK4jm30ZxAZRomuErKEFJFIyrwvM=" crossorigin="anonymous"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
$(document).ready(function() {
    var multipleCancelButton = new Choices('#event_type', {
        removeItemButton: true,
        maxItemCount: 10,
        searchResultLimit: 5,
        renderChoiceLimit: 5
    });
    var multipleSelect = new Choices('#state', {
        removeItemButton: true,
        maxItemCount: 10,
        searchResultLimit: 5,
        renderChoiceLimit: 5
    });
});
</script>
</body>

</html>