<?php

require_once 'functions.php';

session_start();
if(!isset($_SESSION['userId'])){
    header('Location: login.php?type=login');
}

if (!isset($_GET['block']) || !isset($_GET['floor'])) {
    echo "Missing data, exiting...";
    exit();
}

$floor = "floor" . $_GET['floor'];
$block = "block" . $_GET['block'];
$user = $_SESSION['userId'];

$floors = getAllSeats("seats.json");
$selectedBlock = $floors[$floor][$block];
$seats = $selectedBlock["seats"];
$data = $selectedBlock["data"];

?>

<!DOCTYPE>
<html lang="hu">
<head>
    <title>Jegyvalaszto</title>
    <link rel="stylesheet" href="../css/style.css">
    <script id="jquery" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="../js/script.js"></script>
    <script src="../js/vue.js"></script>
</head>
<body>
<div id="#events-template"></div>
<div id="container">
    <div>
        <p><?php echo "$floor es $block, USER: $user" ?></p>
        <a href="logout.php">Kijelentkezes</a>
    </div>
    <div class="floor">
        <div class="seat-group">
            <?php for ($i = 1; $i <= $data["rows"]; $i++) { ?>
                <?php for ($j = 1; $j <= $data["columns"]; $j++) { ?>
                    <label class="switch">
                        <input type="checkbox" <?php
                        if($seats["$i-$j"]["user"] != null)
                        {
                            if($seats["$i-$j"]["user"] == $user)
                            {
                                echo "checked";
                            }else{
                                echo "disabled";
                            }
                        }
                        ?>  id="<?php echo "$i-$j"; ?>" onchange="onCheckValueChanged(this)">

                        <span class="slider <?php if($seats["$i-$j"]["user"] == $user) echo "owned" ?>"><?php echo $seats["$i-$j"]["num"] + 1 ?></span>
                    </label>
                <?php } ?>
                <br>
            <?php } ?>
            <button onclick="sendArray(<?php echo "'$floor', '$block', $user" ?>)">Save</button>
        </div>
    </div>
</div>
</body>
</html>
