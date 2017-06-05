 <?php  
 // Including database connections
require_once 'db/connect.php'; 
 
 $output = array();  
 $query = "SELECT ukm.id_ukm, barang.id_barang, nama_ukm, nama_owner_ukm, GROUP_CONCAT(nama_barang SEPARATOR ', ') AS daftar_barang, GROUP_CONCAT(harga_barang SEPARATOR  ', ') AS daftar_harga, GROUP_CONCAT(foto_barang SEPARATOR  ', ') AS daftar_foto_barang,  daftar_kategori, deskripsi_ukm, alamat_ukm, kecamatan, notelp, koordinat_ukm, daftar_foto_ukm FROM ukm LEFT JOIN barang ON ukm.id_ukm=barang.id_ukm LEFT JOIN (SELECT barang.id_ukm, GROUP_CONCAT(DISTINCT nama_kategori SEPARATOR ', ') AS daftar_kategori FROM barang LEFT JOIN kategori_ukm ON barang.id_kategori=kategori_ukm.id_kategori GROUP BY id_ukm) a ON ukm.id_ukm=a.id_ukm JOIN ukm_notlp ON ukm.id_ukm=ukm_notlp.id_ukm LEFT JOIN barang_foto ON barang.id_barang=barang_foto.id_barang LEFT JOIN (SELECT ukm.id_ukm, GROUP_CONCAT(foto_ukm SEPARATOR ', ') AS daftar_foto_ukm FROM ukm LEFT JOIN ukm_foto ON ukm.id_ukm=ukm_foto.id_ukm GROUP BY id_ukm) b ON ukm.id_ukm=b.id_ukm GROUP BY id_ukm";  
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  