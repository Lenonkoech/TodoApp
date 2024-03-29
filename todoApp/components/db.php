<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "todoapp";
$conn = new mysqli($host, $user, $password, $dbname);
if (!$conn) {
    return "Error connecting to database";
}