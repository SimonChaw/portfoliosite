<?php
header("Content-Type: application/json; charset=UTF-8");
include("config/db.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$result = $conn->query("SELECT * FROM samples");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Title":"'  . $rs["title"] . '",';
    $outp .= '"Image":"'   . $rs["imgURL"]        . '",';
    $outp .= '"id":"'   . $rs["id"]        . '",';
    $outp .= '"Desc":"'   . $rs["description"]        . '",';
    $outp .= '"GitHub":"'   . $rs["github"]        . '",';
    $outp .= '"Live":"'. $rs["live"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>