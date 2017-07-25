<?php
	// 获取前台提交过来的ID值，通过ID值去数据库中取这条数据
	$uid = $_GET['id'];
	// 连接数据库，取数据
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');
	// 执行查询操作
	$res = $db->query('select * from wenzhang where id='.$uid);
	// 如果成功，就有数据; 如果不成功，就没有数据
	// 在解析之前需要先判断是否有数据
	if($data = $res->fetch(PDO::FETCH_ASSOC)){
		// 解析完发回前台,需要转成JSON字符串
		$str = json_encode($data);
		echo $str;
	}else{
		// 没有数据
		echo "没有这条数据";
	}

?>