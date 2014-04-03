<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
if($_SESSION['admin'] == '1'){
	require_once('connect.php');
	$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ";
	if($_POST["order"]==1)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `id` ASC"; 
	else if($_POST["order"]==2)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `id` DESC"; 
	else if($_POST["order"]==3)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `flight_number` ASC"; 
	else if($_POST["order"]==4)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `flight_number` DESC"; 
	else if($_POST["order"]==5)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure` ASC, `flight_number` ASC"; 
	else if($_POST["order"]==6)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure` DESC, `flight_number` DESC"; 
	else if($_POST["order"]==7)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `destination` ASC, `flight_number` ASC"; 
	else if($_POST["order"]==8)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `destination` DESC, `flight_number` DESC"; 
	else if($_POST["order"]==9)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure_date` ASC, `flight_number` ASC"; 
	else if($_POST["order"]==10)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `departure_date` DESC, `flight_number` DESC"; 
	else if($_POST["order"]==11)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `arrival_date` ASC, `flight_number` ASC"; 
	else if($_POST["order"]==12)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `arrival_date` DESC, `flight_number` DESC"; 
	else if($_POST["order"]==13)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `price` ASC, `flight_number` ASC"; 
	else if($_POST["order"]==14)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ORDER BY  `price` DESC, `flight_number` DESC"; 
	//else
	//	$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date FROM `flight` ";	
	
	if($_POST["search"]==1)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` WHERE `id` = {$_POST["searchhh"]}";
	else if($_POST["search"]==2)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` WHERE `flight_number` LIKE {$_POST["searchhh"]}";
	else if($_POST["search"]==8)
		$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date,price FROM `flight` ";
		

	?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Flight</title>
	</head>
	<body>
	
		<center>
		
		<p>
		<a href="logout.php">Logout</a>
		</p>    
		<h1 class='title'>Listing planes</h1>
		
		<form action="list.php" method="POST">
			Search:
				<select name="search">
				<Option value="8">See All</Option>
				<Option value="1">ID</Option>
				<Option value="2">Flight Number</Option>
				<Option value="3">From</Option>
				<Option value="4">To</Option>
				<Option value="5">Depart Date</Option>
				<Option value="6">Arrive Date</Option>
				<Option value="7">Price</Option>		
			</select>
			<input type="text" name="searchhh" placeholder="Search for what?(Only ID available now)">
			<button type="submit">Search</button>
		</form>

		
		
		<form action="list.php" method="POST">
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
		<td></td>		
		<td></td>
		</tr>
<?php
		$sth = $db->prepare($sql);
		$sth->execute();
		while ($result = $sth->fetchObject()) {
		echo"
			<tr>
			<td>{$result->id}</td>
			<td>{$result->flight_number}</td>
			<td>{$result->departure}</td>
			<td>{$result->destination}</td>
			<td>{$result->departure_date}</td>
			<td>{$result->arrival_date}</td>
			<td>{$result->price}</td>
			<td><form action=\"edit.php\" method=\"GET\"><button type='submit' name='id' class='edit' value='{$result->id}'>Edit</button></form></td>
			<td><form action=\"delete.php\" method=\"GET\"><button type='submit' name='id' class='edit' value='{$result->id}'>Delete</button></form></td>";
			
			$sth2 = $db->prepare($sql2);
			$sth2->execute(array($_SESSION['id'],$result->id));
			$result1 = $sth2->fetchObject();
			if($result1){
				echo "<td><form action=\"comparesheet.php\" method=\"GET\"><button type='submit' name='cid' class='edit' value='{$result->id}'>Cancel</button></form></td>";
			}
			else{
				echo "<td><form action=\"comparesheet.php\" method=\"GET\"><button type='submit' name='fid' class='edit' value='{$result->id}'>Favorite</button></form></td>";
			}
			echo"
			</tr>
		";
		}
?>
		</table>
		<p>
		<a href="newfly.php">New Plane</a>
		</p>
		<p>
		<a href="airport.php">Airport Management</a>
		</p>
		<p>
		<a href="comparesheet.php">Comparison List</a>
		</p>
		</center>
	</body>
</html>
<?php }
	else if($_SESSION['admin'] == '0'){
	require_once('connect.php');
	$sql = "SELECT id,flight_number,departure,destination,departure_date,arrival_date FROM `flight`";
	$sth = $db->prepare($sql);
	$sth->execute();
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Flight</title>
	</head>
	<body>
		<center>
		<p>
		<a href="logout.php">Logout</a>
		</p>
		<h1 class='title'>Listing planes</h1>
		<table border=2 >
		<tr>
		<td>ID</td>
		<td>Flight Number</td>
		<td>From</td>
		<td>To</td>
		<td>Depart Date</td>
		<td>Arrive Date</td>
		</tr>
<?php
		while ($result = $sth->fetchObject()) {
		echo"
			<tr>
			<td>{$result->id}</td>
			<td>{$result->flight_number}</td>
			<td>{$result->departure}</td>
			<td>{$result->destination}</td>
			<td>{$result->departure_date}</td>
			<td>{$result->arrival_date}</td>
			</tr>
		";
		}
?>
		</table>
	</center>
	</body>
</html>
<?php
		}
?>
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
