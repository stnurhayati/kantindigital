<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Kasir</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" href="rest.jpeg">
</head>
<center>
<form method="post">
<body>  

    <h1><?php session_start();
       include 'koneksi.php';
        echo " Selamat Datang "
		  .$_SESSION['nama'];?></h1>
 <ul>
 <center>
    <table border="1">
    <tr>
 	<td><a href="?menu=pesanan">Pesanan</a></td>
 	<td><a href="?menu=pembayaran">Pembayaran</a></td>
	 <td><a href="index.php">Logout</a></td>
</tr>
</table>
</center>
 </ul>

 <?php 
 switch (@$_GET['menu']) {
  	case 'pesanan':
  		include'pesanan.php';
  		break;
  	case 'pembayaran':
  		include'pembayaran.php';
  		break;
  	default:
  		include'pesanan.php';
  		break;
  } ?>
</body>
</form>
</center>
</html>