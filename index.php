<?php 
session_start();
if (isset($_POST['masuk'])) {
	$_SESSION['noMeja'] = $_POST['noMeja'];
	echo "<script>alert('Selamat Datang');document.location.href='pelanggan/';</script>";
}
 ?>
<!DOCTYPE html>
<html>
<center>
<head>
<meta charset="utf-8">
    <title>Aplikasi Kasir</title>

    <link rel="stylesheet" href="style.css"> <!-- pemanggilan file css untuk style pada file index-1.html -->
    <link rel="icon" href="rest.jpeg">
    <meta name="viewport" content="width=device-width , initial-scale=1">

</head>
<form method="post">
<body>
		
		<div class="logo" align="center">
		<img src="satu.jpg"/>
		<center>
			<h1>Selamat Datang</h1>
		<table>
		<tr>

			<td colspan="3">Masukan No Meja :</td>
		<td><input type="text" name="noMeja" required></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="Masuk" ></td>
</tr>
</table>
</center>
</body>
</form>
</center>
</html>