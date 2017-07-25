<?php
	// 获取前台传来的用户名和密码，然后和数据库里面的数据比较，有能匹配的说明注册了，可以登录，如果没有匹配的则说明不能登录
	
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	// 连接数据库，取数据(用户名，密码)
	$db = new PDO("mysql:host=localhost;dbname=message;port=3366;charset=utf8",'root','');

	// $res = $db->query('select * from usermessage where uname='.$uname);

	// print_r($res->rowCount());

	$result = $db->query('select uname,pwd from usermessage');

	// 解析
	$data = $result->fetchAll(PDO::FETCH_ASSOC);

	// 比较:如果用户名和密码都没有的时候，让他去注册，如果有一个错误，用户名或密码输入错误，提示用户重新输入
	$flag = 1; //1表示能登录,0表示不能登录
	$flag2 = 1; //0密码错误
	foreach ($data as  $value) {
		if($value['uname'] == $uname){
			// 数据库中有这个用户名
			if($value['pwd'] == $pwd){
				// 数据库中的密码也匹配，就可以提示登录成功
				$flag = 1;
				break;
			}else{
				$flag2 = 0;
			}
		}else{
			// 没有注册
			$flag = 0;
		}
	}

	// // 如果$flag 是0 ，提示去注册；$flag 是1 ，提示登录成功；$flag2 是0 ，提示用户名或密码错误

	if($flag){
		echo '登录成功';
	}else if($flag2 ==0){
		echo '用户名或密码错误';
	}else if($flag==0){
		echo '未注册';
	}

?>