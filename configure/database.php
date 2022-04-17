<?php
require_once '../configure/constants.php';
require_once '../configure/functions.php';

$JSON = json_encode(createBlocks([
    [
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 20],
        ["row" => 6, "col" => 20],
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 7]
    ],
    [
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 35],
        ["row" => 6, "col" => 7],
        ["row" => 6, "col" => 7]
    ]
]));

if (!file_exists($targetDir)) {
    $newDir = mkdir($targetDir, 0744);
    if(!$newDir){
        echo `whoami`."<br>";
        echo "Unable to create directory to $targetDir<br>";
    }

    $seatsFile = fopen($targetDir . $seatsFileName, "w") or die("Unable to open file!");
    fwrite($seatsFile, $JSON);
    fclose($seatsFile);
}

if(!file_exists($targetDir . $seatsFileName)){
    $seatsFile = fopen($targetDir . $seatsFileName, "w") or die("Unable to open file!");
    fwrite($seatsFile, $JSON);
    fclose($seatsFile);
}