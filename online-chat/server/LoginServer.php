<?php
	//设置验证码元素
	$number = range(0, 9);
	$lowCase = range('a','z');
	$upperCase = range('A','Z');
	//融合三个数组为一个
	$checkCodeArr = array_merge($number,$lowCase,$upperCase);
	$select_number_size = 4;
	$checkCode = NULL;
	
	
//收到验证码请求，回传验证码
	if($_GET['content'] == "checkCode"){
		$checkCode = NULL;
		shuffle($checkCodeArr);
		$select_kyes = array_rand($checkCodeArr, $select_number_size);
		//循环拼接选择的验证码
		for($i=0; $i< $select_number_size; $i++){
			$checkCode .= $checkCodeArr[$select_kyes[$i]];
		}
		$fp = fopen("../txt/checkCode.txt",'w');
		fwrite($fp, $checkCode);
		fclose($fp);
		echo $checkCode;
	}



//对用户登陆信息进行检查
	if($_GET['content'] == "checkInfo"){
	
		$userString = $_POST["username"];
		$pwdString = $_POST["password"];
		$checkString = $_POST["checkCode"];
		
		//设置数据库连接变量
		$host = "localhost";
		$user = "root";
		$pwd = "123456";
		$database = "chatRoom";
		
		//连接数据库
		$conn = mysqli_connect($host,$user,$pwd);
		mysqli_select_db($conn,$database);
		
		//判断用户名是否存在
		$sql1 = "SELECT * FROM `chatuser` WHERE(username = '$userString')";
		if(!mysqli_query($conn,$sql1)->num_rows){
			echo "NoThisUser";
			exit();
		}
		
		//判断密码是否正确
		$sql2 = "SELECT * FROM `chatuser` WHERE(username = '$userString')";
		$user_obj = mysqli_fetch_array(mysqli_query($conn,$sql2));
		if($pwdString != $user_obj["password"]){
			echo "passwordError";
			exit();
		}
		
		//检查验证码是否正确
		$checkCd = file_get_contents("../txt/checkCode.txt");	
		if($checkString != $checkCd){
			echo "checkCodeError";
			exit();
		}
		
		//到这里全部正确，返回信号
		echo "allRight";
	
	}
	
?>











