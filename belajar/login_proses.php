<?php
	session_start();
	include "koneksi.php";
	$username	= $_GET['username'];
	$password	= $_GET['password'];
	$query		= mysql_query("select * from tb_user where username='$username' and password='$password'");
	$cek		= mysql_num_rows($query);
	if($cek)
	{
		$_SESSION['username']=$username;
		header('location:index.php');
	}
	else
	{
		header('location:login_form.php?pesan=error');
	}
?>