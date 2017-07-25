<?php
	// 连接数据库取值
	$db  = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');

	// 取uname的值
	$result = $db->query('select uname from usermessage');

	// 解析，判断是否重复
	$data = $result->fetchAll(PDO::FETCH_ASSOC);

	// 定义一个是否重复的状态值
	$flag = 1; //1表示没有，0表示重复了
	foreach ($data as $value) {
		if($value['uname'] == $_GET['name']){
			$flag = 0;
			break;
		}else{
			$flag = 1;
		}
	}

	// 判断状态值
	if($flag){
		echo '可以使用';
	}else{
		echo '用户名重复';
	}

?>