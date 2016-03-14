<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_tentor']))
		header('location:tentor_list.php');
		else
		{
			include "koneksi.php";
			$id_tentor	= $_GET['id_tentor'];
			$qryedit	= mysql_query ("SELECT * FROM tb_tentor WHERE id_tentor = '$id_tentor'");
			$dataku		= mysql_fetch_object($qryedit);
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Edit Tentor</title>
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
						<form action="tentor_update_foto.php?id_tentor=<?php echo $dataku->id_tentor ?>" method="post" enctype="multipart/form-data">
							<img src="<?php echo $dataku->foto_tentor ?>" alt="<?php echo $dataku->nama_tentor?>" width="170" height="200" />
							<br />
							<input type="file" name="foto_tentor" required />
							<input type="submit" value="Ganti Foto" name="edit_foto_tentor" />
						</form>
						<br />
						<form action="tentor_update.php" method="post">
							<table>
								<tr>
									<td><label>ID Tentor</label></td>
									<td><input type="text" name="id_tentor" value="<?php echo $dataku->id_tentor ?>" required readonly /></td>
								</tr>
								<tr>
									<td><label>Nama</label></td>
									<td><input type="text" name="nama_tentor" value="<?php echo $dataku->nama_tentor ?>" required /></td>
								</tr>
								<tr>
									<td><label>No HP / Telepon</label></td>
									<td><input type="number" name="hp_tentor" value="<?php echo $dataku->hp_tentor ?>" required min="0" maxlength="12" /></td>
								</tr>
								<tr>
									<td><label>Alamat</label></td>
									<td><textarea name="alamat_tentor" required><?php echo $dataku->alamat_tentor ?></textarea></td>
								</tr>
								<tr>
									<td><label>Email</label></td>
									<td><input type="email" name="email_tentor" value="<?php echo $dataku->email_tentor ?>" required /></td>
								</tr>
								<tr>
									<td><label>Agama</label></td>
									<td>
										<select name="agama_tentor" required />
											<option value="<?php echo $dataku->agama_tentor ?>"><?php echo $dataku->agama_tentor ?></option>
											<option value=""></option>
											<option value="Islam">Islam</option>
											<option value="Katolik">Katolik</option>
											<option value="Protestan">Protestan</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<option value="">Lainnya</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Tanggal Lahir</label></td>
									<td><input type="date" name="tl_tentor" value="<?php echo $dataku->tl_tentor?>" required /></td>
								</tr>
								<tr>
									<td><label>Gaji</label></td>
									<td>Rp. <input type="number" name="gaji_tentor" value="<?php echo $dataku->gaji_tentor ?>" required min="0" maxlength="12" /></td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" value="Perbarui" name="edit_tentor" />
										<input type="reset" />
										<a href="tentor_list.php"><input type="button" value="List Tentor" /></a>
									</td>
								</tr>
							</table>
						</form>
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