<?php
	session_start();
	if(ISSET($_SESSION['username']))
	{
		include "koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>
        	Bimbel K3 | Home
        </title>
    </head>
    <body>
        <center>
            <a href="index.php">Home</a>
            |
            <a href="siswa_form.php">Data Siswa</a>
            |
            <a href="tentor_form.php">Data Tentor</a>
            |
            <a href="kelas_form.php">Data Kelas</a>
            |
            <a href="logout.php">Logout</a>
            <br />
            <br />
            <object data="ext/aquan.swf" width="450" height="550">
            </object>
        </center>
	</body>
</html>
<?php 
	}
	else
	{
		header('location:login_form.php?pesan=login');
	}
?>