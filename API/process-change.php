<?php
require_once '../configure/constants.php';
require_once '../configure/database.php';


if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $_POST['array'];
    $user = $_POST['userId'];
    $block = $_POST['block'];
    $floor = $_POST['floor'];

    echo writeNewJSON($floor, $block, $targetDir.$seatsFileName, $targetDir.$seatsFileName, $result, $user);
}
else{
    echo "Wrong call!";
}
