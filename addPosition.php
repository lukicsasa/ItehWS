<?php
include('layout.php');
include_once('header.php');
?>
<script src="addPosition.js"></script>
<div class="container">
    <form class="well form-horizontal">
        <fieldset>

            <legend>Add Position</legend>
            <div class="form-group">
                <label class="col-md-4 control-label">Position Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="name" id="name" placeholder="Position Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>

                <div class="col-md-4">
                    <button type="submit" name="save" onclick="addPosition()" class="btn btn-primary">Add<span
                            class="glyphicon glyphicon-plus"></span>
                    </button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<div class="container">
    <div class="well form-horizontal">

        <legend>Positions</legend>

        <table class="table table-hover positions-table">
            <thead id="positions-table">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody id="positions">
            </tbody>
        </table>
    </div>
</div>

