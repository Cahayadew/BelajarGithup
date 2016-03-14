<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php"; 
		?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Bimbel K3 | List Kelas</title>
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
                    <form method="post" action="kelas_cari.php">
                        <input type="text" name="nama_kelas" placeholder="Cari Nama Ruang">
                        <input type="submit" value="Cari" name="cari_kelas">
                    </form>
                    <br />
                    <table border="1" cellpadding="5">
                        <thead>
                            <tr align="center">
                                <th>
                                    NO
                                </th>
                                <th>
                                    ID KELAS
                                </th>
                                <th>
                                    RUANG
                                </th>
                                <th>
                                    JENJANG
                                </th>
                                <th>
                                    KELAS
                                </th>
                                <th>
                                    JURUSAN
                                </th>
                                <th>
                                    PAKET
                                </th>
                                <th>
                                    KAPASITAS
                                </th>
                                <th>
                                    HARI
                                </th>
                                <th>
                                    JAM
                                </th>
                                <th>
                                    ID TENTOR
                                </th>
                                <th>
                                    OPSI
                                </th>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                                $daftar		= mysql_query("SELECT * FROM tb_kelas") or die (mysql_error());
								$I			= 1;
                                while($dataku = mysql_fetch_object($daftar))
                                {
									?>
									<tr>
										<td align="center"><?php echo $I++; ?></td>
										<td align="center"><?php echo $dataku->id_kelas; ?></td>
										<td><?php echo $dataku->nama_kelas; ?></td>
										<td align="center"><?php echo $dataku->jenjang_kelas; ?></td>
										<td align="center"><?php echo $dataku->tingkat_kelas; ?></td>
										<td align="center"><?php echo $dataku->jurusan_kelas; ?></td>
										<td><?php echo $dataku->paket_kelas; ?></td>
										<td align="center"><?php echo $dataku->kapasitas_kelas; ?></td>
										<td><?php echo $dataku->hari_kelas; ?></td>
										<td><?php echo $dataku->jam_kelas; ?></td>
										<td align="center">
                                        	<a href="tentor_detail.php?id_tentor=<?php echo $dataku->id_tentor?>"><?php echo $dataku->id_tentor; ?></a>
                                        </td>
										<td align="center">
											<a href="kelas_siswa.php?id_kelas=<?php echo $dataku->id_kelas?>">List Siswa</a>
											|
											<a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>">Detail</a>
                                            |
											<a href="kelas_edit.php?id_kelas=<?php echo $dataku->id_kelas?>">Edit</a>
											|
											<a href="kelas_hapus.php?id_kelas=<?php echo $dataku->id_kelas?>">Hapus</a>
										</td>
									</tr>
									<?php
                                }
                            ?>
                        </tbody>
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