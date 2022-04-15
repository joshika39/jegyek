<?php
$messages = null;
session_start();
require_once 'connect.php';
$type = null;
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if (!($type == "register" || $type == "login")) {
        $messages .= "<p class='error'>Error a linkben</p>";
        echo "Error";
        exit();
    }
}
else {
    header('Location: login.php?type=register');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($type == "register") {
        $name = $_POST['name'];
        $chk_stmt = "SELECT * FROM users WHERE email = '$email'";
        $chk_result = mysqli_num_rows(mysqli_query($conn, $chk_stmt));
        if ($chk_result == 0) {
            $insert_stmt = "INSERT INTO users VALUES('', '$email', '$password', '$name')";
            $insert_query = mysqli_query($conn, $insert_stmt);

            if ($insert_query) {
                $messages .= "<p class='info'>Success</p>";
            }
        } else {
            $messages .= "<p class='error'>Email foglalt</p>";
        }
    }
    elseif ($type == "login"){
        $login_stmt = "SELECT * FROM users WHERE email = '$email'";
        $login_result = mysqli_fetch_assoc(mysqli_query($conn, $login_stmt));

        if($login_result['password'] == $password){
            $_SESSION['userId'] = $login_result['id'];
            header('Location: index.php');
        }
        else{
            $messages .= "<p class='error'>Rossz jelszo</p>";
        }
    }
}

?>

<!DOCTYPE>
<html lang="hu">
<head>
    <title>Jegyvalaszto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php if ($messages != null) { ?>
    <div>
        <h3>Informaciok</h3>
        <p><?php echo $messages ?></p>
    </div>
<?php } ?>
<form action="" method="post">
    <?php if ($_GET['type'] == "register") { ?>
        <input type="text" name="name" required>
    <?php } ?>
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <input type="submit" name="submit">
</form>
<?php if ($_GET['type'] == "register") { ?>
    <a href="login.php?type=login">Login</a>
<?php } else { ?>
    <a href="login.php?type=register">Register</a>
<?php } ?>
</body>
</html>