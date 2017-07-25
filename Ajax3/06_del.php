<?php
	// 获取前台传来的id值，通过id把数据库中这条删除
	$uid = $_POST['id'];
	// 连接数据库
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');
	// 执行删除操作
	$res = $db->query('delete from wenzhang where id='.$uid);

	// 判断执行结果
	if($res){
		echo 1;
	}else{
		echo 0;
	}
?>