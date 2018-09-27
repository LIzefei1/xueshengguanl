<?php
//先读取数据库中new_column的栏目，然后更新下拉列表，保证栏目是更新的
include "conn.php";
$sql = "select name from new_column";
$result = mysqli_query($conn, $sql);

?>
<?php include "head.php" ?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布模块</p>
			<form action="student-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
	<!--技巧：增加一个隐藏的input,用来区分是新增记录还是修改记录-->
				<input type="hidden" name="action" value="add">				
			  <div class="control-group">
			    <label for="sbiaoti" class="control-label">标题:</label>
			    <div class="controls">
			      <input type="text" id="sbiaoti" name="sbiaoti" class="input-large input-fat" placeholder="输入标题">
			    </div>
			  </div>				
			  <div class="control-group">
			    <label for="sjianti" class="control-label">肩题:</label>
			    <div class="controls">
			      <input type="text" id="sjianti" name="sjianti" class="input-large input-fat" placeholder="输入肩题"data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">栏目:</label>
			    <div class="controls">
			      <select id="bjNumber" name="bjNumber">
<			      		<option value="1712B">1712B</option>
<option value="1711B">1711B</option>
<option value="1710B">1710B</option>
<option value="1709B">1709B</option> -->
<?php 
	if( mysqli_num_rows($result)>0 ){
		while ( $row = mysqli_fetch_assoc($result) ) {
			echo "<option value='{$row['name']}'>{$row['name']}</option>";
		}
	}else{
		echo "<option value=''>暂无栏目信息</option>";
	}
?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sName" class="control-label">作者:</label>
			    <div class="controls">
			         <input type="text" id="sbiaoti" name="sbiaoti" class="input-large input-fat" placeholder="输入标题">
			    </div>
			  </div>

			  <div class="control-group">
			  	<label for="sBrithday" class="control-label">出生日期：</label>
			  	<div class="controls">
			  		<input type="text" id="sBrithday" name="sBrithday" class="input-fat input-large" placeholder="输入出生日期" data-toggle="datepicker">
			  	</div>
			  </div>	
			  <div class="control-group">
			    <label for="szhaopian" class="control-label">照片：</label>
			    <div class="controls">
			      <input type="file" name="file" />
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
	</div>
</body>
</html>
<?php include "foot.php"; ?>