// JavaScript Document

//全局变量
var fontColor = "black";
var fontSize = "10px";
var anonymous = "off";

//刷新屏幕
$(function(){
	//向chatServer发送请求，回传聊天数据
	setInterval(refreshChatContent, 3000);
	function refreshChatContent(){
		var msgPanel = document.getElementById('msgShowPanel');
		$.ajax({
			type:'POST',
			url:"chatServer.php?content=queryRefresh",
			success: function(data){
				$("#msgShowPanel").html(data);
				$("#msgShowPanel").scrollTop(msgPanel.scrollHeight);
			}
		});	
	}
});

//点击发送按钮，将聊天数据发送到后台
$(function(){
	$("#sendMsg").click(function(){
		//对输入框中的文字进行大小、颜色处理
		var textContent = "<span style=\'color:"+fontColor+";font-size:"+fontSize+"\'>"+$("#MsgContent").val()+"</span>";

		var msgPanel = document.getElementById('msgShowPanel');
		$.ajax({
			type:'POST',
			url:"chatServer.php?content=addContent&anonymous="+anonymous,
			data:'MsgContent=' + textContent, 
			success: function(data){
				$("#msgShowPanel").html(data);
				$("#msgShowPanel").scrollTop(msgPanel.scrollHeight);
				$("#MsgContent").val("");
			}
		});
	});
});



/* 用户账号信息 display/hidden */
$(function(){
	$("#user").mouseover(function(){
		$("#userInfo").css("display","block");
	});
	$("#user").mouseout(function(){
		$("#userInfo").css("display","none");
	});
	
	$("#userInfo").mouseover(function(){
		$("#userInfo").css("display","block");
	});
	$("#userInfo").mouseout(function(){
		$("#userInfo").css("display","none");
	});
	
});

/* 在线成员列表show/hidden */
$(function(){
	$("#online_list_btn").click(function(){
		var obj_display = $("#online_list").css("display");
		if(obj_display == "none"){
			$("#online_list").css("display","block");
		}
		if(obj_display == "block"){
			$("#online_list").css("display","none");	
		}
	});
});


/* 小表情show/hidden */
$(function(){
	$("#emoji").click(function(){
		var emoji_display = $("#emojiBox").css("display");
		if(emoji_display == "none"){
			$("#emojiBox").css("z-index","11");	
			$("#emojiBox").css("display","block");
		}
		if(emoji_display == "block"){
			$("#emojiBox").css("z-index","2");
			$("#emojiBox").css("display","none");
		}
	});
});

/* 点击emoji小图，将小图在输入框中显示*/
$(function(){
	$("#emojiBox img").click(function(){
		var emojiTextArr = new Array("微笑","你好","再见","呆住","鄙视","失望","虚惊","囧笑","心动","瑟笑","开心","大哭",	"坏笑","亲嘴","斜眼","笑哭","哼气","斜笑","木讷","惊呆","得意","向前","圆眼","照相","鼓掌");
		var tmp = $("#MsgContent").val();
		var count=$(this).attr("alt");
		$("#MsgContent").val(tmp+"["+emojiTextArr[count]+"]");
	});
});

/* 大表情动图 show/hidden */
$(function(){
	$("#bigemoji").click(function(){
		var bigemoji_display = $("#bigemojiBox").css("display");
		if(bigemoji_display == "none"){
			$("#bigemojiBox").css("display","block");
			$("#bigemojiBox").css("z-index","10");
		}
		if(bigemoji_display == "block"){
			$("#bigemojiBox").css("z-index","2");
			$("#bigemojiBox").css("display","none");
		}
	});
});

/* 点击大表情，向后台发送信息 */
$(function(){
	$("#bigemojiBox img").click(function(){
		var obj_alt = $(this).attr('alt');
		var msgPanel = document.getElementById('msgShowPanel');
		var img_big_table = "<img src=\'images/emoji-big/emoji-big" + obj_alt + ".png\' class=\'msgShowPanel_emj_big\'>";
		$.ajax({
			type:'POST',
			url:"chatServer.php?content=addContent&anonymous="+anonymous,
			data:"MsgContent=" + img_big_table,
			success: function(data){
				$("#msgShowPanel").html(data);
				$("#msgShowPanel").scrollTop(msgPanel.scrollHeight);
			}
		});
	});
});

/* 文字颜色BOX display/hidden */
$(function(){
	$("#fontColor").click(function(){
		var fontClrBox_display = $("#fontColorBox").css("display");
		if(fontClrBox_display == "none"){
			$("#fontColorBox").css("display","block");
			$("#fontColorBox").css("z-index","10");
		}
		if(fontClrBox_display == "block"){
			$("#fontColorBox").css("z-index","2");
			$("#fontColorBox").css("display","none");
		}	
	});
});

/* 点击颜色，对字体颜色进行设置*/
$(function(){
	$("#fontColorBox a").click(function(){
		$("#fontColorBox a").css("background","white");
		$(this).css("background","#0CF");
		//对全局变量fontColor进行修改
		fontColor = $(this).html();
		//指定100毫秒后隐藏fontColorBox
		setTimeout('$("#fontColorBox").css("display","none")', 100);
	});	
});

/* 文字大小盒子 display/hidden */
$(function(){
	$("#fontSize").click(function(){
		var fontSizeBox_display = $("#fontSizeBox").css("display");
		if(fontSizeBox_display == "none"){
			$("#fontSizeBox").css("display","block");
			$("#fontSizeBox").css("z-index","10");
		}
		if(fontSizeBox_display == "block"){
			$("#fontSizeBox").css("z-index","2");
			$("#fontSizeBox").css("display","none");
		}	
	});
});

/* 点击字体，对字体大小进行设置*/
$(function(){
	$("#fontSizeBox a").click(function(){
		$("#fontSizeBox a").css("background","white");
		$(this).css("background","#0CF");
		//对全局变量fontSize进行修改
		fontSize = $(this).html();
		//指定100毫秒后隐藏fontSizeBox
		setTimeout('$("#fontSizeBox").css("display","none")', 100);
	});	
});

/* 匿名任务盒子 display/hidden */
$(function(){
	$("#anonymousChat").click(function(){
		var anonymousChatBox_display = $("#anonymousChatBox").css("display");
		if(anonymousChatBox_display == "none"){
			$("#anonymousChatBox").css("display","block");
			$("#anonymousChatBox").css("z-index","10");
		}
		if(anonymousChatBox_display == "block"){
			$("#anonymousChatBox").css("z-index","2");
			$("#anonymousChatBox").css("display","none");
		}
	});
});

/* 点击匿名人物，实现匿名功能 */
$(function(){
	$("#anonymousChatBox a").click(function(){
		$("#anonymousChatBox a").css("background","white");
		$(this).css("background","#0CF");
		//对全局变量anonymous进行修改
		anonymous = $(this).html();
		//指定100毫秒后隐藏anonymousChatBox
		setTimeout('$("#anonymousChatBox").css("display","none")', 100);
	});	
});

/* 聊天桌面背景 display/hidden */
$(function(){
	$("#chatBgImg").click(function(){
		var chatBgImgBox_display = $("#chatBgImgBox").css("display");
		if(chatBgImgBox_display == "none"){
			$("#chatBgImgBox").css("display","block");
			$("#chatBgImgBox").css("z-index","10");
		}
		if(chatBgImgBox_display == "block"){
			$("#chatBgImgBox").css("z-index","2");
			$("#chatBgImgBox").css("display","none");
		}
	});
});

/* 点击桌面背景图片，进行设置桌面背景 */
$(function(){
	$("#chatBgImgBox img").click(function(){	
		var imgalt = $(this).attr("alt");
		var imgurl = "url(images/showMsgPanelBg/panelBg"+imgalt+".jpeg)";
		$("#msgShowPanel").css("background", imgurl);
		//指定100毫秒后隐藏anonymousChatBox
		setTimeout('$("#chatBgImgBox").css("display","none")', 100);
	});
});

/* 向server发送请求，每3秒刷新一次在线列表 */
$(function(){
	setInterval(refreshOnlineList, 3000);
	function refreshOnlineList(){
		var online_panel = document.getElementById('online_list_content');
		$.ajax({
			type:'POST',
			url:"server/onlineServer.php?content=RefreshOnlineList",
			success: function(data){
				if(data != "None"){
					$("#online_list_content").html(data);
				}
			}
		});	
	}
});

/* 用户点击log out按钮退出登陆时，把消息发送给后台 */
$(function(){
	$("#aLogOut").click(function(){
		$.ajax({
			type:'POST',
			url:"server/modiOnlineServer.php?content=userLogOut",
			data:"username=" + $.trim($("#user").html())
		});
	});
});

/* 聊天时间盒子 display／hidden */
$(function(){
	$("#chatTime").click(function(){
		var chatTimeBox_display = $("#chatTimeBox").css("display");
		if(chatTimeBox_display == "none"){
			$("#chatTimeBox").css("display","block");
			$("#chatTimeBox").css("z-index","10");
		}
		if(chatTimeBox_display == "block"){
			$("#chatTimeBox").css("z-index","2");
			$("#chatTimeBox").css("display","none");
		}
	});
});

/* 聊天盒子显示登陆时长信息 */
$(function(){
	setInterval(totaltime, 1000);
	function totaltime(){
		var beginTime = new Date($("#loginTime").html().replace(/-/g, '/'));
		var NowTime = new Date();
		var total_time = Math.floor((NowTime.getTime() - beginTime.getTime()) / 1000);
		
		var seconds = total_time % 60;
		total_time = Math.floor(total_time / 60);
		var minutes = total_time % 60;
		total_time = Math.floor(total_time / 60);
		var hours = total_time % 60;
		$("#totalTime").html(hours+"h:"+minutes+"m:"+seconds+"s");
	}
});


/* 用户在线期间需要定时向后台发送 keepAlive 信号*/
$(function(){
	setInterval(keepAlive,10000);
	function keepAlive(){
		$.ajax({
			type:'POST',
			url:"server/modiOnlineServer.php?content=keepAlive",
			data:"username=" + $.trim($("#user").html())
		});		
	}
});

/* 让每个用户定期的放松请求，从而使judgeOnline.php程序能够不间断保持运行 */
$(function(){
	setInterval(RefreshJudgeOnline,10000);
	function RefreshJudgeOnline(){
		$.ajax({
			type:'GET',
			url:"server/judgeOnline.php",
			data:{}
		});	
	}
});










