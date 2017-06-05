<!DOCTYPE html>
<html>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 

<head>
</head>
<div class="ui modal" id="brg">
  <i class="close icon"></i>
  <div class="ui header center aligned">
    Tambah Data Barang {{pilihUser.nama_ukm}}</center>
  </div>
  <form class="ui column form" style="text-align: justify; margin:30px;" >
  <div class="field">
  <label>ID UKM</label>
    <div class="field">
      <input type="text" name="id" ng-model="pilihUser.id_ukm" disabled>
    </div>
    </div>
  <div class="field">
    <label>Kategori</label>
    <select class="ui fluid dropdown" placeholder ="Jenis Usaha" name="Kategori" ng-model="Kategori" >
      <option value="1">Makanan</option>
      <option value="2">Mainuman</option>
      <option value="3">Pajangan</option>
      <option value="4">Pakaian</option>
      <option value="5">Jasa</option>
      <option value="6">Aksesoris</option>
      <option value="7">Lain-lain</option>
    </select>
  </div>
 <div class="field">
  <label>Barang yang Dijual</label>
  <div class="two fields">
    <div class="field">
      <input type="text" name="barang" placeholder="nama barang. contoh: Kue Lemper" ng-model="barang">
    </div>
    <div class="field">
      <input type="text" name="harga" placeholder="harga barang. contoh: 2500" ng-model="harga">
    </div>
  </div>
  </div>

<button type="submit" ng-click="submitForm1()" class="ui green button">Tambahkan</button>
  </form>
</div>

</body>
</html>