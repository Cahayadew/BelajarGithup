<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php";
		?>
		<!DOCTYPE html>
        <html>
            <head>
                <title>Bimbel K3 | Form Tentor</title>
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
                    <form action="tentor_simpan.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Nama</label></td>
                                <td><input type="text" name="nama_tentor" required /></td>
                            </tr>
                            <tr>
                                <td><label>No HP / Telepon</label></td>
                                <td><input type="number" name="hp_tentor" required min="0" maxlength="12" /></td>
                            </tr>
                            <tr>
                                <td><label>Alamat</label></td>
                                <td><textarea name="alamat_tentor" required></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><input type="email" name="email_tentor" required /></td>
                            </tr>
                            <tr>
                                <td><label>Agama</label></td>
                                <td>
                                    <select name="agama_tentor" required />
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="">Lainnya</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tanggal Lahir</label></td>
                                <td><input type="date" name="tl_tentor" required /></td>
                            </tr>
                            <tr>
                                <td><label>Gaji</label></td>
                                <td>Rp. <input type="number" name="gaji_tentor" required min="0" maxlength="12" /></td>
                            </tr>
                            <tr>
                                <td><label>Foto</label></td>
                                <td><input type="file" name="foto_tentor" accept="image/gif, image/jpeg, image/png, image/bmp" required /></td>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Daftar" name="simpan_tentor" />
                                    <input type="reset" />
                                    <a href="tentor_list.php"><input type="button" value="List Tentor" /></a>
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