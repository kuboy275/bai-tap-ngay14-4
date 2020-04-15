<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php  
		$name = $day = $score = "";
		$nameErr = $dayErr = $scoreErr = "";

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (empty($_POST['name'])) {
				$nameErr = 'bạn không được bỏ trống ô này!';
			}else{
				$name = isset($_POST['name']) ? ($_POST['name']) : '';
				if (!preg_match('/^[a-zA-Z ]*$/', $name)) {
					$nameErr = "Họ và tên chỉ chứa ký tự và khoảng trắng";
				}
			}
			// $pattern = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
			if (empty($_POST['ngay'])) {
				$dayErr = 'bạn không được bỏ trống ô này';
			}else{
				$ngay = isset($_POST['ngay']) ? ($_POST['ngay']) : '';
				if (!preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/', $day)) {
					$dayErr = 'Vui lòng điền lại Ngày sinh';
				}

			}
			if (empty($_POST['diem'])) {
				$scoreErr = 'Điểm TB không được để trống';
			}else{
				$score = isset($_POST['diem']) ? ($_POST['diem']) : '';
				if ($_POST['diem'] > 10) {
					$scoreErr = 'Nhập điểm TB từ 0 đến 10';
				}
			}
		}	
	?>

	<h1>NHẬP THÔNG TIN</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table>
			<tr>
				<td>Họ và tên:</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
				<td><span class="col">*<?php echo $nameErr; ?></span></td>
			</tr>
			<tr>
				<td>Ngày sinh:</td>
				<td><input type="text" name="ngay" value="<?php echo $day;?>"></td>
				<td><span class="col">*<?php echo $dayErr; ?></span></td>
			</tr>
			<tr>
				<td>Điểm TB:</td>
				<td><input type="text" name="diem" value="<?php echo $score;?>"></td>
				<td><span class="col">*<?php echo $scoreErr; ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	<?php 
		if (isset($_POST['submit'])) {
			echo "<h1>Thông Tin Của Bạn</h1>";
		}
		echo $name.'<br>';
		echo $day.'<br>';
		echo $score.'<br>';
	?>
</body>
</html>