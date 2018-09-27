<?php include("head.php"); ?>
<?php 
	$kid=empty($_GET['kid'])?"null":$_GET['kid'];
	echo $kid;
	if($kid == "null"){
		echo "请选择要修改的记录";
	}else{
		$conn=mysqli_connect("localhost","root","");
		if($conn){
			echo "连接成功!";
		}else{
			die("连接失败！".mysqli_connect_error());
		}
		mysqli_select_db($conn,"student_dbs");
		mysqli_query($conn,"set names utf8");
		$sql="select 学号,班号,姓名,出生日期,性别,电话 from student where 学号={$kid}";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
		 	$row = mysqli_fetch_assoc($result);
		}else{
			echo "没有记录";
		}
		mysqli_close($conn);
	}
?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生录入</p>
			<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="sNumber" class="control-label">学号：</label>
			    <div class="controls">
			    <!-- 增加 一个隐藏的input，用来区分是新增的数据还是修改的数据 -->
			    <input type="hidden" name="action" value="update">
			     <!-- 新增一个隐藏的input.保存学号 -->
			     <input type="hidden" name="kid" value="<?php echo $row['学号'] ?>">
			      <input type="text" value="<?php echo $row['学号'] ?>" id="sNumber" name="sNumber" class="input-large input-fat" placeholder="输入学号" data-rules="required|digits|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="bjNumber" name="bjNumber" value="<?php echo $row['班号'] ?>" class="input-large input-fat"   placeholder="输入班号" data-rules="required">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['姓名'] ?>" id="sName" name="sName" class="input-large input-fat"   placeholder="输入姓名" data-rules="required">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sBrithday" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['出生日期'] ?>" id="sBrithday" name="sBrithday" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sSex" class="control-label">性别：</label>
			    <div class="controls">
			      <label class="radio-pretty inline <?php if($row['性别']=='1'){ echo 'checked'; } ?> ">
				    <input type="radio"  value="1" name="sSex"><span>男</span>
				  </label>
				  <label class="radio-pretty inline <?php if($row['性别']=='0'){ echo 'checked'; } ?>">
				    <input type="radio" value="0"  name="sSex"><span>女</span>
				  </label>
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="sPhone" class="control-label">电话：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['电话'] ?>" id="sPhone" name="sPhone" class="input-large input-fat"   placeholder="输入电话" data-rules="mobile">
			    </div>
			  </div>			  		  	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
}
<?php include("foot.php"); ?>