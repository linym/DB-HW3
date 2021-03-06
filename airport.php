<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
if($_SESSION['admin'] == '1'){
	require_once('connect.php');
	$sql = "SELECT id,location,longitude,latitude FROM `airport`"; 
	$sth = $db->prepare($sql);
	$sth->execute();
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Airport</title>
	</head>
	<body>
	
		<center>
		<p>
		<a href="logout.php">Logout</a>
		</p>    
		<h1 class='title'>Listing Airports</h1>
		<table border=2>
		<tr>
		<td>ID</td>
		<td>location</td>
		<td>longitude</td>
		<td>latitude</td>
		<td></td>
		<td></td>
		</tr>
<?php
		while ($result = $sth->fetchObject()) {
		echo"
			<tr>
			<td>{$result->id}</td>
			<td>{$result->location}</td>
			<td>{$result->longitude}</td>
			<td>{$result->latitude}</td>
			<td><form action=\"edit_airport.php\" method=\"GET\"><button type='submit' name='id' class='edit' value='{$result->id}'>Edit</button></form></td>
			<td><form action=\"delete_airport.php\" method=\"GET\"><button type='submit' name='id' class='edit' value='{$result->id}'>Delete</button></form></td>
			
						</tr>
		";
		}
?>
		</table>
		<p>
		<a href="newairport.php">Add airport</a>
		</p>
		<p>
		<a href="list.php">Back to list</a>
		</p>
		</center>
	</body>
</html>
<?php }
	else if($_SESSION['admin'] == '0'){
	echo "No permission";
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
