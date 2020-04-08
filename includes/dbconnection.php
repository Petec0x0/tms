<?php
$server = $_SERVER["HTTP_HOST"];

$server_name = "$server";
$dbUsername = "capita51_tms_user";
$dbPassword = "@tms_userpassword";
$dbName = "capita51_tms";

$conn = mysqli_connect($server_name, $dbUsername, $dbPassword, $dbName);
