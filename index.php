<?php
session_start();
if ($_SESSION['username']!='') {
	header("location: dashboard.php");
}else{
	header("location: login.php");
}
?>