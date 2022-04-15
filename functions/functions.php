<?php

use JetBrains\PhpStorm\Pure;

function createSeatBlock($row, $col): array
{
    $seats = array();
    $seatCount = 0;
    for ($i = 1; $i <= $row; $i++) {
        for ($j = 1; $j <= $col; $j++) {

            $user = null;

            $seats += ["$i-$j" =>
                [
                    "num" => $seatCount,
                    "row" => $i,
                    "col" => $j,
                    "user" => $user
                ]
            ];
            $seatCount++;
        }
    }
    return $seats;
}

#[Pure] function createBlocks(array $floorSetArrays): array
{
    $floors = array();
    for ($i = 0; $i < count($floorSetArrays); $i++) {
        $blocks = array();
        $floorData = $floorSetArrays[$i];

        for ($j = 0; $j < count($floorData); $j++) {
            $row = $floorData[$j]['row'];
            $col = $floorData[$j]['col'];
            $blocks += ["block$j" =>
                [
                    "data" => ["columns" => $col, "rows" => $row],
                    "seats" => createSeatBlock($row, $col)
                ]
            ];
        }
        $floors += ["floor$i" => $blocks];

    }
    return $floors;
}

function getAllSeats($JSONFilePath): array
{
    $json_data = file_get_contents($JSONFilePath);
    return json_decode($json_data, true);
}

function writeNewJSON($floor, $block, $sourceFile, $targetFile, $editedSeats, int $editor)
{
    $JSONArray = getAllSeats($sourceFile);

    for ($i = 0; $i < count($editedSeats); $i++) {
        $JSONArray[$floor][$block]['seats'][$editedSeats[$i]]["user"] = $editor;
    }

    $JSON = json_encode($JSONArray);
    $seatsFile = fopen($targetFile, "w") or die("Unable to open file!");
    fwrite($seatsFile, $JSON);
    fclose($seatsFile);
}



