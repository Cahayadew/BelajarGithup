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
					<title>Bimbel K3 | Edit Siswa</title>
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
						<form action="siswa_update_foto.php?id_siswa=<?php echo $dataku->id_siswa ?>" method="post" enctype="multipart/form-data">
							<img src="<?php echo $dataku->foto_siswa ?>" alt="<?php echo $dataku->nama_siswa?>" width="170" height="200" />
							<br />
							<input type="file" name="foto_siswa" required />
							<input type="submit" value="Ganti Foto" name="edit_foto_siswa" />
						</form>
						<br />
						<form action="siswa_update.php" method="post">
							<table>
								<tr>
									<td><label>ID Siswa</label></td>
									<td><input type="text" name="id_siswa" value="<?php echo $dataku->id_siswa; ?>" required readonly /></td>
								</tr>
								<tr>
									<td><label>Nama</label></td>
									<td><input type="text" name="nama_siswa" value="<?php echo $dataku->nama_siswa; ?>" required /></td>
								</tr>
								<tr>
									<td><label>No HP / Telepon</label></td>
									<td><input type="number" name="hp_siswa" value="<?php echo $dataku->hp_siswa; ?>" required min="0" maxlength="12" /></td>
								</tr>
								<tr>
									<td><label>Alamat</label></td>
									<td><textarea name="alamat_siswa" required><?php echo $dataku->alamat_siswa; ?></textarea></td>
								</tr>
								<tr>
									<td><label>Asal Sekolah</label></td>
									<td>
										<select name="jenjang_kelas" required />
											<option value="<?php echo $datamu->jenjang_kelas; ?>"><?php echo $datamu->jenjang_kelas; ?></option>
											<option></option>
											<option value="SD">SD</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
										</select>
										<input type="text" name="sekolah_siswa" value="<?php echo $dataku->sekolah_siswa ?>" required />
									</td>
								</tr>
								<tr>
									<td><label>Kelas</label></td>
									<td>
										<select name="kelas_siswa" required />
											<option value="<?php echo $datamu->tingkat_kelas; ?>"><?php echo $datamu->tingkat_kelas; ?></option>
											<option></option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Jurusan </label></td>
									<td>
										<select name="jurusan_siswa" />
											<option value="<?php echo $datamu->jurusan_kelas; ?>"><?php echo $datamu->jurusan_kelas; ?></option>
											<option></option>
											<option value="IPA">IPA</option>
											<option value="IPS">IPS</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td><label>Paket</label></td>
									<td>
										<select name="paket_siswa" required />
											<option value="<?php echo $datamu->paket_kelas; ?>"><?php echo $datamu->paket_kelas; ?></option>
											<option></option>
											<option value="Intensif SBMPTN">Intensif SBMPTN</option>
											<option value="Intensif UN">Intensif UN</option>
											<option value="Gold">Gold</option>
											<option value="Silver">Silver</option>
											<option value="Reguler">Reguler</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Jadwal</label></td>
									<td>
										<select name="jadwal_siswa" required />
											<option value="A"><?php echo $datamu->hari_kelas." ".$datamu->jam_kelas; ?></option>
											<option></option>
											<option value="Senin & Kamis 13.00-14.30">Senin & Kamis 13.00-14.30</option>
											<option value="Senin & Kamis 15.00-16.30">Senin & Kamis 15.00-16.30</option>
											<option value="Senin & Kamis 18.00-19.30">Senin & Kamis 18.00-19.30</option>
											<option value="Senin & Kamis 20.00-21.30">Senin & Kamis 20.00-21.30</option>
											<option value="Selasa & Jumat 13.00-14.30">Selasa & Jumat 13.00-14.30</option>
											<option value="Selasa & Jumat 15.00-16.30">Selasa & Jumat 15.00-16.30</option>
											<option value="Selasa & Jumat 18.00-19.30">Selasa & Jumat 18.00-19.30</option>
											<option value="Selasa & Jumat 20.00-21.30">Selasa & Jumat 20.00-21.30</option>
											<option value="Rabu & Sabtu 13.00-14.30">Rabu & Sabtu 13.00-14.30</option>
											<option value="Rabu & Sabtu 15.00-16.30">Rabu & Sabtu 15.00-16.30</option>
											<option value="Rabu & Sabtu 18.00-19.30">Rabu & Sabtu 18.00-19.30</option>
											<option value="Rabu & Sabtu 20.00-21.30">Rabu & Sabtu 20.00-21.30</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Kelas Bimbel</label></td>
									<td>
										<select name="id_kelas" required />
											<option value="<?php echo $dataku->id_kelas; ?>"><?php echo $dataku->id_kelas; ?></option>
											<option></option>
											<?php
												$myquery3	= "SELECT * FROM tb_kelas";
												$daftar3	= mysql_query($myquery3) or die (mysql_error());
												while($datadia = mysql_fetch_object($daftar3))
												{
													?>
														<option value="<?php echo $datadia->id_kelas; ?>"><?php echo $datadia->id_kelas; ?></option>
													<?php
												}
											?>
										</select>
										<a href="kelas_list.php">Lihat List Kelas</a>
									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td><label>Peringkat di kelas</label></td>
									<td>
										<select name="peringkat_siswa" required />
											<option value="<?php echo $dataku->peringkat_siswa; ?>"><?php echo $dataku->peringkat_siswa; ?></option>
											<option></option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Anak guru</label></td>
									<td>
										<input type="radio" name="anak_siswa" value="<?php echo $dataku->anak_siswa; ?>" checked />
										<?php echo $dataku->anak_siswa; ?>
										|
										<input type="radio" name="anak_siswa" value="Ya" />Ya
										<input type="radio" name="anak_siswa" value="Tidak" />Tidak
									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" value="Perbarui" name="edit_siswa" />
										<input type="reset" />
										<a href="siswa_list.php"><input type="button" value="Kembali" /></a>
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