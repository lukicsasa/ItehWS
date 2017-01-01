<?php
include('layout.php');
include_once('header.php');
?>
<script src="addPlayer.js"></script>
<div class="container">
    <form class="well form-horizontal">
        <fieldset>

            <legend>Add New Player</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="first_name" id="first_name" placeholder="First Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Last Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name" id="last_name" placeholder="Last Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Nationality</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="nationality" id="nationality" placeholder="Nationality" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of birth</label>

                <div class="col-md-4 inputGroupContainer">

                    <div class="input-group date" id="date-picker">
                        <span class="input-group-addon"><i
                                class="glyphicon glyphicon-th"></i></span>
                        <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Foot</label>

                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="foot" value="Left"/> Left
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="foot" value="Right"/> Right
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Height</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-indent-right"></i></span>
                        <input id="height" name="height" placeholder="Height" class="form-control" type="text" required>
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
                    <button type="submit" name="save" onclick="addPlayer()" class="btn btn-primary">Send <span class="glyphicon glyphicon-send"></span>
                    </button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

