<?php

include('App/includes.php');

$ranks = new \UnitCommander\Rank();
$awards = new \UnitCommander\Award();
$training = new \UnitCommander\Training();
$units = new \UnitCommander\Unit();
$positions = new \UnitCommander\Position();

$profile = new \UnitCommander\Profile(76561198191648055);


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
</div>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.js"
></script>
</body>
</html>
