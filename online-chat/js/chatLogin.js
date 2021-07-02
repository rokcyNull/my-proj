// JavaScript Document
var allRigth_OK = false;
var time = 60;


/* 一开始载入显示验证码 */
$(function(){
	var bg_num = Math.floor(Math.random()*14 + 1);
	var bg_url = "url(images/checkCodeBg/checkbg"+bg_num+".jpg)";
	$.ajax({
		type:'POST',
		url:"server/LoginServer.php?content=checkCode",
		dataType:"html",
		success: function(data){
			$("#checkCodeImg").html(data);
			$("#checkCodeImg").css("background",bg_url);
		}
	});
});

/* 点击图片获取验证码 */
$(function(){
	$("#checkCodeImg").click(function(){
		var bg_num = Math.floor(Math.random()*14 + 1);
		var bg_url = "url(images/checkCodeBg/checkbg"+bg_num+".jpg)";
		$.ajax({
			type:'POST',
			url:"server/LoginServer.php?content=checkCode",
			dataType:"html",
			success: function(data){
				$("#checkCodeImg").html(data);
				$("#checkCodeImg").css("background",bg_url);
			}
		});
		time = 60;
	});
});

/* 60秒倒计时，刷新验证码 */
$(function(){
	setInterval(refreshCode,1000);
	function refreshCode(){
		if(time == 0){
			var bg_num = Math.floor(Math.random()*14 + 1);
			var bg_url = "url(images/checkCodeBg/checkbg"+bg_num+".jpg)";
			$.ajax({
				type:'POST',
				url:"server/LoginServer.php?content=checkCode",
				dataType:"html",
				success: function(data){
					$("#checkCodeImg").html(data);
					$("#checkCodeImg").css("background",bg_url);
				}
			});
			time = 60;
		}
		$("#checkCodeTime").html(time+'s');	
		time--;
	}
});

/*验证用户登陆信息是否正确*/
$(function(){
	$("#submitBtn").click(function(){
		//检查填入信息是否为空
		if(!$("#username").val()){	
			$("#loginErrorBox").html("用户名为空");
			allRigth_OK = false;
		}else if(!$("#pwd").val()){
			$("#loginErrorBox").html("密码为空");
			allRigth_OK = false;
		}else if(!$("#checkCodeinput").val()){
			$("#loginErrorBox").html("验证码为空");
			allRigth_OK = false;
		}else{
			$.ajax({
				type:'POST',
				url:"server/LoginServer.php?content=checkInfo",
				dataType:"html",
				data:{
					username:$("#username").val(),
					password:$("#pwd").val(),
					checkCode:$("#checkCodeinput").val()
				},
				success: function(data){
					if(data == "NoThisUser"){
						$("#loginErrorBox").html("用户名不存在");
						$("#username").val("");
						$("#pwd").val("");
						$("#checkCodeinput").val("");
					}else if(data == "passwordError"){
						$("#loginErrorBox").html("密码错误");
						$("#username").val("");
						$("#pwd").val("");
						$("#checkCodeinput").val("");
					}else if(data == "checkCodeError"){
						$("#loginErrorBox").html("验证码不正确");
						$("#username").val("");
						$("#pwd").val("");
						$("#checkCodeinput").val("");
					}else{
						$.ajax({
							type:'POST',
							url:"server/modiOnlineServer.php?content=LogIn",
							data:"username=" + $.trim($("#username").val()),
						});
						$("#toChatShow").submit();	
						$("#username").val("");
						$("#pwd").val("");
						$("#checkCodeinput").val("");	
					};
				}	
			});	
		}
	});
});













