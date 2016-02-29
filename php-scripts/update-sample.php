<?php
header("Content-Type: application/json; charset=UTF-8");
include("config/db.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$id = $request->id;
@$title = $request->title;
@$desc = $request->desc;
@$live = $request->live;
@$github = $request->gitHub;
@$imgURL = $request->imgURL;
//$msg = "";


$conn->query("UPDATE `samples` SET `title`='$title', `description`='$desc', `live`='$live', `github`='$github',`imgURL`='$imgURL' WHERE id = $id");

$conn->close();

?>