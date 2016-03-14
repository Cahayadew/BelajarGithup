<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['cari_siswa']))
		header('location:siswa_list.php');
		else
		{
			include "koneksi.php";
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Cari Siswa</title>
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
						<form method="post" action="siswa_cari.php">
							<input type="text" name="nama_siswa" placeholder="Cari Nama Siswa">
							<input type="submit" value="Cari" name="cari_siswa">
						</form>
						<br />
						<table border="1" cellpadding="5">
							<thead>
								<tr align="center">
									<th>
										NO
									</th>
									<th>
										ID SISWA
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
										SEKOLAH
									</th>
									<th>
										KELAS
									</th>
									<th>
										JURUSAN
									</th>
									<th>
										KELAS BIMBEL
									</th>
									<th>
										PAKET
									</th>
									<th>
										BIAYA DAFTAR
									</th>
									<th>
										OPSI
									</th>
								</th>
							</thead>
							<tbody>
								<?php
									$nama_siswa = $_POST['nama_siswa'];
									$myquery	= "SELECT * FROM tb_siswa WHERE nama_siswa LIKE '%$nama_siswa%'";
									$daftar		= mysql_query($myquery) or die (mysql_error());
									$I			= 1;
									while($dataku = mysql_fetch_object($daftar))
									{
										?>
										<tr>
                                            <td align="center"><?php echo $I++; ?></td>
                                            <td align="center"><?php echo $dataku->id_siswa; ?></td>
											<td><?php echo $dataku->nama_siswa; ?></td>
											<td><?php echo $dataku->hp_siswa; ?></td>
											<td><?php echo $dataku->alamat_siswa; ?></td>
											<?php
												$myquery2	= "SELECT * FROM tb_kelas WHERE id_kelas = '$dataku->id_kelas'";
												$daftar2	= mysql_query($myquery2) or die (mysql_error());
												while($datamu = mysql_fetch_object($daftar2))
												{
													?>
													<td><?php echo $datamu->jenjang_kelas." ".$dataku->sekolah_siswa; ?></td>
													<td align="center"><?php echo $datamu->tingkat_kelas; ?></td>
													<td align="center">
														<?php
															if (isset($datamu->jurusan_kelas))
															echo $datamu->jurusan_kelas;
															else
															echo "-";
														?>
													</td>
													<td align="center">
														<a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>">
															<?php echo $dataku->id_kelas; ?>
														</a>
													</td>
													<td><?php echo $datamu->paket_kelas; ?></td>
													<td><?php echo "Rp. ".$dataku->harga_siswa; ?></td>
													<?php
												}
											?>
											<td align="center">
												<a href="siswa_detail.php?id_siswa=<?php echo $dataku->id_siswa?>">Detail</a>
												|
												<a href="siswa_edit.php?id_siswa=<?php echo $dataku->id_siswa?>">Edit</a>
												|
												<a href="siswa_hapus.php?id_siswa=<?php echo $dataku->id_siswa?>&foto_siswa=<?= $r[‘foto_siswa’];?>">
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