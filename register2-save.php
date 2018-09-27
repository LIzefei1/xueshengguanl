<?php 
	include("conn.php");
		// 邮箱
		$mali = empty($_POST['mali']) ? "null":strtolower($_POST['mali']);
		echo $mali;		
		// 用户名
	    $userm = empty($_REQUEST['userm']) ? "null":$_REQUEST['userm'];
	    // 密码
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
	    // 密码提示
	    $question = empty($_REQUEST['question']) ? "null":$_REQUEST['question'];
	    // 答案
	    $answer = empty($_REQUEST['answer']) ? "null":$_REQUEST['answer'];
	    // 选择有没有邮件名称一样的
	    $scc="select email,name,password,question,answer from user where email = '{$mali}'";
		$rcc = mysqli_query($conn,$scc);
		if (mysqli_num_rows($rcc) > 0) {
			echo "error";
		}else{
			echo "ok";
			// $sql="insert into user(email,name,password,question,answer) value('$mali','$userm','$password','$question','$answer')";
			// $result = mysqli_query($conn,$sql);
			// if ($result) {
			// echo "<p class='pp'>注册成功</p>";
			// header("Refresh:2;url=login.php");
			// }else{
			// echo "<p class='pp'>注册失败</p>".mysqli_error($conn);
			// header("Refresh:2;url=register.php");
			// }
		}
	mysqli_close($conn);
	include ("04_p.style.php");
 ?>