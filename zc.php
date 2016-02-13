<?php require_once('../Connections/yonghu.php'); ?>
<?php
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="zc- flase.php";
  $loginUsername = $_POST['username'];
  $LoginRS__query = "SELECT username FROM yonghu WHERE username='" . $loginUsername . "'";
  mysql_select_db($database_yonghu, $yonghu);
  $LoginRS=mysql_query($LoginRS__query, $yonghu) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO yonghu (username, password, re-password, email, tell) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['re-password'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['tell'], "text"));

  mysql_select_db($database_yonghu, $yonghu);
  $Result1 = mysql_query($insertSQL, $yonghu) or die(mysql_error());

  $insertGoTo = "zc - true.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册入口</title>
<style type="text/css">
body{ margin:0; padding:0; font:10px 微软雅黑; font-weight:bold}

.top{width:100%;height:100px;background:#0099FF;margin:0;padding:0;}
  .top-left{width:80%;height:100px;float:left;margin:0;}
  .top-right{width:20%;height:100px;float:right;margin:0;}

.main{width:1200px;height:800px;margin:0 auto;}
 
#form2{width:600px;height:800px;margin:auto;}
	.zc{width:200px;height:40px;background:#0066FF;margin-left:125px;margin-top:20px;}

	
	
	
	
.STYLE1 {
	font-size: 36px;
	color:#333333;padding-left:50px
}
.STYLE10 {font-size: 16px}
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<div class="top">
  <div class="top-left">
<h1 class="STYLE1">互联帮</h1>
  </div>
  <div class="top-right">
<p align="center" style="color:#00FF00; font-size:14px"><a href="index.php">返回首页</a>&nbsp;&nbsp;<a href="dl.php">用户登录</a></p>
  </div>
</div>
<hr style="height:5px;border:none;border-top:5px ridge gray;" />
<div class="main">
  <form action="<?php echo $editFormAction; ?>" method="POST" name="form2" id="form2" onsubmit="MM_validateForm('username','','R','re-password','','R','email','','RisEmail','tell','','NisNum','password','','R');return document.MM_returnValue">
        <br>
		<p style="font-size:18px;color:#0066FF">新用户注册</p>
		<br>
		<br>
		<ul>
		  <li><span style="font-size:16px">用户名称：</span>
		    <input type="text" name="username" style="width:200px;height:25px" />
		 *必填，可以是中文、英文或数字的任意组合
		  </li>
		  <br>
		  <br>
		  <li><span style="font-size:16px">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
		  <input type="password" name="password" style="width:200px;height:25px" />
		 *必填，最少6个字
		  </li>
		  <br>
		  <br>
		  <li><span style="font-size:16px">确认密码：</span>
		  <input type="text" name="re-password" style="width:200px;height:25px" />
		 *必填，再次输出用户密码，两次输入需要一致
		  </li>
		  <br>
		  <br>
		   <li><span style="font-size:16px">电子邮箱：</span>
		  <input type="text" name="email" style="width:200px;height:25px" />
		 *必填
		  </li>
		  <br>
		  <br>
		   <li><span style="font-size:16px">联系电话：</span>
		  <input type="text" name="tell" style="width:200px;height:25px" />
		   </li>
		  
		</ul>
		       
		<br>
		<input  class="zc" type="submit" name="立即注册" value="立即注册"/>
		<input type="hidden" name="MM_insert" value="form2">
		
  </form>


</div>
</body>
</html>
