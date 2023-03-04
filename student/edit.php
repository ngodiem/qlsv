<?php require "../layout/header.php"?>
<h1>Chỉnh sửa sinh viên</h1>
<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?=$_GET["id"]?>" >
	<?php 
	require "../config.php"; 
	require "../connectDb.php";

	$id = $_GET["id"];
	$sql = "SELECT * FROM student WHERE id = $id";

	$result = $conn->query($sql);  // gửi chuổi của biến $sql xuống database
	$row = $result->fetch_assoc();
	?>
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Tên</label>
								<input type="text" class="form-control" placeholder="Tên của bạn" required name="name" value="<?=$row["name"]?>">
							</div>
							<div class="form-group">
								<label>Birthday</label>
								<input type="date" class="form-control" placeholder="<?=$row["birthday"]?>" required name="birthday" value="2000-03-09">
							</div>
<div class="form-group">
	<label>Chọn Giới tính</label>
	<select class="form-control" id="gender" name="gender" required>
	<?php $gender = $row["gender"] ?>
	<option value="0"  <?=$gender == 0 ? "selected":""?>>Nam</option>
	<option value="1" <?=$gender == 1 ? "selected":""?>>Nữ</option>
	<option value="2"<?=$gender == 2 ? "selected":""?> >Khác</option>
	</select>
</div>
<div class="form-group">
 <button class="btn btn-success" type="submit">Lưu</button>
</div>
</div>
</div>
</div>
</form>
			<?php require "../layout/footer.php"?>