<?php 
$id = $_GET["id"];
require "../config.php"; 
require "../connectDb.php";
// Lệnh xóa
$sql = "DELETE FROM student WHERE id = $id";
session_start();
if ($conn->query($sql)) {
	// $last_id = $conn->insert_id;//chỉ cho auto increment
    $_SESSION["success"] = "đã xóa sinh viên  thành công";
} else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
}
header("location: list.php");

 ?>