<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_siswa']))
		header('location:siswa_list.php');
		else
		{
			include "koneksi.php";
			$id_siswa = $_GET[id_siswa];
			//$res = mysql_query("select foto_siswa from tb_siswa where id_siswa='$id_siswa'");
			//$d=mysql_fetch_object($res);
			//if (strlen($d->foto_siswa)>3)
			//{
			//if (file_exists($d->foto_siswa)) unlink($d->foto_siswa);
			//}
			mysql_query ("DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'") or die (mysql_error());
			header('location:siswa_list.php');
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>