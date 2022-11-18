<div class="modal fade" id="hostModal" tabindex="-1" aria-labelledby="hostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modelbg">
            <div class="modal-body" style="padding: 40px 40px;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="anton" style="color: #f0d185;">Interested in hosting YIF at your event? </h5>
                <form id="host-yif" method="POST" action="function.php">
                    <input type="hidden" name="fname" value="host-event">
                    <div style="color: #fff;" class="host-email text-start">
                        <p>
                            To : <span class="mailhover">
                                contact@youngindiafoundation.org
                            </span>
                        </p>
                        
                        <div class="input-div one">
                            <div class="i">

                            </div>
                            <div class="div">
                                <h6>From :</h6>
                                <input type="email" name="email" class="input modalfield" required="">
                            </div>
                        </div>
                        
                        <p>
                            Subject : Host YIF
                        </p>
                        <p>
                            Hello team,
                        </p>
                        <p>
                            We're hosting an event where we would like to host a voter registration booth to
                            encourage civic engagement.
                        </p>
                        <p>Thank you</p>
                        
                        <div class="input-div one">
                            <div class="i">

                            </div>
                            <div class="div">
                                <h6>Full Name</h6>
                                <input type="text" name="fullname" class="input modalfield" required="">
                            </div>
                        </div>
                        
                        <button type="submit" class="mailbutton btn btn-sm btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
