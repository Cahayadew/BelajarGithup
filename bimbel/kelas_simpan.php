<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['simpan_kelas']))
		header('location:kelas_form.php');
		else
		{
			include "koneksi.php";
			$nama_kelas		= $_POST['nama_kelas'];
			$jenjang_kelas	= $_POST['jenjang_kelas'];
			$tingkat_kelas	= $_POST['tingkat_kelas'];
			$jurusan_kelas	= $_POST['jurusan_kelas'];
			$paket_kelas	= $_POST['paket_kelas'];
			$kapasitas_kelas= $_POST['kapasitas_kelas'];
			$hari_kelas		= $_POST['hari_kelas'];
			$jam_kelas		= $_POST['jam_kelas'];
			$id_tentor		= $_POST['id_tentor'];
			$a				= mysql_query("SELECT * FROM tb_kelas WHERE id_tentor = '$id_tentor' AND hari_kelas = '$hari_kelas' AND jam_kelas = '$jam_kelas'") or die (mysql_error());
			$b				= mysql_fetch_object($a);
			if ($id_tentor == $b->id_tentor and $hari_kelas == $b->hari_kelas and $jam_kelas == $b->jam_kelas)
			{
				header('location:kelas_form.php?pesan=sudah');
			}
			else
			{
				mysql_query ("INSERT INTO tb_kelas (nama_kelas, jenjang_kelas, tingkat_kelas, jurusan_kelas, paket_kelas, kapasitas_kelas, hari_kelas, jam_kelas, id_tentor) VALUES('$nama_kelas', '$jenjang_kelas', '$tingkat_kelas', '$jurusan_kelas', '$paket_kelas', '$kapasitas_kelas', '$hari_kelas', '$jam_kelas', '$id_tentor')") or die(mysql_error());
				
				$daftar	= mysql_query("SELECT * FROM tb_kelas WHERE nama_kelas = '$nama_kelas' and jenjang_kelas = '$jenjang_kelas' and tingkat_kelas = '$tingkat_kelas' and jurusan_kelas = '$jurusan_kelas' and paket_kelas = '$paket_kelas' and kapasitas_kelas = '$kapasitas_kelas' and hari_kelas = '$hari_kelas' and jam_kelas = '$jam_kelas' and id_tentor = '$id_tentor'") or die (mysql_error());
				$dataku	= mysql_fetch_object($daftar);
				?>
				<!DOCTYPE html>
				<html>
					<head>
						<title>Bimbel K3 | Detil Tambah Kelas</title>
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
							<a href="kelas_form.php">Tambah Kelas</a>
							|
							<a href="kelas_list.php">List Kelas</a>
							<br /><br />
							<h2 style="color:#FF0004;">Registrasi Tentor Sukses</h2>
							<table>
								<tr>
									<td colspan="3"><font color="red">Harap catat informasi berikut!</font></td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td>ID Kelas</td>
									<td>: <?php echo $dataku->id_kelas; ?></td>
								</tr>
								<tr>
									<td>Ruang</td>
									<td>: <?php echo $dataku->nama_kelas; ?></td>
								</tr>
								<tr>
									<td>Jenjang</td>
									<td>: <?php echo $dataku->jenjang_kelas; ?></td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td>: <?php echo $dataku->tingkat_kelas; ?></td>
								</tr>
								<?php
									if (isset($dataku->jurusan_kelas))
									echo "<tr><td>Jurusan</td><td>: $dataku->jurusan_kelas</td></tr>"
								?>
								<tr>
									<td>Paket</td>
									<td>: <?php echo $dataku->paket_kelas; ?></td>
								</tr>
								<tr>
									<td>Kapsitas</td>
									<td>: <?php echo $dataku->kapasitas_kelas; ?></td>
								</tr>
								<tr>
									<td>Hari</td>
									<td>: <?php echo $dataku->hari_kelas; ?></td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>: <?php echo $dataku->jam_kelas; ?></td>
								</tr>
								<tr>
									<td>Tentor</td>
									<td>: <a href="tentor_detail.php?id_tentor=<?php echo $dataku->id_tentor?>"><?php echo $dataku->id_tentor; ?></a></td>
								</tr>
							</table>
							<br />
							<a href="#"><input type="button" value="Save Pdf" /></a>
							<a href="kelas_edit.php?id_kelas=<?php echo $dataku->id_kelas?>"><input type="button" value="Edit" /></a>
						</center>
					</body>
				</html>
				<?php
			}
		}
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>