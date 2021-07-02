<?php

	$userString = $_POST['username'];
	
	//设置数据库连接变量
	$host = "localhost";
	$user = "root";
	$pwd = "123456";
	$database = "chatRoom";
		
	
	
	if(@$_GET["content"] == "userLogOut"){
		//连接数据库
		$conn = mysqli_connect($host,$user,$pwd);
		mysqli_select_db($conn,$database);
		$sql2 = "UPDATE chatuser SET online='DOWN' WHERE(username = '{$userString}')";
		mysqli_query($conn,$sql2);
		$conn->close();
	}
		
	if(@$_GET["content"] == "LogIn"){
		//连接数据库
		$conn2 = mysqli_connect($host,$user,$pwd);
		mysqli_select_db($conn2,$database);
		$sql3 = "UPDATE chatuser SET online='UP' WHERE(username = '{$userString}')";
		mysqli_query($conn2,$sql3);
		$conn2->close();
	}
	
	//收到用户live信息，在数据库中修改用户最近的时间戳
	if(@$_GET["content"] == "keepAlive"){
		//连接数据库
		$conn3 = mysqli_connect($host,$user,$pwd);
		mysqli_select_db($conn3,$database);
		$timeNow = time();
		$sql4 = "UPDATE chatuser SET time='{$timeNow}' WHERE(username = '{$userString}')";
		mysqli_query($conn3,$sql4);
		$conn3->close();
	}
?>