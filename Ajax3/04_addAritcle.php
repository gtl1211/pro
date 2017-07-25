<?php
	// 得到前台发送来的数据，添加到数据库中
	$title = $_POST['tit'];
	$author = $_POST['author'];
	$desp = $_POST['desp'];
	$con = $_POST['con'];
	// 需要自己生成一个时间，这个时间是秒单位的，设置时区
	date_default_timezone_set("Asia/Shanghai");
	$time = time();
	// 写入数据库
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');
	$result = $db->query("insert into wenzhang(title,author,description,content,date) values('{$title}','{$author}','{$desp}','{$con}','{$time}')");

	if($result){
		echo '添加成功';
	}else{
		echo '添加失败';
	}
?>