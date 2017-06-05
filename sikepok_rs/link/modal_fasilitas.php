<!-- Modal -->
<div class="ui modal" id="lihat_detail">
      <div class="header">
         <h2 class="ui header">
          <i class="settings icon"></i>
          <div class="content">
            Lihat Detail
            <div class="sub header">Data Fasilitas</div>
          </div>
        </h2>
      </div>
      <div class="ui segment" >
      <center><h2 class="ui header">{{selectUser.nama_fasilitas}}</h2></center><br>
      <img class="ui centered small image" src="../assets/images/avatar/tom.jpg"><br><br>
  <p>{{selectUser.deskripsi_fasilitas}}</p>
          </div>
          <a href="update_fasilitas_rs.php"><div class="ui right floated primary button" style="margin: 10px" ><i class="left write icon"></i>
              Ubah
            </div></a>
        </div>
