<?php

$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$sid = $_POST["schoolID"];
$pw = $_POST["pw"];
$sql = "SELECT pw from school where id = '$sid';";
$result = mysqli_query($conn, $sql);
$data = array();
while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>