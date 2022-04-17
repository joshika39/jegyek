<?php

if(isset($_POST)){

    $floor = $_POST['floor'];
    $block = $_POST['block'];

    $JSON = getAllSeats('seats.json');
    echo json_encode($JSON[$floor][$block]);
}