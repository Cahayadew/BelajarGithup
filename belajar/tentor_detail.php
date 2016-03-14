<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_tentor']))
		header('location:tentor_list.php');
		else
		{
			include "koneksi.php";
			$id_tentor	= $_GET['id_tentor'];
			$qryedit	= mysql_query ("SELECT * FROM tb_tentor WHERE id_tentor = '$id_tentor'");
			$dataku		= mysql_fetch_object($qryedit);
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
					<li class="active"><a href="tentor_form.php">Tentor</a></li>
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
			<h3 class="top-head w_hd">Tentor</h3>
			<span class="line w_l_1">
				<span class="sub-line w_l_1"></span>
			</span>
			<ul id="filters" class="clearfix">
						<a href="tentor_form.php"><li><span class="filter">Daftar Baru</span></li></a>
						<a href="tentor_list.php"><li><span class="filter">Lihat List Tentor</span></li></a>
					</ul>
                    <br />
                    <br />
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    	<center>
						<table>
							<tr>
								<td>ID Tentor</td>
								<td>: <?php echo $dataku->id_tentor; ?></td>
								<td rowspan="7">
									<img src="<?php echo $dataku->foto_tentor ?>" alt="<?php echo $dataku->nama_tentor?>" width="170" height="200" />
								</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $dataku->nama_tentor; ?></td>
							</tr>
							<tr>
								<td>No HP / Telepon</td>
								<td>: <?php echo $dataku->hp_tentor; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $dataku->alamat_tentor; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>: <?php echo $dataku->email_tentor; ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>: <?php echo $dataku->agama_tentor; ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>: <?php echo $dataku->tl_tentor; ?></td>
							</tr>
							<tr>
								<td>Gaji</td>
								<td>: Rp. <?php echo $dataku->gaji_tentor; ?></td>
							</tr>
						</table>
						<br />
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th colspan="9" style="text-align:center; vertical-align:middle">DAFTAR KELAS</th>
							</tr>
							<tr>
								<th style="text-align:center; vertical-align:middle">ID KELAS</th>
								<th style="text-align:center; vertical-align:middle">RUANG</th>
								<th style="text-align:center; vertical-align:middle">JENJANG</th>
								<th style="text-align:center; vertical-align:middle">KELAS</th>
								<th style="text-align:center; vertical-align:middle">JURUSAN</th>
								<th style="text-align:center; vertical-align:middle">PAKET</th>
								<th style="text-align:center; vertical-align:middle">HARI</th>
								<th style="text-align:center; vertical-align:middle">JAM</th>
								<th style="text-align:center; vertical-align:middle">OPSI</th>
							</tr>
							<?php
								$qry	= mysql_query ("select * from tb_kelas where id_tentor = '$id_tentor'");
								while($datamu = mysql_fetch_object($qry))
								{
									?>
									<tr>
										<td style="vertical-align:middle" align="center">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->id_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->nama_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jenjang_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->tingkat_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jurusan_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->paket_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->hari_kelas;
												else echo "-";
											?>
										</td>
										<td style="vertical-align:middle">
											<?php
												if (isset($_GET["id_tentor"]))
												echo $datamu->jam_kelas;
												else echo "-";
											?>
										</td>
										<td align="center" style="vertical-align:middle">
											<a href="kelas_siswa.php?id_kelas=<?php echo $datamu->id_kelas?>"><i style="color:#0A00FF">List Siswa</i></a><br />
											<a href="kelas_detail.php?id_kelas=<?php echo $datamu->id_kelas?>"><i style="color:#0A00FF">Detail</i></a><br />
											<a href="kelas_edit.php?id_kelas=<?php echo $datamu->id_kelas?>"><i style="color:#0A00FF">Edit</i></a><br />
											<a href="kelas_hapus.php?id_kelas=<?php echo $datamu->id_kelas?>"><i style="color:#0A00FF">Hapus</i></a>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
						<br />
                        <center>
						<a href="siswa_edit.php?id_siswa=<?php echo $dataku->id_siswa?>"><input type="button" value="Edit" /></a>
                        </center>
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
					<p>Design by <a href="http://w3layouts.com/">W3layouts</a></p>
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