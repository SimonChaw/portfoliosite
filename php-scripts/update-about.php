<?php
header("Content-Type: application/json; charset=UTF-8");
include("config/db.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$paragraph1 = $request->paragraph1;
@$paragraph2 = $request->paragraph2;

$conn->query("UPDATE `about` SET `paragraph`='$paragraph1' WHERE id = 1");
$conn->query("UPDATE `about` SET `paragraph`='$paragraph2' WHERE id = 2");

$conn->close();

?>