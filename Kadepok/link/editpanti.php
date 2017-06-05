<html ng-app="postApp" ng-controller="postController">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kadepok</title>
	 <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
  <link rel="shortcut icon" href="../../assets/images/logo.png">
    
	    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
            $scope.inform = data;
          });  
        }
		
		function displayDataTelp (){  
          $http.get("db/form_updateShowTelp.php").success(function(data){
            $scope.inform2 = data;
            console.log(data);
          });  
        }
		
			function displayDataRek (){  
          $http.get("db/form_updateShowRek.php").success(function(data){
            $scope.inform3 = data;
            console.log(data);
          });  
        }
		
	
        $scope.UpdateForm = function(ts, telp1,telp2,telp3,rek1,rek2,rek3){
        $http.post('db/query_updateAct.php',{'id':ts.id_panti,'nama':ts.nama_panti,'alamat':ts.alamat_panti,'kecamatan':ts.kecamatan_panti,'koordinat':ts.koordinat_panti, 'email':ts.email_panti, 'deskripsi':ts.deskripsi_panti, 'telp':telp1, 'telp1':telp2,'telp2':telp3,'rek':rek1,'rek1':rek2,'rek2':rek3}).success(function(data){
            alert("Data berhasil diubah");
			 console.log(data);
            window.location.href = 'panti.php';
          });
        }
		displayDataTelp();
		displayDataRek();
        displayData();
    });

</script>
	
	
	<script>
    $(document)
    .ready(function() {
      // lazy load images
      $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 500
      });
      $('.image').dimmer({
        on: 'hover'
      });
    })
    ;
  
  </script>
  <?php
   require_once '../../../include/config.php'; 
    include "../../wrapper/header.php";
    session_start();
    $id=$_SESSION["id"];
    ?>
  
    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body ng-init="displayData()" >

  <div id="one-page" class="ui text container">

    <!--Menu-->
    <div class="ui two item stackable tabs menu centered">
      <a href="lihat_data.php" class="item" data-tab="definition">Kelola Pengajuan Panti Asuhan</a>
      <a href="#" class="active item" data-tab="definition">Kelola Data Panti</a>
    </div>

    <!--Isi-->
    <button class="ui right labeled icon orange button" style="margin-top:40px" onclick="window.location='panti.php'"> Kembali
    <i class="left arrow icon"></i>
    </button>
    <br><br>
	
    <form class="ui form"  style="text-align: justify;">
      <div class="ui segments">
        <div class="ui segment">
          <h4 class="ui dividing header">Data Umum Panti Asuhan</h4>
		  
<div class="field">
    <label>ID</label>
    <input type="text" name="Id" ng-model="inform[0].id_panti" disabled>
 </div>
 
		   <div class="field">
          <label> Nama Panti Asuhan</label>
              <input type="text" name="namapanti" ng-model="inform[0].nama_panti">
            </div>
			
            <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" ng-model="inform[0].alamat_panti">
    </div>
    <div class="two fields">
      <div class="field">
        <input type="text" name="Kecamatan" ng-model="inform[0].kecamatan_panti" >
      </div>
      <div class="field">
        <input type="text" name="Koordinat" ng-model="inform[0].koordinat_panti" >
      </div>
    </div>
  </div>
            <label>Nomor Telepon</label>
            <div class="three fields">
              <div class="field">
                <input type="text" name="telp1" ng-model="inform2[0].telpon_panti">
              </div>
              <div class="field">
                <input type="text" name="telp2" ng-model="inform2[1].telpon_panti">
              </div>
              <div class="field">
                <input type="text" name="telp3" ng-model="inform2[2].telpon_panti">
              </div>
            </div>
			
<div class="field">
    <label>Email</label>
    <input type="text" name="Nama_Usaha" ng-model="inform[0].email_panti">
  </div>
          
            <label>Rekening</label>
            <div class="three fields">
              <div class="field">
                <input type="text" name="rek1" ng-model="inform3[0].rekening_panti" >
              </div>
              <div class="field">
                <input type="text" name="rek2" ng-model="inform3[1].rekening_panti" >
              </div>
              <div class="field">
                <input type="text" name="rek3" ng-model="inform3[2].rekening_panti" >
              </div>
       
            </div>

            <h4 class="ui dividing header">Deskripsi Panti Asuhan</h4>
            <div class="field">
              <textarea ng-model="inform[0].deskripsi_panti">
              </textarea>
            </div>

       

<!--
            <h4 class="ui dividing header">Foto Panti</h4>
            <label>Tambah Foto</label>
            <div>
              <input type="file" id="hidde-new-file">
            </div><br>
            <div class="ui three column grid">
              <div class="column">
                <div class="blurring dimmable image">
                  <div class="ui dimmer">
                    <div class="content">
                      <div class="center">
                        <div class="ui two buttons">
                          <div class="ui inverted button">Ubah</div>
                          <div class="ui inverted button">Hapus</div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="ui centered medium image">
                    <img src="../assets/panti1.jpg">
                  </div>
                </div>
              </div>

              <div class="column">
                <div class="blurring dimmable image">
                  <div class="ui dimmer">
                    <div class="content">
                      <div class="center">
                        <div class="ui two buttons">
                          <div class="ui inverted button">Ubah</div>
                          <div class="ui inverted button">Hapus</div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="ui centered medium image">
                    <img src="../assets/panti1.jpg">
                  </div>
                </div>
              </div>

              <div class="column">
                <div class="blurring dimmable image">
                  <div class="ui dimmer">
                    <div class="content">
                      <div class="center">
                        <div class="ui two buttons">
                          <div class="ui inverted button">Ubah</div>
                          <div class="ui inverted button">Hapus</div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="ui centered medium image">
                    <img src="../assets/panti1.jpg">
                  </div>
                </div>
              </div>

              <div class="column">
                <div class="blurring dimmable image">
                  <div class="ui dimmer">
                    <div class="content">
                      <div class="center">
                        <div class="ui two buttons">
                          <div class="ui inverted button">Ubah</div>
                          <div class="ui inverted button">Hapus</div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="ui centered medium image">
                    <img src="../assets/panti1.jpg">
                  </div>
                </div>
              </div>

            <div class="column">
              <div class="blurring dimmable image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui two buttons">
                        <div class="ui inverted button">Ubah</div>
                        <div class="ui inverted button">Hapus</div>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="ui centered medium image">
                  <img src="../assets/panti1.jpg">
                </div>
              </div>
            </div>

            <div class="column">
              <div class="blurring dimmable image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui two buttons">
                        <div class="ui inverted button">Ubah</div>
                        <div class="ui inverted button">Hapus</div>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="ui centered medium image">
                  <img src="../assets/panti1.jpg">
                </div>
              </div>
            </div>

        </div>-->
		
		<br>
          </div>
          <div class="ui secondary segment">
            <button type="submit" ng-click="UpdateForm(inform[0], inform2[0].telpon_panti,inform2[1].telpon_panti,inform2[2].telpon_panti,inform3[0].rekening_panti,inform3[1].rekening_panti,inform3[2].rekening_panti)" class="ui green button">Submit</button><br><br>
          </div></div><br>
        </div>
        </form>
        


  </body>
  <footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
  </footer>
</html>