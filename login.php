<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
require_once('connect.php');
$sql = "SELECT password,is_admin FROM `user`" . " WHERE `account` = ?";
$sth = $db->prepare($sql);
$sth->execute(array($_POST["email"]));
$result = $sth->fetchObject();

if (crypt($_POST["password"], $result->password) == $result->password) {
    $_SESSION['login'] = '1';
	if($result->is_admin){
	$_SESSION['admin'] = '1';
 	header("Refresh: 3; url=list.php"); ?>
	<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	
	<center><font size="10">log in as an admin successflly, wait 3 seconds<br></font></center>
	<script>alert("log in as an admin successflly, 你確定你支持服貿嗎?");</script>

	<?php
}
   else if(!$result->is_admin){
   $_SESSION['admin'] = '0';
   header("Refresh: 3; url=list.php");  ?>
  <center><font size="10">log in as a user successflly, wait 3 seconds<br></font></center>
<?php
  }
   //$_SESSION['login']=1;
}
else if(!$result){ ?>
	<center><font size="10">you have not sign up this account<br></font></center>
	<center><font size="10"><a href="signin.php">back</a></font></center>
<?php
	}
else if(crypt($_POST["password"], $result->password) != $result->password){ ?>
	<center><font size="10">wrong password<br></font></center>
	<center><font size="10"><a href="signin.php">back</a></font></center>
<?php
	}

?>

	</body>
</html>