<?php

	//设置数据库连接变量
	$host = "localhost";
	$user = "root";
	$pwd = "123456";
	$database = "chatRoom";
	

//正常刷新用户在线列表
	if(@$_GET["content"] == "RefreshOnlineList"){
		//连接数据库
		$conn = new mysqli($host, $user, $pwd, $database);
		$sql1 = "SELECT username,online FROM chatuser";
		$result = $conn->query($sql1);
		//打包所有用户在线信息并回传
		if ($result->num_rows > 0) {
			$echoString = "";
			while($row = $result->fetch_assoc()) {
				if($row["online"] == "UP"){
					$echoString .= "<a href='#'><div style='background:#0F0;'></div>". $row['username'] . "</a>";
				}
				else{
					$echoString .= "<a href='#'><div></div>". $row['username'] . "</a>";	
				}
			}
			echo $echoString;
		}else{
			echo "None";
		}
		$conn->close();
	}


?>