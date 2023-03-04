<?php 
require "../config.php"; 
require "../connectDb.php";
$name = $_POST["name"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$id =  $_POST["id"];
$sql = "UPDATE student SET name = '$name', birthday = '$birthday', gender ='$gender' WHERE id = $id";
session_start();
if ($conn->query($sql)) {
	// $last_id = $conn->insert_id;//chỉ cho auto increment
    $_SESSION["success"] = "đã update  sinh viên $name thành công";
} else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
}
header("location: list.php");
 ?>