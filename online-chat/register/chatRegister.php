<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>聊天室注册界面</title>
<link type="text/css" href="css/yahooInitial.css">
<script type="application/javascript" src="../js/jquery-1.11.2.js"></script>
<script type="application/javascript" src="../js/chatRegister.js"></script>
<style>
	body{
		background:url(images/loginRgisBg/bg01.jpeg);
		background-attachment:fixed;
		background-size:cover;	
	}

	#container{
		width:600px;
		height:400px;
		margin:auto;
		margin-top:130px;
		background:#EEE;
		border-top-left-radius:12px;
		border-top-right-radius:12px;	
	}
	#title{
		width:inherit;
		height:45px;
		line-height:45px;
		text-align:center;
		font-size:24px;
		letter-spacing:5px;
		background:#39F;
		border-top-left-radius:12px;
		border-top-right-radius:12px;
		margin-bottom:30px;
	}
	.BoxArea{
		width:inherit;
		height:50px;
		margin-top:3px;
	}
	.inputSpan{
		display:block;
		height:28px;
		width:110px;
		margin-left:40px;
		line-height:28px;
		text-align:right;
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
		margin-left:7px;
	}
	.inputPrompt{
		width:360px;
		height:15px;
		background:;
		float:left;
		margin-top:2px;
		margin-left:155px;
		font-weight: lighter;
		font-size: 12px;
	}
	.errorPrompt{
		width:150px;
		height:28px;
		line-height:28px;
		float:left;
		margin-left:10px;
		font-size:12px;
		color:black;
		padding-left:40px;
	}
	#rstSubBox{
		width:inherit;
		height:35px;
		background:;
		margin-top:13px;
	}
	#restInfoBtn{
		display:block;
		width:100px;
		height:35px;
		float:left;
		margin-left:120px;
		background:orange;
		border-width:thin;
		border-radius:6px;
		font-size:14px;
	}
	#submitBtn{
		display:block;
		width:200px;
		height:35px;
		float:left;
		margin-left:8px;	
		background:#39F;
		border-width:thin;
		border-radius:6px;
		font-size:14px;
	}
</style>
</head>

<body>
	<div id="container">
    	<div id="title">在线聊天室账号注册</div>
        <form id="registerForm" action="registerServer.php" method="post">
            <!--用户名区域-->
            <div id="usernameBox" class="BoxArea">
                <span class="inputSpan">用户名:</span>
                <input type="text" id="username" name="username" class="inputArea">
                <div id="userError" class="errorPrompt"></div>
                <div class="inputPrompt">只能由字母、数字和下划线组成，6~10且首字符不能为数字</div>
            </div>
            <!--密码区域-->
            <div id="usernameBox" class="BoxArea">
                <span class="inputSpan">登陆密码:</span>
                <input type="password" id="password" name="password" class="inputArea">
                <div id="psdError" class="errorPrompt"></div>
                 <div class="inputPrompt">6~15位，仅支持字母、数字、下划线 @ # $ % ^ & *</div>
            </div>
            <!--重复密码区域-->
            <div id="usernameBox" class="BoxArea">
                <span class="inputSpan">重复密码:</span>
                <input type="password" id="RePassword" name="RePassword" class="inputArea">
                <div id="RePsdError" class="errorPrompt"></div>
                 <div class="inputPrompt">两次输入的密码必须一致</div>
            </div>
            <!--找回密码问题区域-->
            <div id="usernameBox" class="BoxArea">
                <span class="inputSpan">找回密码问题:</span>
                <input type="text" id="Question" name="Question" class="inputArea">
                <div id="QuesError" class="errorPrompt"></div>
                 <div class="inputPrompt">可任意设置</div>
            </div>
            <!--找回密码答案区域-->
            <div id="usernameBox" class="BoxArea">
                <span class="inputSpan">找回密码答案:</span>
                <input type="text" id="AnQuestion" name="AnQuestion" class="inputArea">
                <div id="AnQuesError" class="errorPrompt"></div>
                 <div class="inputPrompt">必须8位以上</div>
            </div>
            <!--重置、提交区域-->
            <div id="rstSubBox">
            	<input type="reset" id="restInfoBtn" value="RESET">
                <input type="button" id="submitBtn" value="SUBMIT">
            </div>
        </form>
    </div>
</body>
</html>




