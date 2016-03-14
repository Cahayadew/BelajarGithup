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
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
						<form action="tentor_update_foto.php?id_tentor=<?php echo $dataku->id_tentor ?>" method="post" enctype="multipart/form-data">
							<img src="<?php echo $dataku->foto_tentor ?>" alt="<?php echo $dataku->nama_tentor?>" width="170" height="200" />
							<br />
							<input type="file" name="foto_tentor" required />
							<input type="submit" value="Ganti Foto" name="edit_foto_tentor" />
						</form>
						<br />
						<br />
						<br />
						<form action="tentor_update.php" method="post">
                        <input type="text" name="id_tentor" value="<?php echo $dataku->id_tentor ?>" required readonly />
                        <input type="text" name="nama_tentor" value="<?php echo $dataku->nama_tentor ?>" required />
                        <input type="number" name="hp_tentor" value="<?php echo $dataku->hp_tentor ?>" required min="0" maxlength="12" />
                        <textarea name="alamat_tentor" required><?php echo $dataku->alamat_tentor ?></textarea>
                        <input type="email" name="email_tentor" value="<?php echo $dataku->email_tentor ?>" required />
                        <select name="agama_tentor" required />
											<option value="<?php echo $dataku->agama_tentor ?>"><?php echo $dataku->agama_tentor ?></option>
											<option value=""></option>
											<option value="Islam">Islam</option>
											<option value="Katolik">Katolik</option>
											<option value="Protestan">Protestan</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<option value="">Lainnya</option>
										</select>
                                        <input type="date" name="tl_tentor" value="<?php echo $dataku->tl_tentor?>" required />
                                        <input type="number" name="gaji_tentor" value="<?php echo $dataku->gaji_tentor ?>" required min="0" maxlength="12" />
                                        <input type="submit" value="Perbarui" name="edit_tentor" />
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
	}
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>