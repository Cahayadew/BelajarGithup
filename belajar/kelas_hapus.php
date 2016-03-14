<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_kelas']))
		header('location:kelas_list.php');
		else
		{
			include "koneksi.php";
			$id_kelas = $_GET[id_kelas];
			mysql_query ("DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas'") or die (mysql_error());
			header('location:kelas_list.php');
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>