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
						<a href="siswa_form.php"><li><span class="filter">Daftar Baru</span></li></a>
						<a href="siswa_list.php"><li><span class="filter active">Lihat List Siswa</span></li></a>
					</ul>
				<div class="col-md-2 contact-left">
                </div>
				<div class="col-md-8 contact-left">
					<div class="contact-text">
                    <form method="post" action="siswa_cari.php">
                        <input type="text" class="abd" name="nama_siswa" placeholder="Cari Nama Siswa">
                        <input type="submit" value="Cari" name="cari_siswa">
                    </form>
                    </div>
                    </div>
				<div class="col-md-2 contact-left">
                </div>
				<div class="col-md-12 contact-left">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th style="text-align:center; vertical-align:middle">
                                    NO
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    ID SISWA
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    NAMA
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    HP / TELEPON
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    ALAMAT
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    SEKOLAH
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    KELAS
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    JURUSAN
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    KELAS BIMBEL
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    PAKET
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    BIAYA DAFTAR
                                </th>
                                <th style="text-align:center; vertical-align:middle">
                                    OPSI
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $daftar	= mysql_query("SELECT * FROM tb_siswa") or die (mysql_error());
								$I = 1;
                                while($dataku = mysql_fetch_object($daftar))
                                {
									?>
									<tr>
										<td align="center" style="vertical-align:middle"><?php echo $I++; ?></td>
										<td align="center" style="vertical-align:middle"><?php echo $dataku->id_siswa; ?></td>
										<td style="vertical-align:middle"><?php echo $dataku->nama_siswa; ?></td>
										<td style="vertical-align:middle"><?php echo $dataku->hp_siswa; ?></td>
										<td style="vertical-align:middle"><?php echo $dataku->alamat_siswa; ?></td>
										<?php
											$myquery2	= "SELECT * FROM tb_kelas where id_kelas = '$dataku->id_kelas'";
											$daftar2	= mysql_query($myquery2) or die (mysql_error());
											while($datamu = mysql_fetch_object($daftar2))
											{
												?>
												<td style="vertical-align:middle"><?php echo $datamu->jenjang_kelas." ".$dataku->sekolah_siswa; ?></td>
												<td style="vertical-align:middle" align="center"><?php echo $datamu->tingkat_kelas; ?></td>
												<td style="vertical-align:middle" align="center">
													<?php
														if (isset($datamu->jurusan_kelas))
														echo $datamu->jurusan_kelas;
														else
														echo "-";
													?>
												</td>
												<td style="vertical-align:middle" align="center">
													<a href="kelas_detail.php?id_kelas=<?php echo $dataku->id_kelas?>">
														<?php echo $dataku->id_kelas; ?>
													</a>
												</td>
												<td style="vertical-align:middle"><?php echo $datamu->paket_kelas; ?></td>
												<td style="vertical-align:middle"><?php echo "Rp. ".$dataku->harga_siswa; ?></td>
												<?php
											}
										?>
										<td align="center">
											<a href="siswa_detail.php?id_siswa=<?php echo $dataku->id_siswa?>"><i style="color:#0A00FF">Detail</i></a><br />
											<a href="siswa_edit.php?id_siswa=<?php echo $dataku->id_siswa?>"><i style="color:#0A00FF">Edit</i></a><br />
											<a href="siswa_hapus.php?id_siswa=<?php echo $dataku->id_siswa?>&foto_siswa=<?= $r[‘foto_siswa’];?>"><i style="color:#0A00FF">Hapus</i></a><br />
										</td>
									</tr>
									<?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10" align="center"><strong>Total Biaya Pendaftaran</strong></td>
                                <td colspan="2">
                                    <strong>

                                        <?php
                                            $jumlah	= mysql_query ("select sum(harga_siswa) 'total' from tb_siswa");
                                            $total	= mysql_fetch_object($jumlah);
                                            echo "Rp. ".$total->total;
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </tfoot>
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
	else
	{
		header('location:login_form.php?pesan=login');
		}
?>