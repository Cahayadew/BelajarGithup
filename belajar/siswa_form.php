<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php";
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
						<a href="siswa_form.php"><li><span class="filter active">Daftar Baru</span></li></a>
						<a href="siswa_list.php"><li><span class="filter">Lihat List Siswa</span></li></a>
					</ul>
                    <?php
						error_reporting(0);
						if($_GET[pesan]=='penuh')
						{
							echo"<font color='red'>Kelas yang dipilih sudah penuh</font><br /><br />";
						}
					?>
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    <form action="siswa_simpan.php" method="post" enctype="multipart/form-data">
						<input type="text" name="nama_siswa" required placeholder="Nama Lengkap"/>
						<input type="text" name="hp_siswa" required placeholder="No HP"/>
						<textarea value="Alamat" name="alamat_siswa" required placeholder="Alamat"></textarea>
                    	<select name="jenjang_kelas" required class="abc" />
                                        <option>Jenjang</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                    </select>
						<input type="text" class="abd" name="sekolah_siswa" placeholder="Nama Sekolah" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama Sekolah';}"/>
                                    <select name="kelas_siswa" required />
                                        <option>Kelas</option>
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
                                    <select name="jurusan_siswa" />
                                        <option>Jurusan</option>
                                        <option></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                    <input type="file" name="foto_siswa"><select name="paket_siswa" required />
                                        <option>Paket</option>
                                        <option value="Intensif SBMPTN">Intensif SBMPTN</option>
                                        <option value="Intensif UN">Intensif UN</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Reguler">Reguler</option>
                                    </select>
                                    <select name="jadwal_siswa" required />
                                        <option>Jadwal</option>
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
                                    <select name="id_kelas" required />
                                        <option>Kelas Bimbel</option>
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
                                    <select name="peringkat_siswa" required />
                                        <option>Peringkat Kelas</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select name="anak_siswa" required />
                                        <option>Anak Guru</option>
                                        <option value="0">Ya</option>
                                        <option value="1">Tidak</option>
                                    </select>
						<input type="submit" name="simpan_siswa"/>
						<input type="reset" />
                                    </form>
					</div>
				</div>
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
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>