<?php
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
	$sNumber=$_POST["sNumber"];
	$bjNumber=$_POST["bjNumber"];
	$sName=$_POST["sName"];
	$sBrithday=$_POST["sBrithday"];
	$sSex=$_POST["sSex"];
	$sPhone=$_POST["sPhone"];
	$action=empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10241000))
{
	if ($_FILES["file"]["error"] > 0) {
	  echo "错误: " . $_FILES["file"]["error"] . "<br />";
	 }else{
	 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
	 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
	move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  	 	
	}
}else{
	echo "您上传的文件不符合要求！";
}
	if($action == "add"){
		$str="数据添加成功";
		$str2="数据添加失败";
		$url="student-input.php";
		$sql1="insert into student(学号,班号,姓名,出生日期,性别,电话) value('$sNumber','$bjNumber','$sName','$sBrithday','$sSex','$sPhone')";
		echo $sql1;
	}else if($action=="update"){
		$str="数据更新成功";
		$str2="数据更新失败";
		$url="student-list.php";
		$kid = $_POST["kid"];
		$sql1="update student set 学号='{$sNumber}',班号='{$bjNumber}',姓名='{$sName}',出生日期='{$sBrithday}',性别='{$sSex}',电话='{$sPhone}' where 学号='{$kid}'";
	}else{
		die("亲选择操作方法");
	}
	include("conn.php");
	$result=mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert('{$str}');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}
	mysqli_close($conn);
?>