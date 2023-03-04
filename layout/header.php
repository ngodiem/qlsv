<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý sinh viên</title>
	<link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
	<link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
	<div class="container" style="margin-top:20px;">
		<a href="../student/list.php" class="active btn btn-info">Students</a>
		<a href="../subject/list.php" class=" btn btn-info">Subject</a>
		<a href="../register/list.php" class=" btn btn-info">Register</a>
		<?php 
		session_start();
		$message = "";
		$classInfo = "";
		if(!empty($_SESSION["error"])) {
			$message = $_SESSION["error"];
			unset($_SESSION["error"]);
			$classInfo = "alert-danger";
		}
		elseif (!empty($_SESSION["success"])) {
			$message = $_SESSION["success"];
			unset($_SESSION["success"]);
			$classInfo = "alert-success";
		}
		 ?>

		 <?php 
		 if(!empty($message)):

		  ?>
		<div style="height:40px; margin-top:20px">
			<div class="alert <?=$classInfo?> container-fluid text-center">
				<?=$message?>
			</div>
			
		</div>
		<?php endif ?>