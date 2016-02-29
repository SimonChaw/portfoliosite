<?php
header("Content-Type: application/json; charset=UTF-8");
include("config/db.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
foreach($request as $data){
    $data = mysqli_real_escape_string($data);
}

@$id = $request->id;

$msg = "";
$conn->query("DELETE FROM samples WHERE id = $id;");
$conn->close();

echo $msg;
?>

