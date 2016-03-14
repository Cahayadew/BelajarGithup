<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['edit_siswa']))
		header('location:siswa_list.php');
		else
		{
			include "koneksi.php";
			$id_siswa			= $_POST['id_siswa'];
			$nama_siswa			= $_POST['nama_siswa'];
			$hp_siswa			= $_POST['hp_siswa'];
			$alamat_siswa		= $_POST['alamat_siswa'];
			$sekolah_siswa		= $_POST['sekolah_siswa'];
			$id_kelas			= $_POST['id_kelas'];
			$peringkat_siswa	= $_POST['peringkat_siswa'];
			$anak_siswa			= $_POST['anak_siswa'];
			$daftarmu			= mysql_query("SELECT * FROM tb_kelas where id_kelas = '$id_kelas'") or die (mysql_error());
			$datamu				= mysql_fetch_object($daftarmu);
			
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
			
			mysql_query ("update tb_siswa set nama_siswa = '$nama_siswa', hp_siswa = '$hp_siswa', alamat_siswa = '$alamat_siswa', ".
			"sekolah_siswa = '$sekolah_siswa', id_kelas = '$id_kelas', peringkat_siswa = '$peringkat_siswa', anak_siswa = '$anak_siswa' "."
			where id_siswa = '$id_siswa'") or die (mysql_error());
			
			$daftar	= mysql_query("SELECT * FROM tb_siswa where id_siswa = '$id_siswa'") or die (mysql_error());
			$dataku	= mysql_fetch_object($daftar);
			?>
<!DOCTYPE html>
<html>
<head>
<title>Bimbel Kelompok 3</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<meta name="keywords" content="Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>  
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

<!---- start-smoth-scrolling---->
</head>
<body>
	<div class="banner1" id="home">
		<div class="container">
			<div class="header">
				<div class="menu">
                                     <a class="toggleMenu" href="#"><img src="images/menu-icon.png" alt="" /> </a>
					<ul class="nav" id="nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="active"><a href="siswa_form.php">Siswa</a></li>
					<li><a href="tentor_form.php">Tentor</a></li>
					<li><a href="kelas_form.php">Kelas</a></li>
					<li><a href="logout.php">Logout</a></li>
					</ul>
                                  <!----start-top-nav-script---->
		                      <script type="text/javascript" src="js/responsive-nav.js"></script>
					<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
					</script>
		<!----//End-top-nav-script---->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--start-academics-->
	<div class="portfolios" id="portfolio">
		<div class="container">
			<h3 class="top-head w_hd">Siswa</h3>
			<span class="line w_l_1">
				<span class="sub-line w_l_1"></span>
			</span>
			<ul id="filters" class="clearfix">
						<a href="siswa_form.php"><li><span class="filter">Daftar Baru</span></li></a>
						<a href="siswa_list.php"><li><span class="filter">Lihat List Siswa</span></li></a>
					</ul>
						<h2 style="color:#FF0004;">Edit Siswa Sukses</h2>
						<div style="text-align:left">
						<table align="center">
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
							<tr>
								<td colspan="2">&nbsp;</td>
							</tr>
							<?php
								if (isset($datamu->jurusan_kelas))
								echo "<tr><td>Jurusan</td><td>: $datamu->jurusan_kelas</td></tr>"
							?>
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
                        </div>
						<br />
                        <center>
						<a href="siswa_edit.php?id_siswa=<?php echo $dataku->id_siswa?>"><input type="button" value="Edit" /></a>
                        </center>
                    <div class="col-md-2">
                    </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-academics-->
	<!--start-footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-main">
				<div class="col-md-6 footer-left">
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="in"> </span></a></li>
					</ul>
				</div>
				<div class="col-md-6 footer-right">
					<p>Design by <a href="#">Kelompok 3 PHP Vokasi Universitas Brawijaya</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-->
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