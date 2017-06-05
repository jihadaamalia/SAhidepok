<!-- Modal -->
<div class="ui modal" id="lihat_detail">
      <div class="header">
         <h2 class="ui header">
          <i class="settings icon"></i>
          <div class="content">
            Lihat Detail
            <div class="sub header">Data Dokter</div>
          </div>
        </h2>
      </div>
      <div class="image content">
        <div class="ui medium image">
          <img src="../assets/images/avatar/tom.jpg"><br>
        </div>
        <div class="description">
    
    
    <div class="content">
          
          <div class="description">
        <table class="ui basic table selectable">
  
  <tbody>
    <tr style="padding: 20px">
      <td>Nama </td>
      <td> : </td>
      <td>{{selectUser.nama_dokter}}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td> : </td>
      <td>{{selectUser.alamat_dokter}}</td>
    </tr>
    <tr>
      <td>No Telp</td>
      <td> : </td>
      <td>{{selectUser.no_telp_dokter}}</td>
    </tr>
   <tr>
      <td>Spesialisasi </td>
      <td> : </td>
      <td>{{selectUser.spesialisasi}}</td>
    </tr>
   <tr>
      <td> Email</td>
      <td> : </td>
    <td>{{selectUser.email_dokter}}</td>
    </tr>
    <tr>
      <td> Deskripsi</td>
      <td> : </td>
    <td>{{selectUser.deskripsi_dokter}}</td>
    </tr>
   
  </tbody>
</table>

          </div><br>
          <div class="extra">    
            <a href="update_daftar_dokter.php"><div class="ui right floated primary green button"><i class="left write icon"></i>
              Ubah
            </div></a>
          </div>
        </div>
  </div>
</div>
</div>