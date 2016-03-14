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
					<title>Bimbel K3 | Edit Kelas</title>
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
						<form action="kelas_update.php" method="post">
							<table>
								<tr>
									<td><label>ID Kelas</label></td>
									<td><input type="text" name="id_kelas" value="<?php echo $dataku->id_kelas ?>" required readonly /></td>
								</tr>
								<tr>
									<td><label>Ruang</label></td>
									<td><input type="text" name="nama_kelas" value="<?php echo $dataku->nama_kelas ?>" required /></td>
								</tr>
								<tr>
									<td><label>Jenjang</label></td>
									<td>
										<select name="jenjang_kelas" required />
											<option value="<?php echo $dataku->jenjang_kelas ?>"><?php echo $dataku->jenjang_kelas ?></option>
											<option value=""></option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Kelas</label></td>
									<td>
										<select name="tingkat_kelas" required />
											<option value="<?php echo $dataku->tingkat_kelas ?>"><?php echo $dataku->tingkat_kelas ?></option>
											<option value=""></option>
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
										<select name="jurusan_kelas" />
											<option value="<?php echo $dataku->jurusan_kelas ?>"><?php echo $dataku->jurusan_kelas ?></option>
											<option></option>
											<option value="IPA">IPA</option>
											<option value="IPS">IPS</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Paket</label></td>
									<td>
										<select name="paket_kelas" required />
											<option value="<?php echo $dataku->paket_kelas ?>"><?php echo $dataku->paket_kelas ?></option>
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
									<td><label>Kapasitas</label></td>
									<td>
                                    	<input type="number" name="kapasitas_kelas" value="<?php echo $dataku->kapasitas_kelas ?>" min="0" max="50" required>
									</td>
								</tr>
								<tr>
									<td><label>Hari</label></td>
									<td>
										<select name="hari_kelas" required />
											<option value="<?php echo $dataku->hari_kelas ?>"><?php echo $dataku->hari_kelas ?></option>
											<option></option>
											<option value="Senin & Kamis">Senin & Kamis</option>
											<option value="Selasa & Jumat">Selasa & Jumat</option>
											<option value="Rabu & Sabtu">Rabu & Sabtu</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Jam</label></td>
									<td>
										<select name="jam_kelas" required />
											<option value="<?php echo $dataku->jam_kelas ?>"><?php echo $dataku->jam_kelas ?></option>
											<option></option>
											<option value="13.00-14.30">13.00-14.30</option>
											<option value="15.00-16.30">15.00-16.30</option>
											<option value="18.00-19.30">18.00-19.30</option>
											<option value="20.00-21.30">20.00-21.30</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Tentor</label></td>
									<td>
										<select name="id_tentor" required />
											<option value="<?php echo $dataku->id_tentor ?>"><?php echo $dataku->id_tentor ?></option>
											<option></option>
											<?php
												$myquery	= "SELECT * FROM tb_tentor";
												$daftar		= mysql_query($myquery) or die (mysql_error());
												while($dataku = mysql_fetch_object($daftar))
												{
													?>
														<option value="<?php echo $dataku->id_tentor; ?>"><?php echo $dataku->id_tentor." - ".$dataku->nama_tentor; ?></option>
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
									<td colspan="2" align="center">
										<input type="submit" value="Perbarui" name="update_kelas" />
										<input type="reset" />
										<a href="kelas_list.php"><input type="button" value="List Kelas" /></a>
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