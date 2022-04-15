<?php

$conn = mysqli_connect("localhost","root","") or die("Error connecting");

$db_create = "CREATE DATABASE IF NOT EXISTS jegyek;";
$users_table_create = "CREATE TABLE IF NOT EXISTS `jegyek`.`users` ( `id` INT NOT NULL AUTO_INCREMENT, `email` VARCHAR(60) NOT NULL, `password` VARCHAR(150) NOT NULL,  `name` VARCHAR(60) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;";
$create_db_query = mysqli_query($conn, $db_create);

$conn = mysqli_connect("localhost","root","", "jegyek") or die("Error connecting again");

$create_users_query = mysqli_query($conn, $users_table_create);
