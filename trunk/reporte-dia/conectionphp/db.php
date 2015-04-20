<?php 
session_start(); 
$dbhost="localhost"; 
$dbuser="root"; 
$dbpass=""; 
$dbselect="lime_ohpanel"; 
$conexione = 
mysql_connect($dbhost,$dbuser,$dbpass) or die("Servidor en mantenimiento, por favor vuelva en unos instantes - no se puede conectar a MySQL "); 

mysql_select_db($dbselect,$conexione) ;





?>