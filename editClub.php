<?php
    include ('layout.php');
    include ('header.php');
?>

<script src=editClub.js></script>
<div class="container">
    <form class="well form-horizontal" action="editClub.php" method="post" id="contact_form">
        <fieldset>

            <legend>Edit Club</legend>
            <input name="id" placeholder="id" id="id" value="<?php echo $_GET['id'] ?>" class="form-control" type="hidden">

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="name" placeholder="Name" id="name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="country" placeholder="Country" id="country" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">League</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="league" placeholder="League" id="league" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Stadium</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="stadium" placeholder="Stadium" id="stadium" class="form-control" type="text" required>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" id="update" name="update" onclick="updateClub()" class="btn btn-primary">Update <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
    <button class="btn btn-warning" onclick="goToClubs()"><span class="glyphicon glyphicon-arrow-left"></span></button>
</div>
