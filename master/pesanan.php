<table border="1">
	
	<tr>
		<td colspan="3"><h2>Daftar Pesanan</h2></td>
	</tr>
	<center>
	<tr>
		
		<td>NO. Meja</td>
		<td>ID Transaksi</td>
		<td>Aksi</td>

	</tr>
	</center>
	<?php 
	$sql = mysqli_query($con, "SELECT * FROM tb_pesanan GROUP BY no_meja");
	while ($r=mysqli_fetch_array($sql))  { ?>

	 	<tr>
	 	<td><?php echo $r['no_meja']; ?></td>
	 	<td><?php echo $r['id_transaksi']; ?></td>
	 <?php
	 if ($r['stat_pesanan']=='0')  { ?>
<td><a href="detail.php?id=<?php echo $r['no_meja'] ?>">Lihat Detail</a></td>
<?php } else { ?>

	<td>Diproses</td>

<?php } ?>
</tr>

<?php } ?>

</table>