<?php
		session_start();
		include'../koneksi.php';
		?>

		<html>
		<head>
			<center>
			<title>Aplikasi Kasir</title>
			<link rel="stylesheet" href="style.css"> <!-- pemanggilan file css untuk style pada file index-1.html -->

		</head>
		<form method="post">
		<body>
			<center>
 				<h1><?php echo"Selamat Datang Meja No ".$_SESSION['noMeja']; ?> </h1>
 			</center>
			 	<ul>
			 		<a href="?menu=pesan">Pesan</a>
			 		<a href="?menu=statuspesan">Status Pesanan</a>
			 	</ul>

		<?php
		switch (@$_GET['menu']) {
			case 'pesan':
				include 'pesan.php';
				break;
			case 'statuspesan':
				include 'statuspesan.php';
				break;

			default:
				include 'pesan.php';
				break;
		}
		?>
		</body>
	</form>
	</center>
		</html>