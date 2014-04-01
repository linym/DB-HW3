<?php
session_save_path("/amd/cs/101/0116019/session/");
session_start();
$_SESSION = array(); 
session_destroy();
header("Refresh: 2; url=signin.php");
?> <
<style type="text/css">
html, body{
background:url(goodbye.jpg) center top no-repeat;
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
 </style>

 