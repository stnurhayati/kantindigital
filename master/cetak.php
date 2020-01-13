<?php
		session_start();
		include 'koneksi.php';

?>
<body onload="window.print()">
	<center>
		<h1>Aplikasi Kasir</h1>
		<h3>Laporan Penjualan</h3>
<table border="1">
			<tr>
				<td>NO</td>
				<td>ID Menu</td>
				<td>ID Transaksi</td>
				<td>Nama Menu</td>
				<td>Jumlah</td>
				<td>Tanggal Pesan</td>
			</tr>
	<?php
			$no=0;
$sql = mysqli_query($con, "SELECT * FROM qw_laporan WHERE tanggal_pesan BETWEEN '$_SESSION[awal]' AND '$_SESSION[akhir]' AND stasus='1'");
	while($r=mysqli_fetch_array($sql)) {
				$no++;
		?>
	
      <tr>
      	<td><?php echo $no; ?></td>
        <td><?php echo $r['id_menu']; ?></td>
        <td><?php echo $r['id_transaksi']; ?></td>
        <td><?php echo $r['nama_menu']; ?></td>
        <td><?php echo $r['jumlah']; ?></td>
        <td><?php echo $r['tanggal_pesan']; ?></td>
		<td><?php echo $r['stasus']; ?></td>
      </tr>
      <?php }?>
     </table>
	</center>
</body>