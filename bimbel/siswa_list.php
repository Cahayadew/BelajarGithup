<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php"; 
		?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Bimbel K3 | List Siswa</title>
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
                                $daftar	= mysql_query("SELECT * FROM tb_siswa") or die (mysql_error());
								$I = 1;
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
											$daftar2 = mysql_query("SELECT * FROM tb_kelas where id_kelas = '$dataku->id_kelas'") or die (mysql_error());
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
											<a href="siswa_hapus.php?id_siswa=<?php echo $dataku->id_siswa?>&foto_siswa=<?= $r[‘foto_siswa’];?>">Hapus</a>
										</td>
									</tr>
									<?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10" align="center"><strong>Total Biaya Pendaftaran</strong></td>
                                <td colspan="2">
                                    <strong>
                                        <?php
                                            $jumlah	= mysql_query ("select sum(harga_siswa) 'total' from tb_siswa");
                                            $total	= mysql_fetch_object($jumlah);
                                            echo "Rp. ".$total->total;
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <br />
                    <br />
                    <a href="#"><input type="button" value="Print" /></a>
                    <a href="#"><input type="button" value="Save Pdf" /></a>
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