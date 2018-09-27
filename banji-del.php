<?php 
	include("conn.php");
	$sql1="delete from class1 where 班号='{$_GET["kid"]}'";
	$result=mysqli_query($conn,$sql1);

	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:1;url=banji-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	mysqli_close($conn);
?>