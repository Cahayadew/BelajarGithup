<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php";
		?>
		<!DOCTYPE html>
        <html>
            <head>
                <title>Bimbel K3 | Form Siswa</title>
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
                    <?php
						error_reporting(0);
						if($_GET[pesan]=='penuh')
						{
							echo"<font color='red'>Kelas yang dipilih sudah penuh</font><br /><br />";
						}
					?>
                    <form action="siswa_simpan.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Nama</label></td>
                                <td><input type="text" name="nama_siswa" required /></td>
                            </tr>
                            <tr>
                                <td><label>No HP / Telepon</label></td>
                                <td><input type="number" name="hp_siswa" required min="0" maxlength="12" /></td>
                            </tr>
                            <tr>
                                <td><label>Alamat</label></td>
                                <td><textarea name="alamat_siswa" required></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Asal Sekolah</label></td>
                                <td>
                                    <select name="jenjang_kelas" required />
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                    </select>
                                    <input type="text" name="sekolah_siswa" required />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Kelas</label></td>
                                <td>
                                    <select name="kelas_siswa" required />
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
                                        <option></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Foto</label></td>
                                <td><input type="file" name="foto_siswa" accept="image/gif, image/jpeg, image/png, image/bmp" required /></td>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><label>Paket</label></td>
                                <td>
                                    <select name="paket_siswa" required />
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
										<?php
											$jenjang_kelas	= $_GET['jenjang_kelas'];
											$myquery		= "SELECT * FROM tb_kelas";
											$daftar			= mysql_query($myquery) or die (mysql_error());
											while($dataku = mysql_fetch_object($daftar))
											{
												?>
													<option value="<?php echo $dataku->id_kelas; ?>"><?php echo $dataku->id_kelas; ?></option>
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
                                    <input type="radio" name="anak_siswa" value="Ya" />Ya
                                    <input type="radio" name="anak_siswa" value="Tidak" checked />Tidak
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Daftar" name="simpan_siswa" />
                                    <input type="reset" />
                                    <a href="siswa_list.php"><input type="button" value="List Siswa" /></a>
                                </td>
                            </tr>
                        </table>
                    </form>
				</center>
		    </body>
		</html>
        <?php
	}
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>