<?php require_once('../Connections/yonghu.php'); ?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "dl - true.php";
  $MM_redirectLoginFailed = "dl - flase.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_yonghu, $yonghu);
  
  $LoginRS__query=sprintf("SELECT username, password FROM yonghu WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $yonghu) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>µÇÂ¼Èë¿Ú</title>
<style type="text/css">
body{ margin:0; padding:0; font:10px Î¢ÈíÑÅºÚ; font-weight:bold}

.top{width:100%;height:100px;background:#0099FF;margin:0;padding:0;}
  .top-left{width:80%;height:100px;float:left;margin:0;}
  .top-right{width:20%;height:100px;float:right;margin:0;}

.main{width:1200px;height:800px;margin:0 auto;}
 
.biaodan1{width:350px;height:400px;position:absolute;left:820px;top:150px;}
	.dl{width:200px;height:40px;background:#0066FF;margin-left:60px;}

	
	
	
	
.STYLE1 {
	font-size: 36px;
	color:#333333;padding-left:50px
}
.STYLE10 {font-size: 16px}
</style>
</head>

<body>
<div class="top">
  <div class="top-left">
<h1 class="STYLE1">»¥Áª°ï</h1>
  </div>
  <div class="top-right">
<p align="center" style="color:#00FF00; font-size:14px"><a href="index.php">·µ»ØÊ×Ò³</a>&nbsp;&nbsp;<a href="zc.php">Ãâ·Ñ×¢²á</a></p>
  </div>
</div>
<hr style="height:5px;border:none;border-top:5px ridge gray;" />
<div class="main">
  <div class="biaodan1">
  <form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
        <br>
		&nbsp;&nbsp;&nbsp;&nbsp;<label for="username"><span class="STYLE10">ÓÃ»§Ãû</span>:</label>
        <input type="text" name="username" style="width:200px;height:25px" />
		<br>
		<br>
		<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<label for="pass"><span class="STYLE10">ÃÜ&nbsp;&nbsp;&nbsp;Âë</span>:</label>
        <input type="password" name="pass" style="width:200px;height:25px" />
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>Íü¼ÇµÇÂ¼ÃÜÂë£¿</a>
		<br>
		<br>
		<br>
		<br>
        <input  class="dl" type="submit" name="µÇÂ¼" value="µÇÂ¼"/>
  </form>
  </div>

</div>
</body>
</html>
