<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
require_once('connect.php');
	if($_GET["fid"]){
		$sql = "INSERT INTO `comparesheet` (user_id,flight_id)" . " VALUES(?,?)";
		$sth = $db->prepare($sql);
		$sth->execute(array($_SESSION['id'],$_GET["fid"]));
	}
	else if($_GET["cid"]){
		$sql = "DELETE FROM `comparesheet` WHERE `flight_id` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($_GET["cid"]));
	}
	$sql2 = "SELECT `flight_id` FROM `comparesheet`" . " WHERE `user_id` = ?";
	$sth2 = $db->prepare($sql2);
	$sth2->execute(array($_SESSION['id']));

	if($_POST["order"]==1)
		$sql = "SELECT `id`,`flight_number`,`departure`, `destination`, `departure_date`, `arrival_date`,`price` FROM `flight` ORDER BY  `id` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==2)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `id` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==3)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==4)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `flight_number` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==5)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure` ASC, `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==6)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure` DESC, `flight_number` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==7)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `destination` ASC, `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==8)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `destination` DESC, `flight_number` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==9)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure_date` ASC, `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==10)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure_date` DESC, `flight_number` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==11)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `arrival_date` ASC, `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==12)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `arrival_date` DESC, `flight_number` DESC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==13)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `price` ASC, `flight_number` ASC" . " WHERE `id` = ?"; 
	else if($_POST["order"]==14)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `price` DESC, `flight_number` DESC" . " WHERE `id` = ?"; 

		else
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` " . " WHERE `id` = ?";


?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sheet</title>
	</head>
	<body>
	
		<center>
		<form action="comparesheet.php" method="POST">
		<p>
		<a href="logout.php">Logout</a>
		</p>    
		<h1 class='title'>Comparison Lists</h1>
		
		<table border=2>
		<tr>
		<td>ID 
			<button type="submit" name="order"  value="1">↓</button>  
			<button type="submit" name="order"  value="2">↑</button>
		</td>
		<td>Flight Number
			<button type="submit" name="order"  value="3">↓</button>  
			<button type="submit" name="order"  value="4">↑</button>		
		</td>
		<td>From
			<button type="submit" name="order"  value="5">↓</button>  
			<button type="submit" name="order"  value="6">↑</button>		
		</td>
		<td>To
			<button type="submit" name="order"  value="7">↓</button>  
			<button type="submit" name="order"  value="8">↑</button>		
		</td>
		<td>Depart Date
			<button type="submit" name="order"  value="9">↓</button>  
			<button type="submit" name="order"  value="10">↑</button>		
		</td>
		<td>Arrive Date
			<button type="submit" name="order"  value="11">↓</button>  
			<button type="submit" name="order"  value="12">↑</button>		
		</td>
		<td>Price
			<button type="submit" name="order"  value="13">↓</button>  
			<button type="submit" name="order"  value="14">↑</button>		
		</td>
		</form>		
		<td></td>
		</tr>
<?php
		while ($result = $sth2->fetchObject()) {
		$sth = $db->prepare($sql);
		$sth->execute(array($result->flight_id));
		$result1 = $sth->fetchObject();
		echo"
			<tr>
			<td>{$result1->id}</td>
			<td>{$result1->flight_number}</td>
			<td>{$result1->departure}</td>
			<td>{$result1->destination}</td>
			<td>{$result1->departure_date}</td>
			<td>{$result1->arrival_date}</td>
			<td>{$result1->price}</td>
			<td><form action=\"comparesheet.php\" method=\"GET\"><button type='submit' name='cid' class='edit' value='{$result1->id}'>Delete</button></form></td>
			</tr>
		";
		}
?>
		</table>
		<p>
		<a href="newfly.php">New Plane</a>
		<a href="list.php">Listing planes</a>
		</p>
		</center>
	</body>
</html>

<style type="text/css">
html, body{
background:url(429d4624-1471-4ca2-b5db-714c59f04587_3-blackstation.jpg) center top no-repeat;
background-size: 100%!important 100%!important;
width: 100%;
height: 100%;
margin: 0;
padding: 0;
font-family:Verdana, Geneva, sans-serif;
-webkit-background-size: cover!important;
-moz-background-size: cover!important;
-o-background-size: cover!important;
background-size: cover!important;
font-family:Verdana, Geneva, sans-serif;
}
a {
	color: white;
}
 table {
 background: rgba(100%,100%,100%,0.4);
}
button.edit{
    background-color: orange;
    display: inline-block;
    padding: 5px 10px 6px;
    color: #fff;
    text-decoration: none;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
    border-bottom: 1px solid rgba(0,0,0,0.25);
    position: relative;
    cursor: pointer
}

h1.title{
	text-shadow: 0.1em 0.1em 0.15em #333;
}
</style>