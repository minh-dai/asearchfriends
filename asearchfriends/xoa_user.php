<?php  
	include('connect.php');
	$id = $_GET['id'];
	echo $id;
	$sql = " DELETE FROM `user` WHERE user_id =".$id;
	$result = $conn->query($sql) or die('lỗi truy vấn');
	echo 'aaaa';
	header("location:users-manager.php");
?>