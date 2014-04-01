<?php

require_once('connect.php');

$sql = "SELECT * FROM `user`". " WHERE `account` = ? ";
$sth = $db->prepare($sql);
$sth->execute(array($_POST["email"]));
$result = $sth->fetchObject();
$pos = strpos($_POST["email"],' ' );
if($result->password){
	echo '<center><font size="10">this account is used<br></font></center>';
	echo '<center><font size="10"><a href="sign_up.php">back</a></font></center>';
}else if($_POST["email"] != "" && $_POST["password"] != "" && $pos === false){

	$sql = "INSERT INTO `user` (account, password,is_admin)" . " VALUES( ?,?,?)";
	$sth = $db->prepare($sql);
	$hash = crypt($_POST['password']);
	$sth->execute(array($_POST["email"],$hash,$_POST["admin"]));

	header("Refresh: 3; url=signin.php");?>
	<center><font size="10">sign up successfully, wait 3 seconds to return</font></center>
<?php
}
else{
	echo 'Do you have trouble?<br>';
	echo '<a href="sign_up.php">back</a>';
}
?> 
