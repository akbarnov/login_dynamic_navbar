<?php
require_once '../config/database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$str = $pdo->prepare('select * from user where username = :username and password = :password');
$str->bindParam(':username', $username);
$str->bindParam(':password', $password);
$str->execute();
$result = $str->fetch();

if ($result) {
	$user_group = "%".$result['user_group']."%";

	$str = $pdo->prepare('select * from menu where menu_allowed like :user_group');
	$str->bindParam(':user_group', $user_group);
	$str->execute();
	$result = $str->fetchAll();


	if ($result) {
		foreach ($result as $key => $value) {

			if ($value['parent'] == 0) {
				$menu[$value['id']]['menu']=$value['menu'];
				$menu[$value['id']]['menu_uri']=$value['menu_uri'];
				$menu[$value['id']]['menu_icon']=$value['menu_icon'];
				$menu[$value['id']]['parent']=$value['parent'];
			}

			$str1 = $pdo->prepare('select * from menu where menu_allowed like :user_group and parent = :parent');
			$str1->bindParam(':user_group', $user_group);
			$str1->bindParam(':parent', $value['id']);
			$str1->execute();
			$result1 = $str1->fetchAll();

			if ($result1) {
				$child=array();
				foreach ($result1 as $key1 => $value1) {
					$child[$value1['id']]['menu']=$value1['menu'];
					$child[$value1['id']]['menu_uri']=$value1['menu_uri'];
					$child[$value1['id']]['menu_icon']=$value1['menu_icon'];
					$child[$value1['id']]['parent']=$value1['parent'];

					$menu[$value['id']]['child']=$child;
					
					$childparent[$value1['menu_uri']]=$value1['parent'];
				}
			}
		}

		session_start();
		$_SESSION['childparent'] = $childparent;
		$_SESSION['menu'] = $menu;
		$_SESSION['username'] = $username;
		$_SESSION['user_group'] = $user_group;

		
		$data = array('status'=>'success','message' => 'Success');
	}else{
		$data = array('status'=>'failed','message' => "You don't have access, please contact the administrator.");
	}
} else {
	$data = array('status'=>'failed','message' => 'Invalid Username or Password');
}

echo json_encode($data);

?>