<?php
header("Content-Type: application/json; charset=UTF-8");
include("config/db.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
foreach($request as $data){
    $data = mysqli_real_escape_string($data);
}
@$title = $request->title;
@$desc = $request->desc;
@$gitHub = $request->gitHub;
@$live = $request->live;
@$imgURL = $request->imgUrl;
$msg = "";

$conn->query("INSERT INTO samples(title,description,github,live,imgURL) VALUES('$title','$desc','$gitHub','$live','$imgURL');") or die ($msg = "didn't work");
$conn->close();




echo $msg;
?>