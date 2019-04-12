<?php
	include('connect.php');
	if(isset($_POST['them']))
	{
		$user_id= $_POST['user_id'];
		$user_name= $_POST['user_name'];
		$user_email= $_POST['user_email'];
		$user_password= $_POST['user_password'];
		$user_old= $_POST['user_old'];
		$user_phone_number= $_POST['user_phone_number'];
		$user_address= $_POST['user_address'];
		$user_sex= $_POST['user_sex'];
		$user_image= $_POST['user_image'];
		$user_position= $_POST['user_position'];

		$sql = "INSERT INTO `user`( `user_name`, `user_email`, `user_password`, `user_old`, `user_phone_number`, `user_address`, `user_sex`, `user_image`, `user_position`) VALUES ("."'".$user_name."'".","."'".$user_email."'".","."'".$user_password."'".","."'".$user_old."'".","."'".$user_phone_number."'".","."'".$user_address."'".","."'".$user_sex."'".","."'".$user_image."'".","."'".$user_position."'".")";
			$result = $conn->query($sql) or die('lỗi truy vấn');
			header("location:users-manager.php");
	}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>THÊM</title>
</head>
<body>
	<table>
	<form method="post" >
	
		
		<label>	user_name</label>&nbsp&nbsp&nbsp <input type="" name="user_name"><br><br>
		<label>	user_email</label>&nbsp&nbsp&nbsp <input type="" name="user_email"><br><br>
		<label>	user_password</label>&nbsp&nbsp&nbsp <input type="" name="user_password"><br><br>
		<label>	user_old</label>&nbsp&nbsp&nbsp <input type="" name="user_old"><br><br>
		<label>	user_phone_number</label>&nbsp&nbsp&nbsp <input type="" name="user_phone_number"><br><br>
		<label>	user_address</label>&nbsp&nbsp&nbsp <input type="" name="user_address"><br><br>
		<label>	user_sex</label>&nbsp&nbsp&nbsp <input type="" name="user_sex"><br><br>
		<label>	user_image</label>&nbsp&nbsp&nbsp <input type="" name="user_image"><br><br>
		<label>	user_position</label>&nbsp&nbsp&nbsp <input type="" name="user_position"><br><br>
		<button type="submit" name="them"> thêm </button>
	</form>
	</table>

</body>
</html>