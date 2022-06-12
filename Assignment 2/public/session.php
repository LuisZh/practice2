<?php
session_start();

if(!isset($_SESSION['user'])){
	$_SESSION['user']='';
}
if(!isset($_SESSION['userId'])){
	$_SESSION['userId']='';
}
if(!isset($_SESSION['role'])){
	$_SESSION['role']='';
}

$session_user=$_SESSION['user'];
$session_userId=$_SESSION['userId'];
$session_access=$_SESSION['role'];

?>