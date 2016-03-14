<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['cari_tentor']))
		header('location:tentor_list.php');
		else
		{
			include "koneksi.php";
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Cari Tentor</title>
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
						<form method="post" action="tentor_cari.php">
							<input type="text" name="nama_tentor" placeholder="Cari Nama Tentor">
							<input type="submit" value="Cari" name="cari_tentor">
						</form>
						<br />
						<table border="1" cellpadding="5">
							<thead>
								<tr align="center">
									<th>
										NO
									</th>
									<th>
										ID TENTOR
									</th>
									<th>
										NAMA
									</th>
									<th>
										HP / TELEPON
									</th>
									<th>
										ALAMAT
									</th>
									<th>
										EMAIL
									</th>
									<th>
										AGAMA
									</th>
									<th>
										TANGGAL LAHIR
									</th>
									<th>
										FOTO
									</th>
									<th>
										GAJI
									</th>
									<th>
										OPSI
									</th>
								</th>
							</thead>
							<tbody>
								<?php
									$nama_tentor = $_POST['nama_tentor'];
									$myquery	= "SELECT * FROM tb_tentor WHERE nama_tentor LIKE '%$nama_tentor%'";
									$daftar		= mysql_query($myquery) or die (mysql_error());
									$I			= 1;
									while($dataku = mysql_fetch_object($daftar))
									{
										?>
										<tr>
											<td align="center"><?php echo $I++; ?></td>
											<td align="center"><?php echo $dataku->id_tentor; ?></td>
											<td><?php echo $dataku->nama_tentor; ?></td>
											<td><?php echo $dataku->hp_tentor; ?></td>
											<td><?php echo $dataku->alamat_tentor; ?></td>
											<td><?php echo $dataku->email_tentor; ?></td>
											<td><?php echo $dataku->agama_tentor; ?></td>
											<td><?php echo $dataku->tl_tentor; ?></td>
											<td><img src="<?php echo $dataku->foto_tentor; ?>" width="100" /></td>
											<td>Rp. <?php echo $dataku->gaji_tentor; ?></td>
											<td align="center">
												<a href="tentor_detail.php?id_tentor=<?php echo $dataku->id_tentor?>">Detail</a>
												|
												<a href="tentor_edit.php?id_tentor=<?php echo $dataku->id_tentor?>">Edit</a>
												|
												<a href="tentor_hapus.php?id_tentor=<?php echo $dataku->id_tentor?>&foto_tentor=<?= $r[‘foto_tentor’];?>">
													Hapus
												</a>
											</td>
										</tr>
										<?php
									}
								?>
							</tbody>
						</table>
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