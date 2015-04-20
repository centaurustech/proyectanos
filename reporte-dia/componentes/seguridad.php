<?php 
session_start();
if ((!(isset($_SESSION["idadm"])))){
	header("Location:login.php"); }?>