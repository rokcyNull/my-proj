<?php 
	//开启超全局变量，便于显示登陆者信息
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>聊天室聊天界面</title>
    <script type="application/javascript" src="js/jquery-1.11.2.js"></script>
    <script type="application/javascript" src="js/chatShow.js"></script>
	<link rel="stylesheet" type="text/css" href="css/yahooInitial.css">
	<link rel="stylesheet" type="text/css" href="css/chatShow.css">
</head>
<body>
	<!--登陆信息部分-->
    <div id="welcomeUser">欢迎您,
        <a id="user" href="#">
            <?php echo $_SESSION["username"];?>
        </a>
	</div>
    <div id="userInfo">
    	<a class="userInfo_a" href="#">等级：</a>
        <a class="userInfo_a" href="#">积分：</a>
        <a class="userInfo_a" href="#">余额：</a>
        <a id="aLogOut" href="chatLogin.php">Log out</a>
    </div>
	
    <!--聊天主体部分-->
    <div id="container">
    	<!--聊天室部分-->
    	<div id="chat_box">
            <div id="title">在线聊天室</div>
            <div id="msgShowPanel"></div>
            <!--功能栏-->
          	<div id="emojiBox">
            	<?php 
					for($i=0; $i < 25; $i++){
						echo "<img src='images/emoji-samll/emoji-samll{$i}.jpg' alt={$i}>";	
					}
				?>
            </div>
            <div id="bigemojiBox">
            	<?php
					for($j=0; $j < 30; $j++){
						echo "<img src='images/emoji-big/emoji-big{$j}.png' alt='{$j}'>";
					}
				?>
            </div>
            <div id="fontColorBox">
            	<a style="color:black; background:white;">black</a>
            	<a style="color:red; background:white;">red</a>
                <a style="color:orange; background:white;">orange</a>
                <a style="color:yellow; background:white;">yellow</a>
                <a style="color:green; background:white;">green</a>
                <a style="color:blue; background:white;">blue</a>
                <a style="color:pink; background:white;">pink</a>
                <a style="color:purple; background:white;">purple</a>
            </div>
            <div id="fontSizeBox">
            	<a style="font-size:10px; background:white;">10px</a>
                <a style="font-size:12px; background:white;">12px</a>
                <a style="font-size:15px; background:white;">15px</a>
                <a style="font-size:18px; background:white;">18px</a>
                <a style="font-size:21px; background:white;">21px</a>
                <a style="font-size:24px; background:white;">24px</a>
                <a style="font-size:28px; background:white;">28px</a>
                <a style="font-size:32px; background:white;">32px</a>
            </div>
            <div id="anonymousChatBox">
            	<a style="background:white; color:red; font-size:18px;">off</a>
            	<a style="background:white">李白</a>
                <a style="background:white">宙斯</a>
                <a style="background:white">扁鹊</a>
                <a style="background:white">鲁班七号</a>
                <a style="background:white">钢铁侠</a>
                <a style="background:white">奇异博士</a>
                <a style="background:white">绿巨人</a>
            </div>
            <div id="chatBgImgBox">
            	<img src="images/showMsgPanelBg/panelBg0.jpeg" alt="0">
                <img src="images/showMsgPanelBg/panelBg1.jpeg" alt="1">
                <img src="images/showMsgPanelBg/panelBg2.jpeg" alt="2">
                <img src="images/showMsgPanelBg/panelBg3.jpeg" alt="3">
                <img src="images/showMsgPanelBg/panelBg4.jpeg" alt="4">
                <img src="images/showMsgPanelBg/panelBg5.jpeg" alt="5">
                <img src="images/showMsgPanelBg/panelBg6.jpeg" alt="6">
            </div>
            <div id="chatTimeBox">
            	<span>你的上线时间:</span>
                <span id="loginTime"> <?php echo $_SESSION["loginTime"];?></span>
                <span>在线时长为:</span>
                <span  id="totalTime"></span>
            </div>
            <!--多功能栏-->
            <div id="Morefunction">
            	<a id="online_list_btn" style="border-bottom-right-radius:12px;">在线列表</a>
                <a id="bigemoji">大表情</a>
                <a id="emoji">小表情</a>
                <a id="fontColor">文字颜色</a>
                <a id="fontSize">文字大小</a>
                <a id="anonymousChat">匿名聊天</a>
                <a id="chatBgImg">聊天背景</a>
                <a id="chatTime" style="width:82px; border-left:0px; border-bottom-left-radius:12px;">
                	聊天时长
                </a>
            </div>
            <input type="text" id="MsgContent" name="MsgContent">
            <input type="button" id="sendMsg" name="sendMsg" value="发送">
		</div>
        
        <!--在线成员列表-->
        <div id="online_list">
        	<div id="online_list_title">在线成员列表</div>
            <div id="online_list_content"></div>
        </div>
    </div>
    
    <div id="footer">
    	<span>&copy;&reg; @2017 ALL RIGHT RESERVED 版权所有，翻版必究</span>
			<br />
		<span>Created by <a href="http://blog.lixiangme.cc">LxiousXiang</a>,图片相关素材来源于互联网，无商业目的，最终解释权归创作者所有</span>
    </div>
</body>
</html>