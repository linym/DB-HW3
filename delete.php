<?php
	session_save_path("/amd/cs/101/0116019/session/");
	session_start();
	if($_SESSION['admin'] == '1'){
	
	
		require_once('connect.php');
		$sql = "DELETE FROM `flight` WHERE `id` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($_GET["id"]));
		$result = $sth->fetchObject();
		
		header("Refresh: 0; url=list.php");

	
	}
?>