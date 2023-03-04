<?php 

$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME); // tạo kết nối biến $conn đang giữ sự kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");


 ?>