<?php 
	//开启超全局变量
	session_start();
	
	
	//正常刷新
	if(@$_GET['content'] == "queryRefresh"){
		$fp1 = @fopen("txt/chatRecord.txt",'r');
		$chat = @fread($fp1, 10000);
		@fclose($fp1);
		echo $chat;
	}
	
	//用户数据写入
	if(@$_GET['content'] == "addContent"){
		$fp = @fopen("txt/chatRecord.txt",'r');
		$txt = @fread($fp, 8000);
		@fclose($fp);
		$MsgContent = $_POST["MsgContent"];
		
		//begin小表情处理
		$emojiTextArr = array("微笑","你好","再见","呆住","鄙视","失望","虚惊","囧笑","心动","瑟笑","开心","大哭","坏笑","亲嘴","斜眼","笑哭","哼气","斜笑","木讷","惊呆","得意","向前","圆眼","照相","鼓掌");
		if(preg_match_all("/\[(.+?)\]/", $MsgContent, $matches)){
			for($j=0; $j < count($matches[1]); $j++){
				$imgNumber = array_keys($emojiTextArr, $matches[1][$j]);
				$replacement = "<img src="."images/emoji-samll/emoji-samll".$imgNumber[0].".jpg "."class='msgShowPanel_emj_small'>";
				$MsgContent = preg_replace("/\[(.+?)\]/", $replacement, $MsgContent, 1);
			}
		}
		
		//判断用户是否使用了匿名,并进行相应操作
		$anonymous = @$_GET['anonymous'];
		if($anonymous == "off"){
			$txt = $txt.$_SESSION["username"]."说: ".$MsgContent."<br>";
		}else{
			$txt = $txt.$anonymous."说: ".$MsgContent."<br>";
		}
		
		//控制显示聊天的记录条数
		$chatArr = explode("<br>", $txt);
		array_pop($chatArr);
		if(count($chatArr) > 50){
			$chatArr50 = array_slice($chatArr, -50);
			$txt = implode("<br>", $chatArr50);
			$txt = $txt."<br>";
		}
		
		$fp = @fopen("txt/chatRecord.txt",'w');
		fwrite($fp, $txt);
		@fclose($fp);
		echo $txt;
	}
	
?>
	



