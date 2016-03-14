<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_POST['simpan_tentor']))
		header('location:tentor_form.php');
		else
		{
			include "koneksi.php";
			$nama_tentor	= $_POST['nama_tentor'];
			$hp_tentor		= $_POST['hp_tentor'];
			$alamat_tentor	= $_POST['alamat_tentor'];
			$email_tentor	= $_POST['email_tentor'];
			$agama_tentor	= $_POST['agama_tentor'];
			$tl_tentor		= $_POST['tl_tentor'];
			$gaji_tentor	= $_POST['gaji_tentor'];
			$namafolder		= "foto_tentor/";
			$foto_tentor	= $namafolder . basename($_FILES['foto_tentor']['name']);
			
			move_uploaded_file($_FILES['foto_tentor']['tmp_name'], $foto_tentor);
			
			mysql_query ("INSERT INTO tb_tentor (nama_tentor, hp_tentor, alamat_tentor, email_tentor, agama_tentor, tl_tentor, gaji_tentor, foto_tentor) VALUES('$nama_tentor', '$hp_tentor', '$alamat_tentor', '$email_tentor', '$agama_tentor', '$tl_tentor', '$gaji_tentor', '$foto_tentor')") or die(mysql_error());
			
			$daftar	= mysql_query("SELECT * FROM tb_tentor where nama_tentor = '$nama_tentor' and hp_tentor = '$hp_tentor'") or die (mysql_error());
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
						<h2 style="color:#FF0004;">Registrasi Tentor Sukses</h2>
						<div style="text-align:left">
						<table align="center">
							<tr>
								<td colspan="3"><font color="red">Harap catat informasi berikut!</font></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
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
                        </div>
						<br />
                        <center>
						<a href="tentor_edit.php?id_tentor=<?php echo $dataku->id_tentor?>"><input type="button" value="Edit" /></a>
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