<?php
$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$sql = "SELECT * FROM school";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Succesful";
} else {
    echo "Unsuccesful";
}
?>