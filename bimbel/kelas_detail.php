<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_kelas']))
		header('location:kelas_list.php');
		else
		{
			include "koneksi.php";
			$id_kelas	= $_GET['id_kelas'];
			$qryedit	= mysql_query ("SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'");
			$dataku		= mysql_fetch_object($qryedit);
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Detil Kelas</title>
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
						<br />
						<table>
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
								<td>Kapasitas</td>
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
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>