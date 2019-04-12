<?php
	include('connect.php');
	if(isset($_GET['id'])){
		$id= $_GET['id'];
		$sql = "select * from user where user_id=".$id;
		$kt=mysqli_query($conn,$sql);
		$row=mysqli_fetch_row($kt);
		mysqli_free_result($kt);
	}
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SỬA</title>
</head>
<body>
	<table>
	<form method="POST"  >
	
		<br><br>
		<br><br>

		<label>	user_id</label>&nbsp&nbsp&nbsp <input type="" name="user_name" placeholder="<?php echo$_GET['id']; ?>"readonly><br><br>
		<label>	user_username</label>&nbsp&nbsp&nbsp <input type="" name="user_username"placeholder="<?php echo($row[1]) ?>"><br><br>
		<label>	user_email</label>&nbsp&nbsp&nbsp <input type="" name="user_email"placeholder="<?php echo($row[2]) ?>"><br><br>
		<label>	user_password</label>&nbsp&nbsp&nbsp <input type="" name="user_password"placeholder="<?php echo($row[3]) ?>"><br><br>
		<label>	user_old</label>&nbsp&nbsp&nbsp <input type="" name="user_old"placeholder="<?php echo($row[4]) ?>"><br><br>
		<label>	user_phone_number</label>&nbsp&nbsp&nbsp <input type="" name="user_phone_number"placeholder="<?php echo($row[5]) ?>"><br><br>
		<label>	user_address</label>&nbsp&nbsp&nbsp <input type="" name="user_address"placeholder="<?php echo($row[6]) ?>"><br><br>
		<label>	user_sex</label>&nbsp&nbsp&nbsp <input type="" name="user_sex"placeholder="<?php echo($row[7]) ?>"><br><br>
		<label>	user_image</label>&nbsp&nbsp&nbsp <input type="" name="user_image"placeholder="<?php echo($row[8]) ?>"><br><br>
		<label>	user_position</label>&nbsp&nbsp&nbsp <input type="" name="user_position"placeholder="<?php echo($row[9]) ?>"><br><br>
		<button type="submit" name="sua"> SỬA </button>
	</form>
	</table>
</body>
</html>
<?php 
	if (isset($_POST['sua'])) {
		# code...
		if ($_POST['user_username']==""||$_POST['user_email']==""||$_POST['user_password']==""||$_POST['user_old']==""||$_POST['user_phone_number']==""||$_POST['user_address']==""||$_POST['user_sex']==""||$_POST['user_image']==""||$_POST['user_position']=="") {
			echo "<script>alert('Bạn chưa nhập đủ thông tin')</script>";
			# code...
		}else{
			$sqll="UPDATE `user` SET `user_name`=".'"'.$_POST['user_username'].'",'."`user_email`=".'"'.$_POST['user_email'].'",'."`user_password`=".'"'.$_POST['user_password'].'",'."`user_old`=".'"'.$_POST['user_old'].'",'."`user_phone_number`=".'"'.$_POST['user_phone_number'].'",'."`user_address`=".'"'.$_POST['user_address'].'",'."`user_sex`=".'"'.$_POST['user_sex'].'",'."`user_image`=".'"'.$_POST['user_image'].'",'."`user_position`=".'"'.$_POST['user_position'].'"'."WHERE user_id =".$id ;
			$query = mysqli_query($conn,$sqll);
			echo "<script>alert('Đã cập nhật thông tin !')</script>";
			header("location:users-manager.php");

		}

	}
 ?>