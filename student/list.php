<?php require "../layout/header.php"?>
		<h1>Danh sách sinh viên</h1>
		<a href="add.php" class="btn btn-info">Add</a>
		<!-- <?php 
		$search = !empty($_GET["search"]) ? $_GET["search"]: null;
		 ?> -->
		<form action="list.php" method="GET">
			<label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?=$search?>">
				<button class="btn btn-danger">Tìm</button>
				
			</label>
		</form>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>stt</th>
					<th>id</th>
					<th>name</th>
					<th>birthday</th>
					<th>gender</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require "../config.php"; 
				require "../connectDb.php";


		$sql = "SELECT * FROM student";
		if(!empty($_GET["search"])) { // nếu có 
			$sql .= " WHERE name LIKE '%$search%'";
		}
		$result = $conn->query($sql);  // gửi chuổi của biến $sql xuống database
		$qty = 0;
		if ($result->num_rows > 0) {
		    // output data of each row
		    // false: false, 0, "", null
		    $order = 0;
		    while($row = $result->fetch_assoc()) { // fetch_assoc lấy 1 dòng
		    	$order++;
		    	$qty++;
		    	?>
					<tr>
						<td><?=$order?></td>
						<td><?=$row["id"]?></td>
						<td><?=$row["name"]?></td>
						<td><?=getVNFormatDate($row["birthday"])?></td>
						<td><?=getGenderName($row["gender"])?></td>
						<td><a href="edit.php?id=<?=$row["id"]?>">Sửa</a></td>
						<td><a class="delete" href="delete.php?id=<?=$row["id"]?>" type="student">Xóa</a></td>
					</tr>
		    	<?php

		    }
		}
?>


</tbody>
</table>
<div>
	<span>số lượng:<?=$qty?></span>
</div>

<?php require "../layout/footer.php"?>

<?php  function getVNFormatDate($standarDate) {
	$vnDate = date("d/m/y", strtotime($standarDate));
	return $vnDate;
}

	function getGenderName($gender) {
		$genderMap = [0 =>"nam", 1 => "nữ", 2 => "kxd"];
		$genderName = $genderMap[$gender];
		return $genderName;
	}


?>