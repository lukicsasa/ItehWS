<?php
    include 'layout.php';
    include  'header.php';
?>
<script src="editPlayer.js"></script>
<div class="container">
    <form class="well form-horizontal">
        <fieldset>

            <legend>Edit Player</legend>
            <input name="id" placeholder="id" id="id" value="<?php echo $_GET['id'] ?>" class="form-control" type="hidden">

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="first_name" id="first_name" placeholder="First Name"
                               class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Last Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name" id="last_name" placeholder="Last Name"
                               class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Nationality</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="nationality" id="nationality" placeholder="Nationality"
                               class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of birth</label>

                <div class="col-md-4 inputGroupContainer">

                    <div class="input-group date" id="date-picker">
                        <span class="input-group-addon"><i
                                class="glyphicon glyphicon-th"></i></span>
                        <input type="text" id="date_of_birth" name="date_of_birth"
                               class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Foot</label>

                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" id="foot" name="foot" value="Left"/>
                            Left
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" id="foot" name="foot" value="Right"/>
                            Right
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Height</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-indent-right"></i></span>
                        <input name="height" id="height" placeholder="Height"
                               class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Club</label>

                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <select name="club" id="clubs" class="form-control selectpicker" required>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Position</label>

                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                        <select id="positions" name="position" class="form-control selectpicker" required>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>

                <div class="col-md-4">
                    <button type="submit" onclick="updatePlayer()" name="update" class="btn btn-primary">Update <span
                            class="glyphicon glyphicon-send"></span>
                    </button>
                </div>
            </div>

        </fieldset>
    </form>
    <button class="btn btn-warning" onclick="goToPlayers()"><span class="glyphicon glyphicon-arrow-left"></span>
    </button>
</div>

