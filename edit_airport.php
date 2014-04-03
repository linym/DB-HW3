<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
if($_SESSION['admin'] == '1'){
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit Airport</title>
	</head>
	<body>
	<center>
		<?php
		require_once('connect.php');
		$sql = "SELECT `id`,`location`,`longitude`, `latitude` FROM `airport`" . " WHERE `id` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($_GET["id"]));
		$result = $sth->fetchObject();
		?>
	
	
		<h1 class='title'>Edit Airport</h1>
		<form action="edit_airport_db.php" method="POST">
			<br><br><br><br><br><input type="hidden" name="id"  value="<?=$result->id?>"><br>
			location:<br><input type="text" name="location"  value="<?=$result->location?>"><br>
			longitude:<br><input type="text" name="longitude"  value="<?=$result->longitude?>"><br>
			latitude:<br><input type="text" name="latitude"  value="<?=$result->latitude?>"><br>
			 
		<br>	<br>
		<button type="submit" class='edit'>Edit Airport</button>
		</form>
	</center>
	</body>
</html>
<?php }
?>
<style type="text/css">
html, body{
background:url(1fa98853-462b-470c-ac3d-dbdb951ca877_12-CoolMcFlash.jpg) center top no-repeat;
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
 input, select {
 background: rgba(100%,100%,100%,0.4);

 }
 button.edit{
    border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   padding: 5px 10px;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 14px;
   font-family: Georgia, serif;
   text-decoration: none;
   vertical-align: middle;
   
   position: relative;
   overflow: hidden;
   display: inline-block;
   cursor: pointer
}

button.edit:before{
	content: "";
   width: 200%;
   height: 200%;
   position: absolute;
   top: -200%;
   left: -225%;

   background-image: -webkit-linear-gradient(135deg, rgba(255,255,255,0), rgba(255,255,255,0.6), rgba(255,255,255,0)); 
   background-image: -moz-linear-gradient(135deg, rgba(255,255,255,0), rgba(255,255,255,0.6), rgba(255,255,255,0));  
    
     -moz-transition: all 0.5s ease-out; 
       -o-transition: all 0.5s ease-out; 
  -webkit-transition: all 0.5s ease-out;
      -ms-transition: all 0.5s ease-out;
}

button.edit:hover:before {
  top: 200%;
  left: 200%;   
}

h1.title{
	text-shadow: 0.1em 0.1em 0.15em #333;
}
</style>