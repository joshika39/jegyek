<?php

require_once 'functions.php';

if (isset($_POST)) {
    $result = $_POST['array'];
    $user = $_POST['userId'];
    $block = $_POST['block'];
    $floor = $_POST['floor'];

    writeNewJSON($floor, $block, "seats.json", "seats.json", $result, $user);
}
