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
					<li><a href="siswa_form.php">Siswa</a></li>
					<li><a href="tentor_form.php">Tentor</a></li>
					<li class="active"><a href="kelas_form.php">Kelas</a></li>
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
			<h3 class="top-head w_hd">Kelas</h3>
			<span class="line w_l_1">
				<span class="sub-line w_l_1"></span>
			</span>
			<ul id="filters" class="clearfix">
						<a href="kelas_form.php"><li><span class="filter active">Tambah Baru</span></li></a>
						<a href="kelas_list.php"><li><span class="filter">Lihat List Kelas</span></li></a>
					</ul>
                    <?php
						error_reporting(0);
						if($_GET[pesan]=='sudah')
						{
							echo"<font color='red'>Tentor yang dipilih sudah ada jadwal</font><br /><br />";
						}
					?>
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    <form action="kelas_simpan.php" method="post">
                    <input type="text" name="nama_kelas" required placeholder="Nama Ruang" /></td>
                    <select name="jenjang_kelas" required />
                                        <option>Jenjang</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                    </select>
                                    <select name="tingkat_kelas" required />
                                        <option>Tingkat</option>
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
                                    <select name="jurusan_kelas" />
                                        <option>Jurusan</option>
	                                    <option value=""></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                    <select name="paket_kelas" required />
                                        <option>Paket</option>
                                        <option value="Intensif SBMPTN">Intensif SBMPTN</option>
                                        <option value="Intensif UN">Intensif UN</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Reguler">Reguler</option>
                                    </select>
                                    <input type="number" name="kapasitas_kelas" min="0" max="50" required placeholder="Kapasitas" /></td>
                                    <select name="hari_kelas" required />
                                        <option>Hari</option>
                                        <option value="Senin & Kamis">Senin & Kamis</option>
                                        <option value="Selasa & Jumat">Selasa & Jumat</option>
                                        <option value="Rabu & Sabtu">Rabu & Sabtu</option>
                                    </select>
                                    <select name="jam_kelas" required />
                                        <option>Jam</option>
                                        <option value="13.00-14.30">13.00-14.30</option>
                                        <option value="15.00-16.30">15.00-16.30</option>
                                        <option value="18.00-19.30">18.00-19.30</option>
                                        <option value="20.00-21.30">20.00-21.30</option>
                                    </select>
                                    <select name="id_tentor" required />
                                        <option>Tentor</option>
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
                                    <input type="submit" value="Simpan" name="simpan_kelas" />
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