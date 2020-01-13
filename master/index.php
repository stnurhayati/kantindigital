<?php  
        session_start(); 
        include 'koneksi.php'; 
  if (isset($_POST['login'])) { 
      $pass = md5($_POST['password']); 
      $sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE username = '$_POST[username]' && password = '$pass'"); 
      $cek = mysqli_num_rows($sql); 
      $f = mysqli_fetch_array($sql); 
      $_SESSION['nama'] = $f['nama_pengguna']; 
  if($cek > 0){ 
  if($f['level'] == "Manager"){ 
    echo "<script>alert('Selamat Datang'); document.location.href='manager.php';</script>"; 
   }else if($f['level'] == "Admin"){ 
    echo "<script>alert('Selamat Datang'); document.location.href='admin.php';</script>"; 
   }else if($f['level'] == "Kasir"){ 
    echo "<script>alert('Selamat Datang'); document.location.href='kasir.php';</script>"; 
   }else{ 
    echo "<script>alert('Gagal Login'); document.location.href='index.php';</script>"; 
   } 
  }else{ 
   echo "<script>alert('Gagal Login'); document.location.href='index.php';</script>"; 
  } 
 } 
 ?> 
 <!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Aplikasi Kasir</title>
    <link rel="stylesheet" href="style-1.css"> <!-- pemanggilan file css untuk style pada file index-1.html -->
    <link rel="icon" href="rest.jpeg">
    <meta name="viewport" content="width=device-width , initial-scale=1">

  </head>
  <body>

  </body>
</html>
 <head>
  <center>
 <div></div>.
<link rel="stylesheet" type="text/css" href="style.css">
<div class="login-form-container" id="login-form">
    <div class="login-form-content">
        <div class="login-form-header">
            <div class="logo" align="center">
                <img src="satu.jpg"/>
            </div>
            <center>
            <h3>Silahkan Login</h3>
</center>
        </div>
        <form method="post" action="" class="login-form">
            <div class="input-container">
                <i class="fa fa-envelope"></i>
                <input type="username" class="input" name="username" placeholder="Usernama atau Email"/>
            </div>
            <div class="input-container">
                <i class="fa fa-lock"></i>
                <input type="password"  id="login-password" class="input" name="password" placeholder="Password"/>
                <i id="show-password" class="fa fa-eye"></i>
            </div>
            <div class="rememberme-container">
                <input type="checkbox" name="rememberme" id="rememberme"/>
                <label for="rememberme" class="rememberme"><span>Biarkan tetap masuk</span></label>
                <a class="forgot-password" href="#">Lupa Password?</a>
            </div>
            <input type="submit" name="login" value="Login" class="button"/>
            
        </div>
    </div>
</div>
</center>

 

