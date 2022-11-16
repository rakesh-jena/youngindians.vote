<?php
$event = $_GET['event'];
$date = $_GET['date'];

?>
<div class="modal fade" id="thvolModal" tabindex="-1" aria-labelledby="thvolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body text-start" style="padding: 40px 10px;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <p>Hello <?=$_GET['firstname']?>,</p>
                <p>
                    Thank you for your interest in volunteering for democracy. You will be considered for
                    <strong>"<?=$event?>"</strong>
                    on <strong><?=date_format(date_create($date), "d F'y")?></strong>.
                    Your registration does not guarantee your participation. All volunteers selected must go through a
                    short call and a training process with the YIF team. If selected, we will be in touch with you a
                    month before the day of the event.
                </p>
                <p>
                    Selected or not, we hope to see you participate in the youth’s new hobby - #GetInked! Check your
                    voting status <a href="am-i-registered.php">here</a> or register to vote <a href="#">here</a>.
                </p>
            </div>
        </div>
    </div>
</div>