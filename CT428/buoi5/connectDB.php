<?php
$conn = new mysqli("localhost", "root", "", "id16021442_buoi3");
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection fail: " . $conn->connect_error);
}
