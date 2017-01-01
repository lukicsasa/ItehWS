<?php
include_once('layout.php');
include_once('header.php');
include_once('playerClass.php');
include_once('clubClass.php');
include_once('positionClass.php')
?>
<script src="players.js"></script>
<div id="container" class="container">
    <div class="well form-horizontal">

        <legend>Players</legend>

        <table class="table table-hover">
            <thead id="players-table">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    Date Of Birth
                </th>
                <th>
                    Nationality
                </th>
                <th>
                    Height
                </th>
                <th>
                    Foot
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody id="players">
            </tbody>
        </table>
    </div>
</div>
