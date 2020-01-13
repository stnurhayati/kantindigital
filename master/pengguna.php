<?php  
 if(isset($_POST['simpan'])){ 
  $pas = md5($_POST['password']); 
  $sql = mysqli_query($con, "INSERT INTO tb_pengguna  
   VALUES('','$_POST[nama]','$_POST[jabatan]', 
   '$_POST[username]', '$pas')"); 
  if ($sql) { 
   echo "<script>alert('Data berhasil disimpan'); 
   document.location.href='?menu=pengguna';</script>"; 
  }else{ 
   echo "<script>alert('Data Gagal disimpan'); 
   document.location.href='?menu=pengguna';</script>"; 
  } 
 } 
  
 if (isset($_GET['hapus'])) { 
  $sql = mysqli_query($con, "DELETE FROM tb_pengguna WHERE 
   id_pengguna = '$_GET[id]'"); 
  if ($sql) { 
   echo "<script>alert('Data berhasil dihapus'); 
   document.location.href='?menu=pengguna';</script>"; 
  }else{ 
   echo "<script>alert('Data Gagal dihapus'); 
   document.location.href='?menu=pengguna';</script>"; 
  } 
 }
  ?> 
<html> 
 <head> 
   <title></title> 
    </head> 
     <form method="post">  
      <body>  
        <table>  
           <tr>    
             <td>Nama Pengguna</td>      
             <td>:</td>      
             <td><input type="text" name="nama"></td>     
           </tr>     <tr>      
             <td>Jabatan</td>      
             <td>:</td>      
             <td> <select name="jabatan">
            <option value="" disabled selected> -- Pilih Jabatan -- </option> 
            <option value="Admin">Admin</option>              
            <option value="Kasir">Kasir</option>       
          </select>      
        </td>   
            </tr>     <tr>      
              <td>Username</td>      
              <td>:</td>      
              <td><input type="text" name="username"></td>     
            </tr>     <tr>      
              <td>Password</td>     
               <td>:</td>      
               <td><input type="text" name="password"></td>     
             </tr>     <tr>     
              <td><input type="submit" name="simpan" value="SIMPAN"></td>     
            </tr>   
             </table>   
              <table border="1">     
                <tr>     
                 <td>No.</td>      
                 <td>Nama Pengguna</td>      
                 <td>Jabatan</td>      
                 <td>Username</td>      
                 <td>Password</td> 
                 <td colspan="2">Aksi</td> 
    </tr> 
    <?php  
    $no=0; 
    $sql= mysqli_query($con, "SELECT * FROM tb_pengguna"); 
    while($r=mysqli_fetch_array($sql)){  
     $no++; ?> 
    <tr> 
     <td><?php echo $no; ?></td> 
     <td><?php echo $r['nama_pengguna']; ?></td> 
     <td><?php echo $r['level']; ?></td> 
     <td><?php echo $r['username']; ?></td> 
     <td><?php echo $r['password']; ?></td> 
     <td><a href="?menu=pengguna&hapus&id=<?php echo 
      $r['id_pengguna'] ?>" onClick="return confirm('Anda Yakin')">Hapus</a></td> 
    </tr> 
    <?php } ?> 
   </table> 
  </body> 
 </form> 
</html>