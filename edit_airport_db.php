<?php
	session_save_path("/amd/cs/101/0116019/session/");
	session_start();
	if($_SESSION['admin'] == '1'){

	require_once('connect.php');
	$pos1 = strpos($_POST["location"],' ' );
	$pos2 = strpos($_POST["location"],'<' );
	$pos3 = strpos($_POST["location"],'>' );
	$pos4 = strpos($_POST["location"],'"' );
	$pos5 = strpos($_POST["location"],'\'' );		
	$pos6 = strpos($_POST["longitude"],' ' );
	$pos7 = strpos($_POST["longitude"],'<' );
	$pos8 = strpos($_POST["longitude"],'>' );
	$pos9 = strpos($_POST["longitude"],'"' );
	$pos10 = strpos($_POST["longitude"],'\'' );	
	$pos11 = strpos($_POST["latitude"],' ' );	
	$pos12 = strpos($_POST["latitude"],'<' );
	$pos13 = strpos($_POST["latitude"],'>' );
	$pos14 = strpos($_POST["latitude"],'"' );
	$pos15 = strpos($_POST["latitude"],'\'' );	
	if($_POST["location"] != "" && $_POST["longitude"] != "" && $_POST["latitude"] != "" && $pos1 === false && $pos2 === false && $pos3 === false && $pos4 === false&& $pos5 === false&& $pos6 === false&& $pos7 === false&&$pos8=== false&&$pos9 === false&&$pos10 === false&&$pos11 === false&&$pos12 === false&&$pos13 === false&&$pos14 === false&&$pos15 === false){
		 $sql="UPDATE `airport` SET `location` = ? , `longitude` = ? ,`latitude`= ?  WHERE `id` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($_POST["location"],$_POST["longitude"],$_POST["latitude"],$_POST["id"]));
		header("Refresh: 0; url=airport.php");
	}
	else{
		echo '<center><font size="10">Empty string or whitespace or < or > or " or \' are not allowed.<br></font></center>';
		echo '<center><font size="10"><input type ="button" onclick="history.back()" value="Return back"></input></font></center>';
		//echo '<a href="edit.php">Back</a>';
	}
	}
?> 