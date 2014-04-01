<?php
	session_save_path("/amd/cs/101/0116019/session/");
	session_start();
	if($_SESSION['admin'] == '1'){	
	require_once('connect.php');
	$pos1 = strpos($_POST["flight_number"],' ' );
	$pos2 = strpos($_POST["flight_number"],'<' );
	$pos3 = strpos($_POST["flight_number"],'>' );
	$pos4 = strpos($_POST["flight_number"],'"' );
	$pos5 = strpos($_POST["flight_number"],'\'' );		
	$pos6 = strpos($_POST["departure"],' ' );
	$pos7 = strpos($_POST["departure"],'<' );
	$pos8 = strpos($_POST["departure"],'>' );
	$pos9 = strpos($_POST["departure"],'"' );
	$pos10 = strpos($_POST["departure"],'\'' );	
	$pos11 = strpos($_POST["destination"],' ' );	
	$pos12 = strpos($_POST["destination"],'<' );
	$pos13 = strpos($_POST["destination"],'>' );
	$pos14 = strpos($_POST["destination"],'"' );
	$pos15 = strpos($_POST["destination"],'\'' );
	if($_POST["flight_number"] != "" && $_POST["departure"] != "" && $_POST["destination"] != "" && $pos1 === false && $pos2 === false && $pos3 === false && $pos4 === false&& $pos5 === false&& $pos6 === false&& $pos7 === false&&$pos8=== false&&$pos9 === false&&$pos10 === false&&$pos11 === false&&$pos12 === false&&$pos13 === false&&$pos14 === false&&$pos15 === false&& $_POST["departure_date"]!==""&& $_POST["arrival_date"]!==""){
		$sql = "INSERT INTO `flight` (flight_number, departure, destination, departure_date,arrival_date)" . " VALUES(?,?,?,?,?)";
		$sth = $db->prepare($sql);
		$sth->execute(array($_POST["flight_number"],$_POST["departure"],$_POST["destination"],$_POST["departure_date"],$_POST["arrival_date"]));
		header("Refresh: 3; url=list.php");
		?>
		<center><font size="10"> add successfully, wait 3 seconds to return<br></center></font>
	<?php
	}
	else{ ?>
		<center><font size="10">Empty string or whitespace or < or > or " or ' are not allowed.<br></center></font>
		<center><font size="10"><a href="newfly.php">Back</a></center></font>
		<?php
	}
	}
?> 