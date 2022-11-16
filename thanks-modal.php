<?php
$firstname = $_GET['firstname'];
?>
<div class="modal fade" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body text-start" style="padding: 40px 40px; background:#011538">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2 class="anton" style="color: #f0d185;">Hi <?=$firstname?>,</h2>
                <p style="color: #f0d185;">
                    Thank you for your submission! <br>
                    We will be in touch soon; don’t forget to check your inbox and spam
                    for updates.
                </p>
            </div>
        </div>
    </div>
</div>