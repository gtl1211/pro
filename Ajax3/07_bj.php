<?php
	// 这里是查询功能
	// 获取前台传来ID
	// 连接数据库
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');
	if(isset($_GET['uid'])?$_GET['uid']:''){
		$uid = $_GET['uid'];
		//查询数据
		$res = $db->query('select * from wenzhang where id='.$uid);
		// 发回前台
		if($data = $res->fetch(PDO::FETCH_ASSOC)){
			// 有数据,需要转成json字符串
			$str = json_encode($data);
			echo $str;
		}else{
			echo '没有数据';
		}
	}else{
		// 更新数据库功能
		// 得到前台传来的数据，添加到数据库中
		$tit = $_POST['tit'];
		$author = $_POST['author'];
		$desp = $_POST['desp'];
		$con = $_POST['con'];
		$pid = $_POST['pid'];
		// 还有一个时间
		date_default_timezone_set("Asia/Shanghai");
		$time = time();
		// 更新数据库中的内容
		$result = $db->query("update wenzhang set title='{$tit}',author='{$author}',description='{$desp}',content='{$con}',date='{$time}' where id={$pid}");
		// // 判断是否更新成功
		if($result){
			echo '更新成功';
		}else{
			echo "操作失败";
		}
		// var_dump($result);
	}

	


?>