<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['edit_tentor']))
		header('location:tentor_list.php');
		else
		{
			include "koneksi.php";
			$id_tentor			= $_POST['id_tentor'];
			$nama_tentor		= $_POST['nama_tentor'];
			$hp_tentor			= $_POST['hp_tentor'];
			$alamat_tentor		= $_POST['alamat_tentor'];
			$email_tentor		= $_POST['email_tentor'];
			$agama_tentor		= $_POST['agama_tentor'];
			$tl_tentor			= $_POST['tl_tentor'];
			$gaji_tentor		= $_POST['gaji_tentor'];
			
			mysql_query ("UPDATE tb_tentor SET nama_tentor = '$nama_tentor', hp_tentor = '$hp_tentor', alamat_tentor = '$alamat_tentor', email_tentor = '$email_tentor', agama_tentor = '$agama_tentor', tl_tentor = '$tl_tentor', gaji_tentor = '$gaji_tentor' WHERE id_tentor = '$id_tentor'") or die(mysql_error());
			
			$daftar	= mysql_query("SELECT * FROM tb_tentor where id_tentor = '$id_tentor'") or die (mysql_error());
			$dataku	= mysql_fetch_object($daftar);
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Detil Edit Tentor</title>
				</head>
				<body>
					<center>
						<a href="index.php">Home</a>
						|
						<a href="siswa_form.php">Data Siswa</a>
						|
						<a href="tentor_form.php">Data Tentor</a>
						|
						<a href="kelas_form.php">Data Kelas</a>
						|
						<a href="logout.php">Logout</a>
						<br /><br />
						<a href="tentor_form.php">Registrasi Tentor</a>
						|
						<a href="tentor_list.php">List Tentor</a>
						<br /><br />
						<h2 style="color:#FF0004;">Edit Tentor Sukses</h2>
						<table>
							<tr>
								<td colspan="3"><font color="red">Harap catat informasi berikut!</font></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td>ID Tentor</td>
								<td>: <?php echo $dataku->id_tentor; ?></td>
								<td rowspan="7">
									<img src="<?php echo $dataku->foto_tentor ?>" alt="<?php echo $dataku->nama_tentor?>" width="170" height="200" />
								</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $dataku->nama_tentor; ?></td>
							</tr>
							<tr>
								<td>No HP / Telepon</td>
								<td>: <?php echo $dataku->hp_tentor; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $dataku->alamat_tentor; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>: <?php echo $dataku->email_tentor; ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>: <?php echo $dataku->agama_tentor; ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>: <?php echo $dataku->tl_tentor; ?></td>
							</tr>
							<tr>
								<td>Gaji</td>
								<td>: Rp. <?php echo $dataku->gaji_tentor; ?></td>
							</tr>
						</table>
						<br />
						<a href="#"><input type="button" value="Save Pdf" /></a>
						<a href="tentor_edit.php?id_tentor=<?php echo $dataku->id_tentor?>"><input type="button" value="Edit" /></a>
					</center>
				</body>
			</html>
			<?php
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>