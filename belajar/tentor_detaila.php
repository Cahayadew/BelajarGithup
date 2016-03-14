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
					<title>Bimbel K3 | Detil Tentor</title>
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
						<table>
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
						<table border="1">
							<tr>
								<th colspan="9">DAFTAR KELAS</th>
							</tr>
							<tr>
								<th>ID KELAS</th>
								<th>RUANG</th>
								<th>JENJANG</th>
								<th>KELAS</th>
								<th>JURUSAN</th>
								<th>PAKET</th>
								<th>HARI</th>
								<th>JAM</th>
								<th>OPSI</th>
							</tr>
							<?php
								$qry	= mysql_query ("select * from tb_kelas where id_tentor = '$id_tentor'");
								while($datamu = mysql_fetch_object($qry))
								{
									?>
									<tr>
										<td align="center">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->id_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->nama_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jenjang_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->tingkat_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jurusan_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->paket_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->hari_kelas;
												else echo "-";
											?>
										</td>
										<td>
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jam_kelas;
												else echo "-";
											?>
										</td>
										<td align="center">
											<a href="kelas_siswa.php?id_kelas=<?php echo $datamu->id_kelas?>">List Siswa</a>
											|
											<a href="kelas_detail.php?id_kelas=<?php echo $datamu->id_kelas?>">Detail</a>
											|
											<a href="kelas_edit.php?id_kelas=<?php echo $datamu->id_kelas?>">Edit</a>
											|
											<a href="kelas_hapus.php?id_kelas=<?php echo $datamu->id_kelas?>">Hapus</a>
										</td>
									</tr>
									<?php
								}
							?>
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
		header('location:login_form.php?pesan=login');
		}
?>