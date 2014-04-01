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

	$sqll ="CREATE TABLE  `{$_POST['email']}` (
`id` INT( 10 ) UNSIGNED NOT NULL ,
`flight_number` VARCHAR( 255 ) NOT NULL ,
`departure` VARCHAR( 255 ) NOT NULL ,
`destination` VARCHAR( 255 ) NOT NULL ,
`departure_date` DATETIME NOT NULL ,
`arrival_date` DATETIME NOT NULL ,
`price` DOUBLE NOT NULL ,
PRIMARY KEY (  `id` ) ,
INDEX (  `departure` ) ,
INDEX (  `destination` )
) ENGINE = INNODB;

ALTER TABLE  `{$_POST['email']}` ADD FOREIGN KEY (  `departure` ) REFERENCES  `airport` (`location`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE  `{$_POST['email']}` ADD FOREIGN KEY (  `destination` ) REFERENCES  `airport` (`location`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE  `{$_POST['email']}` ADD FOREIGN KEY (  `id` ) REFERENCES  `flight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;


";
	$db->exec($sqll);	

	
	header("Refresh: 3; url=signin.php");?>
	<center><font size="10">sign up successfully, wait 3 seconds to return</font></center>
<?php
}
else{
	echo 'Do you have trouble?<br>';
	echo '<a href="sign_up.php">back</a>';
}
?> 
