<?php
//Variables to connect to the database

$host = "shell.ecs.fullerton.edu";
$username = "cs332t3";
$user_pass = "c5azj0tS";
$database_in_use = "cpsc332";

//create a database connection instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
?>
