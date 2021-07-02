<?php 

/*连接数据库，获取数据库中所有用户*/
	//设置数据库连接变量
	$host = "localhost";
	$user = "root";
	$pwd = "123456";
	$database = "chatRoom";
	
	$conn = mysqli_connect($host,$user,$pwd);
	mysqli_select_db($conn,$database);
	$sql = "SELECT username,time,online FROM chatuser";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){
		$timeNow = time();
		$time_gap = $timeNow - $row["time"];
		$userString = $row["username"];
		$sql1 = "UPDATE chatuser SET online='DOWN' WHERE(username = '{$userString}')";
		$sql2 = "UPDATE chatuser SET online='UP' WHERE(username = '{$userString}')";

		if($time_gap >= 30){
			mysqli_query($conn,$sql1);
		}else{
			mysqli_query($conn,$sql2);	
		}
	}
	$conn->close();
?>