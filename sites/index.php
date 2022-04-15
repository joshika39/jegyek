<?php

require_once 'connect.php';

session_start();
if(!isset($_SESSION['userId'])){
    header('Location: login.php?type=login');
}
?>

<!DOCTYPE>
<html lang="hu">
<head>
    <title>Jegyvalaszto</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/seatgroups.css">
</head>
<body>
<div>
    <h1>Jegyek valasztasa</h1>
</div>
<div id="container">
    <a href="logout.php">Kijelentkezes</a>
    <div id="floor0" class="floor">
        <a class="seat-group small-group" href="detailed-seats.php?block=0&floor=0"><p>1</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=1&floor=0"><p>2</p></a>
        <a class="seat-group big-group" href="detailed-seats.php?block=2&floor=0"><p>3</p></a>
        <a class="seat-group big-group" href="detailed-seats.php?block=3&floor=0"><p>4</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=4&floor=0"><p>5</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=5&floor=0"><p>6</p></a>
    </div>
    <div id="floor1" class="floor">
        <a class="seat-group small-group" href="detailed-seats.php?block=0&floor=1"><p>1</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=1&floor=1"><p>2</p></a>
        <a class="seat-group ultra-group" href="detailed-seats.php?block=2&floor=1"><p>3</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=3&floor=1"><p>4</p></a>
        <a class="seat-group small-group" href="detailed-seats.php?block=4&floor=1"><p>5</p></a>
    </div>
</div>
</body>
</html>
