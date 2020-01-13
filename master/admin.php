<?php  
 session_start(); 
 include 'koneksi.php'; 
 ?> 
<html> 
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="rest.jpeg">
  <center>
    <head>
  <title>Aplikasi Kasir</title> 
 </head> 
 <form method="post" enctype="multipart/form-data"> 
  <body> 
   <h1><?php echo "Selamat Datang ".$_SESSION['nama']; ?></h1> 
   <ul> 
    <center>
    <table border="1">
    <tr>
   <td><a href="?menu=pengguna">Kelola Pengguna</a></td>
    <td><a href="?menu=menu">Kelola Menu</a></td>
    <td><a href="?menu=laporan">Laporan</a></td>
    <td><a href="index.php">Logout</a></td>
    </tr>
  </table>
</center>
   </ul> 
   <?php  
    switch (@$_GET['menu']) { 
     case 'pengguna': 
      include 'pengguna.php'; 
      break; 
     case 'menu': 
      include 'menu.php'; 
      break; 
     case 'laporan': 
      include 'laporan.php'; 
      break; 
     default: 
      include 'pengguna.php'; 
      break; 
      } 
    ?> 
  </body> 
 </form> 
</center>
</html> 

