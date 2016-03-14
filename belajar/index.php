<!DOCTYPE html>
<html>
<head>
<title>The Learn Center Flat Responsive Education Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>  
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
</head>
<body>
	<div class="banner" id="home">
		<div class="container">
			<div class="header">
				<div class="menu">
                                     <a class="toggleMenu" href="#"><img src="images/menu-icon.png" alt="" /> </a>
					<ul class="nav" id="nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="siswa_form.php">Siswa</a></li>
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
			<!--/start-text-slider-->
		<div  class="testimonials" id="testimonials">
			 <div class="wmuSlider example1">
		 	<div class="container-flueid">
			   <article style="position: absolute; width:64%; opacity: 0;"> 
					<div class=" cont span_2_of_3 client-main">
						<div class="logo">
							<a href="#"><img src="images/logo.png" alt=""></a>
						</div>
							<div class="slide-text">
									<p>Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat.</p>
						  	<span> </span>
						 	</div>
						 	<div class="clearfix"> </div>  
					</div>
				</article>
				 <article style="position: absolute; width:64%; opacity: 0;"> 
				   	<div class=" cont span_2_of_3  client-main">
				   		<div class="logo">
							<a href="#"><img src="images/logo.png" alt=""></a>
						</div>
							<div class="slide-text">
								<p>Suspendisse eget lobortis lacus, et elementum tortor. Praesent metus ligula, lacinia eu sodales sed,</p>
						  			<span> </span>
						 	</div>
						 	<div class="clearfix"> </div>  
					</div>
				 </article>
				 <article style="position: absolute; width:64%; opacity: 0;"> 
				   	<div class="cont span_2_of_3  client-main">
				   		<div class="logo">
							<a href="#"><img src="images/logo.png" alt=""></a>
						</div>
							<div class="slide-text">
									<p>Vitae pellentesque nec, pharetra a orci. Praesent nunc nunc, egestas eget elementum sed; rutrum!</p>
						  	<span> </span>
						 	</div>
						 	<div class="clearfix"> </div>  
					</div>
				 </article>
		 
                  <script src="js/jquery.wmuSlider.js"></script> 
					<script>
       				     $('.example1').wmuSlider();         
   					</script> 	           	      
	         </div>
	     </div>
	 </div>
	 <!--//text-slider-->
		</div>
	</div>
</body>
</html>