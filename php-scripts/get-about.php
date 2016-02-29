<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "simonhfxweb", "Dragonslay3r!", "simonhfx_portfolio");

$result = $conn->query("SELECT * FROM about");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"paragraph":"'. $rs["paragraph"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>