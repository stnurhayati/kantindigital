<?php 
		session_start();
      include 'koneksi.php';
 if (isset($_POST['proses'])) {
 	$sql = mysqli_query($con, "UPDATE tb_pesanan SET stat_pesanan = '1' WHERE no_meja = '$_GET[id]'");
 if($sql) {
 	echo "<script>alert('Pesanan Diproses');document.location.href='kasir.php'</script>";
 		}
 	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Detail Pesanan</title>
 </head>
 <form method ="post">
 <body>
 <center>
 	<h1><?php echo "Pesanan Meja No".$_GET['id']; ?></h1>
 	<table border="1"> 
 		<tr>
 			<td colspan="3"><h2>Detail Pesanan</h2></td>
 		</tr>
 		<tr>
 			<td>NO</td>
 			<td>Menu</td>
 			<td>Jumlah</td>
 		</tr>
 		<?php
 		$no=0;
 		$sql = mysqli_query($con, "SELECT * FROM qw_pesanan WHERE no_meja = '$_GET[id]'");
 		while ($r=mysqli_fetch_array($sql)) { 
 			$no++;
 			?>
 			<tr>
 				<td><?php echo $no;?></td>
 				<td><?php echo $r['nama_menu'];?></td>
 				<td><?php echo $r['jumlah'];?></td>
 			</tr>
 		<?php }?>
 		<tr>
 			<td colspan="3"><input type="submit" name="proses" value="Proses"></td>
 		</tr>
 		</table>
 </center>
 </body>
</form>
 </html>