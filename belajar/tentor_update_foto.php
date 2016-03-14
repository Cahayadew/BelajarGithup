<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_tentor']))
		header('location:tentor_list.php');
		else
		{
			if (!ISSET($_POST['edit_foto_tentor']))
			header("location:tentor_edit.php?id_tentor=$id_tentor");
			else
			{
				include "koneksi.php";
				$id_tentor	= $_GET['id_tentor'];
				$namafolder	= "foto_tentor/";
				$foto_tentor= $namafolder . basename($_FILES['foto_tentor']['name']);
				
				move_uploaded_file($_FILES['foto_tentor']['tmp_name'], $foto_tentor);
				
				mysql_query ("update tb_tentor set foto_tentor = '$foto_tentor' where id_tentor = '$id_tentor'") or die(mysql_error());
				
				header("location:tentor_edit.php?id_tentor=$id_tentor");
			}
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>