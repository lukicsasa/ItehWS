<?php
include('layout.php');
include_once('header.php');
?>
<script src="addClub.js"></script>
<div class="container">
    <form class="well form-horizontal" action=" " method="post" id="contact_form">
        <fieldset>
            <legend>Add New Club</legend>
            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="name" id="name" placeholder="Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="country" id="country" placeholder="Country" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">League</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="league" id="league" placeholder="League" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Stadium</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="stadium" id="stadium" placeholder="Stadium" class="form-control" type="text" required>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" name="save" onclick="addClub()" class="btn btn-primary">Send <span class="glyphicon glyphicon-send"></span>
                    </button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

