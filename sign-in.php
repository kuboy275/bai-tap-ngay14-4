<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php  
		$name = $password = $confirm = "";
		$nameErr = $passwordErr = $confirmErr = "";

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST['name'])) {
				$nameErr = "UserName bắt buộc nhập";
			}else{
				$name = isset($_POST['name']) ? $_POST['name'] : '';
				if (!preg_match('/^[a-zA-Z ]*$/', $name)) {
					$nameErr = "Chỉ chứa ký tự và khoảng trắng";
				}
			}
			if (empty($_POST['password'])) {
				$passwordErr = "Password bắt buộc nhập";
			}else{
				$password = isset($_POST['password']) ? $_POST['password'] : '';
				if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d])[\s\S]{8,}$/', $password)) {
					$passwordErr = "Password dài ít nhất 8 ký tự, trong đó có ít nhất một ký tự hoa, 1 chứ số, 1 ký tự";
				}
			}
			if ($_POST['confirm'] !== $_POST['password']) {
				$confirmErr = "PassWord không khớp , vui lòng nhập lại";
			}else{
				$confirm = isset($_POST['confirm']) ? ($_POST['confirm']) : '';
			}
		}
	?>

	<h1>Sign In</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table>
			<tr>
				<td>UserName:</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
				<td><span >*<?php echo $nameErr; ?></span></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" value="<?php echo $password;?>"></td>
				<td><span >*<?php echo $passwordErr; ?></span></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="confirm" value="<?php echo $confirm;?>"></td>
				<td><span >*<?php echo $confirmErr; ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
	<?php 
		if (isset($_POST['submit'])) {
			echo "<h1>Your Information</h1>";
		}
		echo $name.'<br>';
		echo $password.'<br>';
		echo $confirm.'<br>';
	?>
</body>
</html>