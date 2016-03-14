<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_siswa']))
		header("location:tentor_edit.php?id_tentor=$id_tentor");
		else
		{
			if (!ISSET($_POST['edit_foto_siswa']))
			header("location:siswa_edit.php?id_siswa=$id_siswa");
			else
			{
				include "koneksi.php";
				$id_siswa	= $_GET['id_siswa'];
				$namafolder	= "foto_siswa/";
				$foto_siswa	= $namafolder . basename($_FILES['foto_siswa']['name']);
				
				move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $foto_siswa);
				
				mysql_query ("update tb_siswa set foto_siswa = '$foto_siswa' where id_siswa = '$id_siswa'") or die(mysql_error());
				
				header("location:siswa_edit.php?id_siswa=$id_siswa");
			}
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>