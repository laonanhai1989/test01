<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>登录成功</title>
<style type="text/css">
body{ margin:0; padding:0; font:10px 微软雅黑; font-weight:bold}

.top{width:100%;height:100px;background:#0099FF;margin:0;padding:0;}
  .top-left{width:80%;height:100px;float:left;margin:0;}
  .top-right{width:20%;height:100px;float:right;margin:0;}

.main{width:800px;height:600px;margin:0 auto;}
 
.huanying{text-align:center}
	.zc{width:200px;height:40px;background:#0066FF;margin-left:125px;margin-top:20px;}

	
	
	
	
.STYLE1 {
	font-size: 36px;
	color:#333333;padding-left:50px
}
</style>
</head>

<body>
<div class="top">
  <div class="top-left">
<h1 class="STYLE1">互联帮</h1>
  </div>
  <div class="top-right">
<p align="center" style="color:#00FF00; font-size:14px"><a href="index.php"></a>&nbsp;&nbsp;<a href="dl.php"></a></p>
  </div>
</div>
<hr style="height:5px;border:none;border-top:5px ridge gray;" />
<div class="main">
  <div class="huanying">
		<p style="font-size:24px;color:#0066FF">登录成功！</p>
		<br>
		<form method="post">
		<p style="font-size:xx-large">欢迎您：<?php echo $_SESSION['MM_Username']; ?></p> 
		</form>
  </div>
  <div class="tiaozhuan">
<p  align="center"style="font-size:18px">3秒后自动跳转至首页...</p>
<p  align="center"style="font-size:12px">手动跳转至<a href="index.php">首页</a></p>
  </div>
</div>
<script type="text/JavaScript">
 setTimeout(function(){
       window.location.href='index.php';
 },3000)
</script>
</body>
</html>
