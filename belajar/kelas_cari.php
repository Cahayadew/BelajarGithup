<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['cari_kelas']))
		header('location:kelas_list.php');
		else
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
						<a href="kelas_form.php"><li><span class="filter">Tambah Baru</span></li></a>
						<a href="kelas_list.php"><li><span class="filter">Lihat List Kelas</span></li></a>
					</ul>
				<div class="col-md-2 contact-left">
                </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    <form method="post" action="kelas_cari.php">
                        <input type="text" class="abd" name="nama_kelas" placeholder="Cari Nama Ruang">
                        <input type="submit" value="Cari" name="cari_kelas">
                    </form>
                    </div>
                    </div>
				<div class="col-md-2 contact-left">
                </div>
				<div class="col-md-12 contact-left">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr align="center">
									<th style="text-align:center; vertical-align:middle">
										NO
									</th>
									<th style="text-align:center; vertical-align:middle">
										ID KELAS
									</th>
									<th style="text-align:center; vertical-align:middle">
										RUANG
									</th>
									<th style="text-align:center; vertical-align:middle">
										JENJANG
									</th>
									<th style="text-align:center; vertical-align:middle">
										KELAS
									</th>
									<th style="text-align:center; vertical-align:middle">
										JURUSAN
									</th>
									<th style="text-align:center; vertical-align:middle">
										PAKET
									</th>
									<th style="text-align:center; vertical-align:middle">
										KAPASITAS
									</th>
									<th style="text-align:center; vertical-align:middle">
										HARI
									</th>
									<th style="text-align:center; vertical-align:middle">
										JAM
									</th>
									<th style="text-align:center; vertical-align:middle">
										ID TENTOR
									</th>
									<th style="text-align:center; vertical-align:middle">
										OPSI
									</th>
								</th>
							</thead>
							<tbody>
								<?php
									$nama_kelas = $_POST['nama_kelas'];
									$myquery	= "SELECT * FROM tb_kelas WHERE nama_kelas LIKE '%$nama_kelas%'";
									$daftar		= mysql_query($myquery) or die (mysql_error());
									$I			= 1;
									while($dataku = mysql_fetch_object($daftar))
									{
										?>
										<tr>
											<td style="vertical-align:middle" align="center"><?php echo $I++; ?></td>
											<td style="vertical-align:middle" align="center"><?php echo $dataku->id_kelas; ?></td>
											<td style="vertical-align:middle"><?php echo $dataku->nama_kelas; ?></td>
											<td style="vertical-align:middle" align="center"><?php echo $dataku->jenjang_kelas; ?></td>
											<td style="vertical-align:middle" align="center"><?php echo $dataku->tingkat_kelas; ?></td>
											<td style="vertical-align:middle" align="center"><?php echo $dataku->jurusan_kelas; ?></td>
											<td style="vertical-align:middle"><?php echo $dataku->paket_kelas; ?></td>
											<td style="vertical-align:middle" align="center"><?php echo $dataku->kapasitas_kelas; ?></td>
											<td style="vertical-align:middle"><?php echo $dataku->hari_kelas; ?></td>
											<td style="vertical-align:middle"><?php echo $dataku->jam_kelas; ?></td>
											<td style="vertical-align:middle" align="center">
												<a href="tentor_edit.php?id_tentor=<?php echo $dataku->id_tentor?>"><?php echo $dataku->id_tentor; ?></a>
											</td>
											<td align="center">
                                                <a href="kelas_siswa.php?id_kelas=<?php echo $dataku->id_kelas?>"><i style="color:#0A00FF">List Siswa</i></a><br />
												<a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>"><i style="color:#0A00FF">Detail</i></a><br />
												<a href="kelas_edit.php?id_kelas=<?php echo $dataku->id_kelas?>"><i style="color:#0A00FF">Edit</i></a><br />
												<a href="kelas_hapus.php?id_kelas=<?php echo $dataku->id_kelas?>"><i style="color:#0A00FF">Hapus</i></a>
											</td>
										</tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div>
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