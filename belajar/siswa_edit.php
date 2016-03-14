<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		if (!ISSET($_GET['id_siswa']))
		header('location:siswa_list.php');
		else
		{
			include "koneksi.php";
			$id_siswa	= $_GET['id_siswa'];
			$qryedit	= mysql_query ("select * from tb_siswa where id_siswa = '$id_siswa'");
			$dataku		= mysql_fetch_object($qryedit);
			$qryedit2	= mysql_query ("select * from tb_kelas where id_kelas = '$dataku->id_kelas'");
			$datamu		= mysql_fetch_object($qryedit2);
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
                    <div class="col-md-2">
                    </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
						<form action="siswa_update_foto.php?id_siswa=<?php echo $dataku->id_siswa ?>" method="post" enctype="multipart/form-data">
							<img src="<?php echo $dataku->foto_siswa ?>" alt="<?php echo $dataku->nama_siswa?>" width="170" height="200" />
							<br />
							<input type="file" name="foto_siswa" required />
							<input type="submit" value="Ganti Foto" name="edit_foto_siswa" />
						</form>
						<br />
						<br />
						<br />
						<form action="siswa_update.php" method="post">
                        	<input type="text" name="id_siswa" value="<?php echo $dataku->id_siswa; ?>" required readonly />
                            <input type="text" name="nama_siswa" value="<?php echo $dataku->nama_siswa; ?>" required /></td>
                            <input type="number" name="hp_siswa" value="<?php echo $dataku->hp_siswa; ?>" required min="0" maxlength="12" /></td>
                            <textarea name="alamat_siswa" required><?php echo $dataku->alamat_siswa; ?></textarea></td>
                            <select name="jenjang_kelas" required class="abc" />
											<option value="<?php echo $datamu->jenjang_kelas; ?>"><?php echo $datamu->jenjang_kelas; ?></option>
											<option></option>
											<option value="SD">SD</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
										</select>
										<input type="text" name="sekolah_siswa" value="<?php echo $dataku->sekolah_siswa ?>" required class="abd" />
                            <select name="kelas_siswa" required />
											<option value="<?php echo $datamu->tingkat_kelas; ?>"><?php echo $datamu->tingkat_kelas; ?></option>
											<option></option>
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
											<option value="<?php echo $datamu->jurusan_kelas; ?>"><?php echo $datamu->jurusan_kelas; ?></option>
											<option></option>
											<option value="IPA">IPA</option>
											<option value="IPS">IPS</option>
										</select>
                                        <select name="paket_siswa" required />
											<option value="<?php echo $datamu->paket_kelas; ?>"><?php echo $datamu->paket_kelas; ?></option>
											<option></option>
											<option value="Intensif SBMPTN">Intensif SBMPTN</option>
											<option value="Intensif UN">Intensif UN</option>
											<option value="Gold">Gold</option>
											<option value="Silver">Silver</option>
											<option value="Reguler">Reguler</option>
										</select>
                                        <select name="jadwal_siswa" required />
											<option value="A"><?php echo $datamu->hari_kelas." ".$datamu->jam_kelas; ?></option>
											<option></option>
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
											<option value="<?php echo $dataku->id_kelas; ?>"><?php echo $dataku->id_kelas; ?></option>
											<option></option>
											<?php
												$myquery3	= "SELECT * FROM tb_kelas";
												$daftar3	= mysql_query($myquery3) or die (mysql_error());
												while($datadia = mysql_fetch_object($daftar3))
												{
													?>
														<option value="<?php echo $datadia->id_kelas; ?>"><?php echo $datadia->id_kelas; ?></option>
													<?php
												}
											?>
										</select>
                                        <select name="peringkat_siswa">
                                        <option value="<?php echo $dataku->peringkat_siswa; ?>"><?php echo $dataku->peringkat_siswa; ?></option>
											<option></option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
                                        <select name="anak_siswa">
                                        <option value="<?php echo $dataku->anak_siswa; ?>"><?php echo $dataku->anak_siswa; ?></option>
											<option></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" value="Perbarui" name="edit_siswa" />
										<input type="reset" />
										<a href="siswa_list.php"><input type="button" value="Kembali" /></a>
									</td>
								</tr>
							</table>
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