<?php
	$banhao=$_POST["banhao"];
	$banzhang=$_POST["banzhang"];
	$jiaoshi=$_POST["jiaoshi"];
	$banzhuren=$_POST["banzhuren"];

	$action=empty($_POST["action"])?"add":$_POST["action"];
	if($action=="add"){
		$str="数据添加成功";
		$str2="数据添加失败";
		$url="banji-input.php";
		$sql1="insert into class1(班号,班长,教室,班主任) value('$banhao','$banzhang','$jiaoshi','$banzhuren')";
	}else if($action == "update"){
		$str="数据更新成功";
		$str2="数据添加失败";
		$url="banji-list.php";
		$kid = $_POST["kid"];
		$sql1="update class1 set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}' where 班号='{$kid}'";
	}else{
		die("请选择操作方法");
	}	
include("conn.php");
//执行SQL语句 
$result= mysqli_query($conn,$sql1);

//输出数据
// var_dump($result);
if($result){
	echo "<script>alert('{$str}');</script>";
	header("Refresh:1;url={$url}");
}else{
	echo $str2.mysqli_error($conn);
}
//关闭数据库
mysqli_close($conn);

?>