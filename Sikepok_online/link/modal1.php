
<div class="ui modal" id="SI1">
  <i class="close icon"></i>
  <div class="ui header center aligned">Lihat Data {{selectUser.nama_jenis}}</div>
  <h2 class="ui header center aligned">{{selectUser.nama_tempat_sehat}}</h2>
    <div class="image content">
      <div class="ui medium image">
         <img ng-src="../../../assets/images/photos/sikepok/sikepok3/{{selectUser.foto_tempat_sehat}}" alt="" class="img-responsive">
      </div>

      <div class="description">
        <div class="ui content">
          <table class="ui very basic collapsing celled table">
            <tbody>
              <tr>
                <td><b>Alamat</b></td>
                <td>{{selectUser.alamat_tempat_sehat}}</td>
              </tr>
              <tr>
                <td><b>Kecamatan</b></td>
                <td>{{selectUser.kecamatan_tempat_sehat}}</td>
              </tr>
              <tr>
                <td><b>Telp</b></td>
                <td>
                  {{selectUser.no_telp_tempat_sehat}}</td>
              </tr>
              <tr>
                <td><b>Waktu Operasional</b></td>
                <td>{{selectUser.operasional_tempat_sehat}}</td>
              </tr>
              <tr>
                <td><b>Keterangan</b></td>
                <td>{{selectUser.keterangan_tempat_sehat}}</td>
              </tr>
              <tr>
                <td><b>Koordinat</b></td>
                <td><a><i class="marker icon" ></i>{{selectUser.koordinat_tempat_sehat}}</a></td>
              </tr>
            </tbody>
          </table>
        </div>           
      </div>
    </div>
  </div>
</div>

