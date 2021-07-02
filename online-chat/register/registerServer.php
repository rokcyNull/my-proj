<?php 
	$username = $_POST["username"];
	$psd = $_POST["password"];
	$Ques = $_POST["Question"];
	$AnQues = $_POST["AnQuestion"];
	
	//设置数据库连接变量
	$host = "localhost";
	$user = "root";
	$pwd = "123456";
	$database = "chatRoom";
	
	//连接数据库
	$conn = mysqli_connect($host,$user,$pwd);
	mysqli_select_db($conn,$database);
	
	//将用户信息存入数据库			
	$sql2 = "insert into chatuser(username,password,Question,AnQues) 
				values('{$username}','{$psd}','{$Ques}','{$AnQues}')";
	
	//根据存入结果跳转至相应界面	
	if(!mysqli_query($conn,$sql2)){
		//如果存入失败，跳转至失败页面
		include("registerFail.php");
	}
	else{
		//数据存入成功，则跳转到注册成功界面
		include("registerSuccess.php");
	}
?>