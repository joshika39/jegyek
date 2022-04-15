<?php
require_once 'functions.php';
require_once 'connect.php';

$file = "seats.json";

if (file_exists($file)) {
    $JSON = json_encode(createBlocks([
        [
            ["row" => 6, "col" => 7],
            ["row" => 6, "col" => 7],
            ["row" => 6, "col" => 20],
            ["row" => 6, "col" => 20],
            ["row" => 6, "col" => 7],
            ["row" => 6, "col" => 7]
        ]
    ]));

    $seatsFile = fopen($file, "w") or die("Unable to open file!");
    fwrite($seatsFile, $JSON);
    fclose($seatsFile);
}





