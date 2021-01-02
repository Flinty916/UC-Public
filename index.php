<?php

include('App/includes.php');

$ranks = new \UnitCommander\Rank();
$awards = new \UnitCommander\Award();
$training = new \UnitCommander\Training();
$units = new \UnitCommander\Unit();
$positions = new \UnitCommander\Position();

var_dump($positions->all);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UC API</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.css" rel="stylesheet"/>
</head>
<body class="bg-dark">
<div class="container">
    <h1>UC API</h1>
    <h3>Ranks</h3>
    <div class="row">
        <?php
        foreach ($ranks->all as $rank) {
//            $r = $ranks->single($rank->id);
            echo '<div class="col-lg-3 col-xs-12">';
            echo '<div class="card mb-4 shadow">';
            echo '<div class="card-header">'. $rank->name . '</div>';
            echo '<div class="card-body text-center">';
                echo '<img src="'.$rank->image.'" style="max-width:20%"><br /><br />';
                echo '<p>' . $rank->description . '</p>';
            echo '</div>';
            echo '</div></div>';
        }
        foreach($ranks->allGroups as $group) {
            echo '<div class="col-lg-3 col-xs-12">';
            echo '<div class="card mb-4 shadow">';
            echo '<div class="card-header">'. $group->name . '</div>';
            echo '<div class="card-body"><p>';
            foreach($group->ranks as $rank)
                echo $rank->name . ', ';
            echo '</p></div>';
            echo '</div></div>';
        }
        ?>
    </div>
    <h3>Awards</h3>
    <div class="row">
        <?php
        foreach ($awards->all as $award) {
            echo '<div class="col-lg-3 col-xs-12">';
            echo '<div class="card mb-4 shadow">';
            echo '<div class="card-header">'. $award->name . '</div>';
            echo '<div class="card-body text-center">';
            echo '<img src="'.$award->image.'" style="max-width:20%"><br /><br />';
            echo '<p>' . $award->description . '</p>';
            echo '</div>';
            echo '</div></div>';
        }
        foreach($awards->allGroups as $group) {
            echo '<div class="col-lg-3 col-xs-12">';
            echo '<div class="card mb-4 shadow">';
            echo '<div class="card-header">'. $group->name . '</div>';
            echo '<div class="card-body"><p>';
            foreach($group->awards as $award)
                echo $award->name . ', ';
            echo '</p></div>';
            echo '</div></div>';
        }
        ?>
    </div>
</div>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.js"
></script>
</body>
</html>
