<?php 
session_start(); 
//检测session是否为空，是则跳转到登录页
if( empty($_SESSION['usname']) ){
	header("Refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息录入</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">	
<style type="text/css">
	.userinfo{
		position: absolute;
		width: 200px;
		height: 25px;
		line-height: 25px;
		top:40px;
		right:40px;
		font-size: 12px;
	}
	.userinfo span{
		color: red;
		font-weight:bold;
	}
</style>
</head>
<body>
	<div class="sui-container">
		<div class="my-head">北京网络职业学院学生管理系统 V2.0
			<div class="userinfo">欢迎<span><?php echo $_SESSION['usname']; ?></span>登录&nbsp;&nbsp;<a href="login-out.php">退出</a></div>
		</div>
