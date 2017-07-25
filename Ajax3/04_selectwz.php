<?php
	// 从数据库中获取所有的信息
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');

	$result = $db->query('select * from wenzhang');

	// 解析
	$data = $result->fetchAll(PDO::FETCH_ASSOC);

	// 发回前台
	// 把数组转成json 方法 json_encode()
	$str = json_encode($data);

	echo $str;
?>