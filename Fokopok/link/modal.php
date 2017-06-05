		<div class="ui modal" id="SI1">
      <i class="close icon"></i>
      <table class="ui single line celled striped table">
    <thead>
      <tr>
        <th colspan="2">
          <h3> Detail Komunitas</h3>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="content">
            Nama Komunitas
          </div>
        </td>
        <td>
          {{selectUser.nama_komunitas}}
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Alamat Komunitas
          </div>
        </td>
        <td>
          {{selectUser.alamat_komunitas}}
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nomor Telepon
          </div>
        </td>
        <td>
          {{selectUser.no_telp_partner}}
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Email
          </div>
        </td>
        <td>
          {{selectUser.email_komunitas}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Foto Komunitas</h4>
        </td>
      </tr>
      <tr>
        <td  colspan="2">
          <div class="content">
            <center><img src="../../../assets/images/photos/fokopok/{{selectUser.foto_komunitas}}" alt="" class="small img-responsive"/></center>
          </div>
        </td>
      </tr>  
    </tbody>
  </thead>
</table>
</div>