<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php";
		?>
		<!DOCTYPE html>
        <html>
            <head>
                <title>Bimbel K3 | Form Kelas</title>
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
                    <?php
						error_reporting(0);
						if($_GET[pesan]=='sudah')
						{
							echo"<font color='red'>Tentor yang dipilih sudah ada jadwal</font><br /><br />";
						}
					?>
                    <form action="kelas_simpan.php" method="post">
                        <table>
                            <tr>
                                <td><label>Ruang</label></td>
                                <td><input type="text" name="nama_kelas" required /></td>
                            </tr>
                            <tr>
                                <td><label>Jenjang</label></td>
                                <td>
                                    <select name="jenjang_kelas" required />
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
	                                    <option value=""></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Paket</label></td>
                                <td>
                                    <select name="paket_kelas" required />
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
                                <td><input type="number" name="kapasitas_kelas" min="0" max="50" required /></td>
                            </tr>
                            <tr>
                                <td><label>Hari</label></td>
                                <td>
                                    <select name="hari_kelas" required />
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
                                    <a href="tentor_list.php" target="_blank">Lihat List Tentor</a>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Simpan" name="simpan_kelas" />
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
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>