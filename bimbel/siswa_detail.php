<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_siswa']))
		header('location:siswa_list.php');
		else
		{
			include "koneksi.php";
			$id_siswa	= $_GET['id_siswa'];
			$qryedit	= mysql_query ("select * from tb_siswa where id_siswa = '$id_siswa'");
			$dataku		= mysql_fetch_object($qryedit);
			$qryedit2	= mysql_query ("select * from tb_kelas where id_kelas = '$dataku->id_kelas'");
			$datamu		= mysql_fetch_object($qryedit2);
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Detail Siswa</title>
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
						<a href="siswa_form.php">Registrasi Siswa</a>
						|
						<a href="siswa_list.php">List Siswa</a>
						<br /><br />
						<table>
							<tr>
								<td>ID Siswa</td>
								<td>: <?php echo $dataku->id_siswa; ?></td>
								<td rowspan="7">
									<img src="<?php echo $dataku->foto_siswa ?>" alt="<?php echo $dataku->nama_siswa?>" width="170" height="200" />
								</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $dataku->nama_siswa; ?></td>
							</tr>
							<tr>
								<td>No HP / Telepon</td>
								<td>: <?php echo $dataku->hp_siswa; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $dataku->alamat_siswa; ?></td>
							</tr>
							<tr>
								<td>Sekolah</td>
								<td>: <?php echo $datamu->jenjang_kelas . " " . $dataku->sekolah_siswa; ?></td>
							</tr>
							<tr>
								<td>Kelas</td>
								<td>: <?php echo $datamu->tingkat_kelas; ?></td>
							</tr>
							<tr>
								<td colspan="2">&nbsp;</td>
							</tr>
							<?php
								if (isset($datamu->jurusan_kelas))
								echo "<tr><td>Jurusan</td><td>: $datamu->jurusan_kelas</td></tr>"
							?>
							<tr>
								<td>Paket</td>
								<td colspan="2">: <?php echo $datamu->paket_kelas; ?></td>
							</tr>
							<tr>
								<td>Jadwal</td>
								<td colspan="2">: <?php echo $datamu->hari_kelas." ".$datamu->jam_kelas; ?></td>
							</tr>
							<tr>
								<td>Kelas Bimbel</td>
								<td colspan="2">: <a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>"><?php echo $dataku->id_kelas; ?></a></td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;</td>
							</tr>
							<tr>
								<td>Peringkat di kelas</td>
								<td colspan="2">: <?php echo $dataku->peringkat_siswa; ?></td>
							</tr>
							<tr>
								<td>Anak guru</td>
								<td colspan="2">: <?php echo $dataku->anak_siswa; ?></td>
							</tr>
							<tr>
								<td>Harga Bimbel</td>
								<td colspan="2">: <?php echo $dataku->harga_siswa?></td>
							</tr>
						</table>
						<br />
						<a href="#"><input type="button" value="Save Pdf" /></a>
						<a href="siswa_edit.php?id_siswa=<?php echo $dataku->id_siswa?>"><input type="button" value="Edit" /></a>
					</center>
				</body>
			</html>
			<?php
		}
	}
	else
	{
		header('location:form_login.php?pesan=login');
	}
?>