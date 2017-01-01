<?php
    include('layout.php');
    include('header.php');
?>
<script src="home.js"></script>
<div class="index-wrapper">
    <div class="panel panel-default col-md-3">
        <h4 class="panel-heading">Last Added Player</h4>
            <div id="lastPlayer"></div>
            <br/>
        <button class="btn btn-sm btn-info" onclick="location.href='players.php'">Players</button>
    </div>
    <div class="panel panel-default col-md-3">
        <h4 class="panel-heading">Last Added Club</h4>
            <div id="lastClub"></div>
            <br/>
        <button class="btn btn-sm btn-info" onclick="location.href='clubs.php'">Clubs</button>
    </div>
    <div class="panel panel-default col-md-3">
        <h4 class="panel-heading">Positions</h4>
            <div id="positions"></div>
            <br/>
    </div>
    <div style="width:95%;">
    <legend>Premier League Teams</legend>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Short Name</th>
                <th>Market Value</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody id="teams">
        </tbody>
    </table>
        </div>
</div>