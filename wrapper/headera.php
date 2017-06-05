<!DOCTYPE html>
<html>
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <link rel="stylesheet" type="text/css" href="../dist/semantic.min.css">

    <style type="text/css">
      .ui.inverted.menu {
        height: 10%;
      }
      .ui.menu {
        margin: 3em 0em;
      }
      .ui.menu:last-child {
        margin-bottom: 110px;
      } 
      .ui.menu .ui.dropdown.item .menu .item:not(.filtered){
        color: black;
      }     
      .ui.floating.label {
        top: 1.8em;
      }
      .ui.menu .item>.floating.label {
        padding: .3em .6em;
      }
      @media only screen and (max-width: 700px) {
        .ui.inverted.menu {
          display: !important;
        }
        .secondary.pointing.menu .item,
        .secondary.pointing.menu .menu {
          display: none;
        }
        .secondary.pointing.menu .toc.item {
          display: block;
        }
        .masthead.segment {
          min-height: 350px;
        }
        .masthead h1.ui.header {
          font-size: 2em;
          margin-top: 1.5em;
        }
        .masthead h2 {
          margin-top: 0.5em;
          font-size: 1.5em;
        }
      }
    </style>

    <script src="../assets/show-examples.js"></script>
  <script src="../assets/library/jquery.min.js"></script>
  <script src="../dist/components/visibility.js"></script>
  <script src="../dist/components/sidebar.js"></script>
  <script src="../dist/components/transition.js"></script>
  <script src="../dist/components/search.js"></script>
  <script src="../dist/components/dimmer.js"></script>
  <script src="../dist/components/tab.js"></script>
  <script src="../dist/components/search.min.js"></script>
  <script src="../assets/library/iframe-content.js"></script>
  <script src="../dist/components/dropdown.js"></script>
  <script src="../dist/components/dimmer.js"></script>
    <script>
    $(document)
      .ready(function() {
        $('.ui.dropdown.item').dropdown({
          on: 'hover'
        });
        $('.ui.menu span.text a.item')
          .on('click', function() {
            $(this)
              .addClass('active')
              .siblings()
              .removeClass('active')
            ;
          })
        ;

        // create sidebar and attach to menu open
        $('.ui.sidebar')
          .sidebar('attach events', '.toc.item')
        ;
      })
    ;
    </script>
    <script type="text/javascript">
      function unduh(){
       $('#Unduh')
       .modal('show');}
    </script>
  </head>
<body>
  
  <!-- Header Fix -->
  <div class="ui fixed inverted menu">
    <div class="item" style="margin-left:60px">
      <img src="../assets/images/logo.png">
    </div>
    <!-- Left -->
    <a href="../index.php" class="item"> Beranda </a>
    <div class="ui dropdown item">
      <div class="text"> Modul </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <div class="item">
          <i class="dropdown icon"></i>
          <span class="text"> Sikepok</span>
          <div class="menu">
            <a href="../modul/Sikepok/link/ensiklopedia.php"><div class="item">Ensiklopedia</div></a>
            <a href="../modul/Sikepok/link/infors.php"><div class="item">Sistem Informasi Instansi Kesehatan</div></a>
          </div>
        </div>
        <a href="../modul/Kadepok/link/"><div class="item"> Kadepok </div>
        <a href="../modul/Lapok/link/"><div class="item"> Lapok </div></a>
        <a href="../modul/Kapok/link/"><div class="item"> Kapok </div>
        <a href="../modul/Ucok/link/"><div class="item"> Ucok </div></a>
        <a href="../modul/Fokopok/link/"><div class="item"> Fokopok </div></a>
      </div>
    </div>
    </a>
    <a class="item" onclick="unduh()"> Unduh Aplikasi </a>

    <!-- Right -->
    <div class="right menu" style="margin-right:60px">
      <a class="ui dropdown item">
        Temukan
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item"> Sejarah Depok </div>
          <div class="item">
            <i class="dropdown icon"></i>
            <span class="text"> Instansi Kesehatan </span>
            <div class="menu">
              <div class="item">Ambulan</div>
              <div class="item">Apotik</div>
              <div class="item">Bidan</div>
              <div class="item">Khitan</div>
              <div class="item">Klinik</div>
              <div class="item">Puskesmas</div>
              <div class="item">Rumah Sakit</div>
              <div class="item">Tukang Pijat</div>
            </div>
          </div>
          <div class="item"> Panti Asuhan </div>
          <div class="item"> UKM </div>
          <div class="item"> Artikel Depok </div>
          <div class="item"> Tempat Nongkrong </div>
          <div class="item"> Tempat Wisata </div>
          <div class="item"> Tempat Kongkow </div>
          <div class="item"> Pasar </div>
          <div class="item"> Mall </div>
          <div class="item"> Tempat Ibadah </div>
          <div class="item"> Universitas </div>
          <div class="item"> Wisata Kuliner </div>
          <div class="item"> Hotel </div>
          <div class="item"> Tempat Olahraga/Gor </div>
        </div>
      </a>
      <a class="ui dropdown item">
        <img class="ui avatar image" src="../assets/images/avatar/nan.jpg" style="margin-right:15px">
        Username
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item"> Profil </div>
          <div class="item"> Keluar </div>
        </div>
      </a>
      <a class="item">
        <i class="icon alarm"></i>
        <div class="floating ui red label">4</div>
      </a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <div class="ui sidebar fixed inverted menu">
    <a class="item">Beranda</a>
    <a class="item">Modul</a>
    <a class="item">Unduh Aplikasi</a>
    <a class="item">Masuk</a>
  </div>

  
<div class="ui modal" id="Unduh">
    <i class="close icon"></i>
    <div class="header">
      Unduh Aplikasi
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="../../../assets/images/scan.jpg">
      </div>
      <div class="description">
        <div class="ui header">UNDUH PADA SMARTPHONE ANDROID ANDA</div>
        <p> Hi-Depok merupakan wujud peningkatan pelayanan pemerintah Kota Depok kepada warganya. Aplikasi ini dapat membantu warga Kota Depok dalam berbagai aspek pelayanan seperti pelayanan kesehatan, keamanan, sosial dan juga kebutuhan akan informasi. </p>
      </div>
    </div>
    <div class="actions">
      <div class="ui positive icon button">
        Batal
      </div>
    </div>
  </div>
  

</body>
</html>