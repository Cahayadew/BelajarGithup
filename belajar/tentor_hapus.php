<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_tentor']))
		header('location:tentor_list.php');
		else
		{
			include "koneksi.php";
			$id_tentor = $_GET[id_tentor];
			//$res = mysql_query("select foto_tentor from tb_tentor where id_tentor='$id_tentor'");
			//$d=mysql_fetch_object($res);
			//if (strlen($d->foto_tentor)>3)
			//{
			//if (file_exists($d->foto_tentor)) unlink($d->foto_tentor);
			//}
			mysql_query ("DELETE FROM tb_tentor WHERE id_tentor = '$id_tentor'") or die (mysql_error());
			header('location:tentor_list.php');
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>