<html ng-app="postApp" ng-controller="postController">
<?php
session_start();
?>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Ubah Data Tempat</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="../../../dist/semantic.min.css">

    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script src="../../assets/library/jquery.min.js"></script>
    <script src="../../dist/jquery.min.js"></script>
    <script src="../../dist/semantic.min.js"></script>
    <script src="../../dist/components/visibility.js"></script>
    <script src="../../dist/components/transition.js"></script>
    <script src="../../dist/components/modal.js"></script>
    <script src="../../dist/components/dropdown.js"></script>
    <script src="../../dist/jquery.js"></script>
    <script src="../../dist/semantic.min.js"></script>

    <script>
    var postApp = angular.module('postApp', []);
    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
            $scope.names = data;
          });  

        }

        $scope.UpdateForm = function(tempat){
        $http.post('db/form_updateAct.php',{'id_tempat':tempat.id_tempat, 'id_partner':tempat.id_partner, 'nama_tempat':tempat.nama_tempat,'alamat_tempat':tempat.alamat_tempat,'kecamatan_tempat':tempat.kecamatan_tempat,'jam_operasi_tempat':tempat.jam_operasi_tempat,'no_telp_tempat':tempat.no_telp_tempat,'fasilitas_tempat':tempat.fasilitas_tempat,'menu_fav_tempat':tempat.menu_fav_tempat,'koordinat_tempat':tempat.koordinat_tempat,'nama_partner':tempat.nama_partner,'email_partner':tempat.email_partner,'identitas_partner':tempat.identitas_partner,'status_partner':tempat.status_partner,'note_tempat':tempat.note_tempat,'deskripsi_tempat':tempat.deskripsi_tempat }).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'detail_kelola.php';
          });
        }
        
      
    });
</script>

    <script >
    $(document)
    .ready(function() {
      $('.image').dimmer({
        on: 'hover'
      });
    })
  ;
  </script>
    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>


<div id="one-page"class="ui text container" ng-init="displayData()">

    <h1 class="ui header"><center>Ubah Data Tempat</center></h1>

    <button class="ui right labeled icon orange button" onclick="window.location='kelola_data.php'"> Kembali
    <i class="left arrow icon"></i>
    </button>

      <!--Data Pengajuan--> 

      <div class="ui message">
      <form class="ui form" ng-repeat="tempat in names">
        <div class="field">
          <label>Id Tempat</label>
          <input name="id_tempat" type="text" ng-model="tempat.id_tempat" disabled>
        </div>
        <div class="field">
          <label>Id Partner</label>
          <input name="id_partner" type="text" ng-model="tempat.id_partner" disabled>
        </div>
        <div class="field">
          <label>Nama Tempat</label>
          <input name="nama_tempat" type="text" ng-model="tempat.nama_tempat">
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea rows="3" type="text" name="alamat_tempat" ng-model="tempat.alamat_tempat" ></textarea>
        </div>
        <div class="two fields">

          <div class="field">
          <label>Kategori</label>
          <select class="ui fluid dropdown" ng-model="tempat.kategori_tempat" disabled>
              <option value="kuliner">Kuliner</option>
              <option value="wisata">Wisata</option>
              <option value="olahraga">Olahraga</option>
              <option value="pasar">Pasar</option>
              <option value="tempat ibadah">Tempat Ibadah</option>
              <option value="perguruan tinggi">Perguruan Tinggi</option>
              <option value="hotel">Hotel</option>
          </select>
        </div>

        <div class="field">
          <label>Kecamatan</label>
          <select class="ui fluid dropdown" ng-model="tempat.kecamatan_tempat">
              <option value="beji">Beji</option>
              <option value="cilodong">Cilodong</option>
              <option value="cimanggis">Cimanggis</option>
              <option value="cinere">Cinere</option>
              <option value="cipayung">Cipayung</option>
              <option value="limo">Limo</option>
              <option value="pancoran mas">Pancoran Mas</option>
              <option value="sawangan">Sawangan</option>
              <option value="tapos">Tapos</option>
              <option value="bojongsari">Bojongsari</option>
              <option value="sukmajaya">Sukmajaya</option>
          </select>
        </div>
        
        </div>
        <div class="field">
          <label>Jam Operasional</label>
          <input name="jam_operasi_tempat" type="text" ng-model="tempat.jam_operasi_tempat">
        </div>
        <div class="field">
          <label>No. Telp</label>
          <input name="no_telp_tempat" type="text" ng-model="tempat.no_telp_tempat">
        </div>
        <div class="field">
          <label>Fasilitas</label>
          <textarea rows="3" name="fasilitas_tempat" ng-model="tempat.fasilitas_tempat" ></textarea>
        </div>
        <div class="field">
          <label>Menu Favorit</label>
          <input name="menu_fav_tempat" type="text" ng-model="tempat.menu_fav_tempat">
        </div>
        <div class="field">
          <label>Koordinat</label>
          <input name="koordinat_tempat" type="text" ng-model="tempat.koordinat_tempat">
        </div>
<!--         <div class="field">
          <label>Edit Foto</label>
            <div class="ui five column grid">
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Ganti</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.png">
                </div>
            </div>
          </div>
        </div> -->
        <div class="field">
          <label>Username</label>
          <input name="username_partner" type="text" ng-model="tempat.username_partner">
        </div>

        <div class="field">
          <label>Password</label>
          <input name="password_partner" type="password" ng-model="tempat.password_partner">
        </div>

        <div class="field">
          <label>Nama Owner</label>
          <input name="nama_partner" type="text" ng-model="tempat.nama_partner">
        </div>
        <div class="field">
          <label>Email</label>
          <input name="email_partner" type="text" ng-model="tempat.email_partner">
        </div>
        <div class="field">
          <label>No KTP</label>
          <input name="identitas_partner" type="text" ng-model="tempat.identitas_partner">
        </div>
        <div class="field">
          <label>Tanggal Gabung</label>
          <input name="tanggal_gabung_partner" type="text" ng-model="tempat.tanggal_gabung_partner" disabled>
        </div>
         <div class="field">
          <label>Status</label>
          <select class="ui fluid dropdown" ng-model="tempat.status_partner">
              <option value="diterima">Diterima</option>
              <option value="nonaktif">Non Aktif</option>
          </select>
        </div>
        <div class="field">
          <label>Catatan</label>
          <textarea rows="3" name="note_tempat" ng-model="tempat.note_tempat" ></textarea>
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea rows="3" name="deskripsi_tempat" ng-model="tempat.deskripsi_tempat" ></textarea>
        </div>
        </div>
        <br>
      <br>
      <center><button class="ui positive button" ng-click="UpdateForm(tempat)"> Simpan </button></center>

      </form>
    </div>
      
</div>
  <br><br>
</body>

<footer>
    <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>