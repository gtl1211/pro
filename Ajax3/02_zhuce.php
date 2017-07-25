<?php

	// 得到前台提交的数据，添加到数据库中
	$name = $_GET['name'];
	$pwd = $_GET['pwd'];
	$tel = $_GET['tel'];
	$email = $_GET['email'];

	// 连接数据库
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');

	// 添加操作
	$result = $db->query("insert into usermessage(uname,pwd,tel,email) values('{$name}','{$pwd}','{$tel}','{$email}')");

	if($result){
		echo '注册成功';
	}else{
		echo '注册失败';
	}

?>