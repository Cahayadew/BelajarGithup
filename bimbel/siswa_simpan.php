<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['simpan_siswa']))
		header('location:siswa_form.php');
		else
		{
			include "koneksi.php";
			$nama_siswa			= $_POST['nama_siswa'];
			$hp_siswa			= $_POST['hp_siswa'];
			$alamat_siswa		= $_POST['alamat_siswa'];
			$sekolah_siswa		= $_POST['sekolah_siswa'];
			$id_kelas			= $_POST['id_kelas'];
			$peringkat_siswa	= $_POST['peringkat_siswa'];
			$anak_siswa			= $_POST['anak_siswa'];
			$namafolder			= "foto_siswa/";
			$foto_siswa			= $namafolder . basename($_FILES['foto_siswa']['name']);
			$daftarmu			= mysql_query("SELECT * FROM tb_kelas where id_kelas = '$id_kelas'") or die (mysql_error());
			$datamu				= mysql_fetch_object($daftarmu);
			$jml				= mysql_query("SELECT count(*) 'jml_siswa' FROM tb_siswa where id_kelas = $id_kelas") or die (mysql_error());
			$jmlku				= mysql_fetch_object($jml);
			
			if ($jmlku->jml_siswa >= $datamu->kapasitas_kelas)
			{
				header('location:siswa_form.php?pesan=penuh');
			}
			else
			{
			move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $foto_siswa);
			
			//Harga Paket
			if ($datamu->paket_kelas == 'Intensif SBMPTN' || $datamu->paket_kelas == 'Reguler')
			{
				$harga = 2000000;
			}
			else if ($datamu->paket_kelas == 'Intensif UN')
			{
				$harga = 1000000;
			}
			else if ($datamu->paket_kelas == 'Gold')
			{
				$harga = 3000000;
			}
			else if ($datamu->paket_kelas == 'Silver')
			{
				$harga = 2500000;
			}
			
			//Diskon Peringkat
			if ($peringkat_siswa == '1')
			{
				$diskon1 = 500000;
			}
			else if ($peringkat_siswa == '2')
			{
				$diskon1 = 400000;
			}
			else if ($peringkat_siswa == '3')
			{
				$diskon1 = 300000;
			}
			else
			{
				$diskon1 = 0;
			}
			
			//Diskon Anak Guru
			if ($anak_siswa == 'Ya')
			{
				$diskon2 = 500000;
			}
			else
			{
				$diskon2 = 0;
			}
			
			$harga_siswa = $harga - $diskon1 - $diskon2;
			
			mysql_query ("insert into tb_siswa (nama_siswa, hp_siswa, alamat_siswa, sekolah_siswa, id_kelas, peringkat_siswa, anak_siswa, harga_siswa, foto_siswa) values('$nama_siswa', '$hp_siswa', '$alamat_siswa', '$sekolah_siswa', '$id_kelas', '$peringkat_siswa', '$anak_siswa', '$harga_siswa', '$foto_siswa')") or die(mysql_error());
			
			$daftar	= mysql_query("SELECT * FROM tb_siswa where nama_siswa = '$nama_siswa' and hp_siswa = '$hp_siswa'") or die (mysql_error());
			$dataku	= mysql_fetch_object($daftar);
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>Bimbel K3 | Detil Reg Siswa</title>
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
						<h2 style="color:#FF0004;">Registrasi Siswa Sukses</h2>
						<table>
							<tr>
								<td colspan="3"><font color="red">Harap catat informasi berikut!</font></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td>ID Siswa</td>
								<td>: <?php echo $dataku->id_siswa; ?></td>
								<td rowspan="7">
									<img src="<?php echo $dataku->foto_siswa ?>" alt="<?php echo $dataku->nama_siswa?>" width="170" height="200" />
								</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $dataku->nama_siswa; ?></td>
							</tr>
							<tr>
								<td>No HP / Telepon</td>
								<td>: <?php echo $dataku->hp_siswa; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $dataku->alamat_siswa; ?></td>
							</tr>
							<tr>
								<td>Sekolah</td>
								<td>: <?php echo $datamu->jenjang_kelas . " " . $dataku->sekolah_siswa; ?></td>
							</tr>
							<tr>
								<td>Kelas</td>
								<td>: <?php echo $datamu->tingkat_kelas; ?></td>
							</tr>
							<?php
								if (isset($datamu->jurusan_kelas))
								echo "<tr><td>Jurusan</td><td>: $datamu->jurusan_kelas</td></tr>"
							?>
							<tr>
								<td colspan="2">&nbsp;</td>
							</tr>
							<tr>
								<td>Paket</td>
								<td colspan="2">: <?php echo $datamu->paket_kelas; ?></td>
							</tr>
							<tr>
								<td>Jadwal</td>
								<td colspan="2">: <?php echo $datamu->hari_kelas." ".$datamu->jam_kelas; ?></td>
							</tr>
							<tr>
								<td>Kelas Bimbel</td>
								<td colspan="2">: <a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>"><?php echo $dataku->id_kelas; ?></a></td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;</td>
							</tr>
							<tr>
								<td>Peringkat di kelas</td>
								<td colspan="2">: <?php echo $dataku->peringkat_siswa; ?></td>
							</tr>
							<tr>
								<td>Anak guru</td>
								<td colspan="2">: <?php echo $dataku->anak_siswa; ?></td>
							</tr>
							<tr>
								<td>Harga Bimbel</td>
								<td colspan="2">: <?php echo "Rp. " . $harga_siswa?></td>
							</tr>
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
	}
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>