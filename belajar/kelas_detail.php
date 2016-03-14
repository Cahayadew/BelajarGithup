<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_kelas']))
		header('location:kelas_list.php');
		else
		{
			include "koneksi.php";
			$id_kelas	= $_GET['id_kelas'];
			$qryedit	= mysql_query ("SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'");
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
                    <br />
                    <br />
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    	<center>
						<table align="center">
							<tr>
								<td>ID Kelas</td>
								<td>: <?php echo $dataku->id_kelas; ?></td>
							</tr>
							<tr>
								<td>Ruang</td>
								<td>: <?php echo $dataku->nama_kelas; ?></td>
							</tr>
							<tr>
								<td>Jenjang</td>
								<td>: <?php echo $dataku->jenjang_kelas; ?></td>
							</tr>
							<tr>
								<td>Kelas</td>
								<td>: <?php echo $dataku->tingkat_kelas; ?></td>
							</tr>
							<?php
								if (isset($dataku->jurusan_kelas))
								echo "<tr><td>Jurusan</td><td>: $dataku->jurusan_kelas</td></tr>"
							?>
							<tr>
								<td>Paket</td>
								<td>: <?php echo $dataku->paket_kelas; ?></td>
							</tr>
							<tr>
								<td>Kapasitas</td>
								<td>: <?php echo $dataku->kapasitas_kelas; ?></td>
							</tr>
							<tr>
								<td>Hari</td>
								<td>: <?php echo $dataku->hari_kelas; ?></td>
							</tr>
							<tr>
								<td>Jam</td>
								<td>: <?php echo $dataku->jam_kelas; ?></td>
							</tr>
							<tr>
								<td>Tentor</td>
								<td>: <a href="tentor_detail.php?id_tentor=<?php echo $dataku->id_tentor?>"><?php echo $dataku->id_tentor; ?></a></td>
							</tr>
						</table>
						<br />
                        <center>
						<a href="kelas_edit.php?id_kelas=<?php echo $dataku->id_kelas?>"><input type="button" value="Edit" /></a>
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