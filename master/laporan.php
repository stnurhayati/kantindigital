
<?php
if (isset($_POST['cetak'])) {
	echo "<script>document.location.href='cetak.php'</script>";
		}
	?>
<body>
	<table>
		<tr>
			<td>Dari</td>
			<td>:</td>
			<td><input type="date" name="awal"></td>
			<td>-</td>
			<td>Sampai</td>
			<td>:</td>
			<td><input type="date" name="akhir"></td>
			<td><input type="submit" name="cari" value="Cari"></td>
		</tr>
	</table>
	<table border="1">
		<tr>
			<td>no</td>
			<td>ID Transaksi</td>
			<td>Nama Menu</td>
			<td>Jumlah</td>
			<td>Tanggal Pesan</td>
		</tr>
		<?php
		 if (isset($_POST['cari'])) {
			$_SESSION['awal']=$_POST['awal'];
			$_SESSION['akhir']=$_POST['akhir'];

			

	$sql = mysqli_query($con, "SELECT * FROM qw_laporan WHERE tanggal_pesan BETWEEN '$_POST[awal]' AND '$_POST[akhir]' AND stasus='1'");
		while($r=mysqli_fetch_array($sql)) {
	$no++;			
		?>
			<tr>
				<td><?php echo $r['id_menu']; ?></td>
				<td><?php echo $r['id_transaksi']; ?></td>
				<td><?php echo $r['nama_menu']; ?></td>
				<td><?php echo $r['jumlah']; ?></td>
				<td><?php echo $r['tanggal_pesan']; ?></td>
			</tr>
	<?php } ?>
		<?php }else{?>

	<?php  }?> 
	</table>
	<br>
	<input type="submit" name="cetak" value="Cetak">
</body>
