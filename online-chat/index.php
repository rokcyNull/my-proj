<?php
	session_start();
	//用户名为空时，不让其进入聊天室页面
	//$_POST[] 前加@ 表示屏蔽错误以及警告信息
	if(@$_POST["username"] != ""){
		$_SESSION["username"] = $_POST["username"];
		date_default_timezone_set("Asia/Shanghai");
		$_SESSION["loginTime"] = date("Y-m-d")." ". date("H:i:s");
		$_SESSION["loginBegin"] = "00:00:00";
		header("location:chatShow.php");
	}
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>聊天室登录界面</title>
    <link type="text/css" href="css/yahooInitial.css">
    <script type="application/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="application/javascript" src="js/chatLogin.js"></script>
    <style>
		body{
			background:url(images/loginRgisBg/bg04.jpeg);
			background-attachment:fixed;
			background-size:cover;	
		}
    	#container{
			width:340px;
			height:400px;
			margin-left:60%;
			margin-top:150px;
			border-top-left-radius:12px;
			border-top-right-radius:12px;
			background:#EEE;
		}
		#title{
			width:inherit;
			height:45px;
			line-height:45px;
			text-align:center;
			font-size:24px;
			letter-spacing:5px;
			background:#39F;
			margin-bottom:30px;
			border-top-left-radius:12px;
			border-top-right-radius:12px;
		}
		.inputBox{
			width:inherit;
			height:28px;
			margin-bottom:10px;
			background:;
		}
		.inputPrompt{
			display:block;
			height:28px;
			width:60px;
			line-height:28px;
			text-align:center;
			margin-left:20px;
			margin-right:5px;
			font-size:16px;
			float:left;
		}
		.inputArea{
			width:220px;
			height:24px;
			background:rgba(204,204,204,0.6);
			border-width:thin;
			float:left;	
			font-size:15px;
		}
		/*验证码*/
		#checkCodeBox{
			width:inherit;
			height:32px;
			margin-top:15px;
		}
		#checkCodeinput{
			width:90px;
			height:28px;
			background:rgba(204,204,204,0.6);
			background-size:cover;
			border-width:thin;
			float:left;
			font-size:14px;
		}
		#checkCodeImg{
			width:90px;
			height:32px;
			line-height:28px;
			text-align:center;
			background:url(images/checkCodeBg/checkbg1.jpg);
			font-size:17px;
			letter-spacing:2px;
			float:left;
			margin-left:5px;
			cursor:pointer;
		}
		#checkCodeTime{
			width:30px;
			height:32px;
			line-height:32px;
			text-align:center;
			float:left;
			margin-left:5px;
			background:yellow;
		}
		
		/* 没有账号，立马注册 */
		#registerBox{
			width:inherit;
			height:15px;
			line-height:15px;
			text-align:right;
			font-size:12px;
			padding-right:25px;
			margin-top:5px;
			background:;
		}
		
		/* 登陆报错 */
		#loginErrorBox{
			width:inherit;
			height:15px;
			line-height:15px;
			text-align:left;
			padding-left:35px;
			font-size:12px;
			color:red;
			margin-top:5px;
		}
		
		/* 提交按钮 */
		#submitBtn{	
			width:290px;
			height:30px;
			line-height:30px;
			margin-left:25px;
			margin-top:22px;
			text-align:center;
			border-width:thin;
			border-radius:5px;
			background:#39F;
			cursor:pointer;
			font-size:16px;
		}
		
		/* 其它事项 */
		#otherAbout{
			width:320px;
			height:100px;
			margin-left:10px;
			margin-top:15px;
			border-top:1px solid #CCC;
			font-size:12px;
			color:gray;
		}
		#otherAbout span{
			display:block;
			width:70px;
			height:15px;
			padding-left:5px;
			background:;
			margin-top:7px;
		}
		#otherAbout ol{
			display:block;
			width:280px;
			height:65px;
			background:;
			margin-top:4px;
		}
	
    </style>
</head>
<body>
	<div id="container">
    	<div id="title">在线聊天系统</div>
    	<form id="toChatShow" action="chatLogin.php" method="post">
        	<!--用户名-->
        	<div class="inputBox">
            	 <span class="inputPrompt">用户名:</span>
            	<input type="text" id="username" name="username" class="inputArea">
            </div>
            <!--密码-->
        	<div class="inputBox">
            	<span class="inputPrompt">密&nbsp;&nbsp;&nbsp;码:</span>
           		<input type="password" id="pwd" name="pwd" class="inputArea">
            </div>
            <!--验证码-->
            <div id="checkCodeBox">
            	<span class="inputPrompt">验证码:</span>
            	<input type="text" id="checkCodeinput" placeholder="请输入验证码">
                <div id="checkCodeImg"></div>
                <div id="checkCodeTime">60s</div>
            </div>
            <!--立即注册-->
            <div id="registerBox"><a href="register/chatRegister.php" style="color:black;">还没账号，立马注册?</a></div>
            <div id="loginErrorBox"></div>
            <!--登陆-->
            <input type="button" id="submitBtn" value="LOG IN">
            <!--其它事项-->
            <div id="otherAbout">
            	<span>相关事项:</span>
                <ol>
                	<li>此系统用于学习，无商业目的</li>
                    <li>文明聊天，不可侮辱、诋毁他人，禁口水战</li>
                    <li>富强、民主、文明、和谐、自由、平等、公正、法治、爱国、敬业、诚信、友善</li>
                </ol>
            </div>
		</form>
    </div>
    
</body>
</html>