<html>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Fokopok</title>

    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>
  <br>
  <br>
  <br>
  <br>

  <div id="one-page" class="ui text container">

   <!-- MENU -->	
  <div class="ui two item stackable tabs menu centered">
    <a href="lihat_data.php" class="item" data-tab="definition">Kelola Pengajuan</a>
    <a href="lihatdata.php" class="item" data-tab="definition">Data Komunitas</a>
  </div>

  
  <!-- TABEL -->	
  <div class="ui container">
    <h1 style="font-style:italic;padding-top:40px">Kelola Pengajuan</h1> 
    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th colspan="3">
            <h4> Belum Diproses </h4>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="collapsing">
            <center>29/03/2017</center>
          </td>
          <td>
            <h5>Astadeca</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button" onclick="window.location='form_daftar.php'"><i class="check square icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>31/03/2017</center>
          </td>
          <td>
            <h5>Sahabat PNJ</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button" onclick="window.location='form_daftar.php'"><i class="check square icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>31/03/2017</center>
          </td>
          <td>
            <h5>Computer Student Club</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button" onclick="window.location='form_daftar.php'"><i class="check square icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>02/04/2017</center>
          </td>
          <td>
            <h5>Pencinta Seni dan Kreativitas (Pankreas)</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button" onclick="window.location='form_daftar.php'"><i class="check square icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">  
            <div class="ui right floated pagination menu">
              <a class="icon item">
                <i class="left chevron icon"></i>
              </a>
              <a class="item">2</a>
              <a class="item">3</a>
              <a class="item">4</a>
              <a class="icon item">
                <i class="right chevron icon"></i>
              </a>
            </div>
          </th>
        </tr>
      </tfoot>
    </table>
    <table class="ui celled striped table">
      <thead>
        <tr>
          <th colspan="3">
            <h4> Diterima </h4>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="collapsing">
            <center>27/03/2017</center>
          </td>
          <td>
            <h5>Depok Photography</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>27/03/2017</center>
          </td>
          <td>
            <h5>Depok Kuliner</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>25/03/2017</center>
          </td>
          <td>
            <h5>Polythechnic English Club (PEC)</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
        <tr>
          <td class="collapsing">
            <center>24/03/2017</center>
          </td>
          <td>
            <h5>UKM Sepak Bola (Pesoet)</h5>
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="minus circle icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
      </tbody>
       <tfoot>
        <tr>
          <th colspan="4">  
            <div class="ui right floated pagination menu">
              <a class="icon item">
                <i class="left chevron icon"></i>
              </a>
              <a class="item">2</a>
              <a class="item">3</a>
              <a class="item">4</a>
              <a class="icon item">
                <i class="right chevron icon"></i>
              </a>
            </div>
          </th>
        </tr>
      </tfoot>
    </table>


    <table class="ui celled striped table">
      <thead>
        <tr>
          <th colspan="3">
            <h4> Ditolak </h4>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <h5>UKM Bola Basket (Pocket)</h5>
          </td>
          <td>
            Surat Notaris tidak Sah
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
        <tr>
          <td>
            <h5>UKM Gerakan Mahasiswa (GEMA)</h5>
          </td>
           <td>
            Surat tidak lengkap
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
        <tr>
          <td>
            <h5>UKM Koperrasi Mahas</h5>
          </td>
           <td>
            SKDP tidak sah
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" onclick="window.location='data_komunitas.php'"><i class="file text icon"></i></div>
            <div class="ui icon button"><i class="trash icon"></i></div>
          </td>
        </tr>
      </tbody>
       <tfoot>
        <tr>
          <th colspan="4">  
            <div class="ui right floated pagination menu">
              <a class="icon item">
                <i class="left chevron icon"></i>
              </a>
              <a class="item">2</a>
              <a class="item">3</a>
              <a class="item">4</a>
              <a class="icon item">
                <i class="right chevron icon"></i>
              </a>
            </div>
          </th>
        </tr>
      </tfoot>
    </table><br>
  </div>
</div>
    <?php
         include "../../wrapper/footer.php"
    ?>
</body>
<footer>
</footer>
</html>