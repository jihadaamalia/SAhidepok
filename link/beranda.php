<!DOCTYPE html>
<?php
session_start();
echo '<script language="javascript"> alert($cek) </script>';
if(!isset($_SESSION['superadmin'])){
  echo "<script>
  window.location='index.php';
  </script>";}

?>
<!-- Site Properties -->
<html>
  <head>
    <title>Hi-Depok Super Admin</title>
        <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!--icon-->
    <link rel="shortcut icon" href="../assets/images/logo.png">
    
    <!--CSS-->
  <link rel="stylesheet" type="text/css" href="../dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/site.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/search.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/search.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/accordion.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/accordion.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/card.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/menu.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/tab.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/tab.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/label.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/transition.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/reveal.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/sidebar.css">

    <style type="text/css">
      #one-page{
        padding-top: 120px;
      }
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
      .ui.footer.stuckend{
        position: absolute;
        bottom: 0;
        width: 100%;
      }
      #one-page{
        padding-top: 120px;
        padding-bottom: 120px
      }
    </style>

  <!--javascript-->
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
    <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      //dropdown
      $('.ui.fluid.search.selection.dropdown ').dropdown({
        on: 'hover'
      });
      $('.ui.menu a.item')
        .on('click', function() {
          $(this)
            .addClass('activ')
            .siblings()
            .removeClass('activ')
          ;
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;
  </script>
  <script>

  <!----- JQUERY FOR SLIDING NAVIGATION --->
  $(document).ready(function() {
    $('a[href*=#]').each(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
      && location.hostname == this.hostname
      && this.hash.replace(/#/,'') ) {
        var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
        var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
         if ($target) {
  </script>
  </head>
<body>
  
  <!-- Header Fix -->
  <div class="ui fixed inverted menu">
    <div class="item" style="margin-left:60px">
      <img src="../assets/images/logo.png">
    </div>
    <!-- Left -->
    <a href="beranda.php" class="item"> Beranda </a>
    <div class="ui dropdown item">
      <div class="text"> Sikepok </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a href="../Sikepok/link/index.php"><div class="item"> Usaha Kesehatan </div></a>
        <a href="../Sikepok_rs/link/index.php"><div class="item"> Rumah Sakit </div></a>
      </div>
    </div>
    <a href="../Kadepok/link/lihat_data.php" class="item"> Kadepok </a>
    <a href="../Lapok/link/index.php" class="item"> Lapok </a>
    <a href="../Kapok/link/kelola_data.php" class="item"> Kapok </a>
    <a href="../Ucok/link/index.php" class="item"> Ucok </a>
    <a href="../Fokopok/link/index.php" class="item"> Fokopok </a>
   
    <!-- <div class="ui dropdown item">
    <div class="text"> Log </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a href="../index.php" class="item"> User </a>
        <a href="../index.php" class="item"> Partner </a>
      </div>
      </div> -->
    
    <!-- Right -->
    <div class="right menu" style="margin-right:60px">
      <div class="ui dropdown item">
        <img class="ui avatar image" src="../assets/images/avatar/nan.jpg" style="margin-right:15px">
        <div class="text"> <?php echo $_SESSION['superadmin'] ?></div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="../link/db_logout.php" class="item"> Keluar </a>
        </div>
        </div>
      </div>
    </div>

  <!-- Sidebar Menu -->
  <div class="ui sidebar fixed inverted menu">
    <a class="item">Beranda</a>
    <a class="item">Modul</a>
    <a class="item">Keluar</a>
  </div>

<!--MAIN CONTENT-->
<div id="one-page" class="ui six column stackable center aligned page grid">
    <center><h1 class="ui header">Selamat Datang, Super Admin <?php echo $_SESSION['superadmin'] ?></h1>
    <h3 class="ui header" style="padding-bottom:20px">Silahkan menuju halaman modul untuk melakukan perubahan data</h3></center>
      <!-- Modul -->
      <div class="ui three columns stackable raised center aligned page grid">
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/sikepok.png">
            </div>
            <div class="content">
              <a  href="../Sikepok/link/index.php" class="header">Sikepok</a>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/kadepok.png">
            </div>
            <div class="content">
              <a  href="../Kadepok/link/lihat_data.php" class="header">Kadepok</a>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/kapok.png">
            </div>
            <div class="content">
              <a href="../Kapok/link/kelola_data.php" class="header">Kapok</a>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/lapok.png">
            </div>
            <div class="content">
              <a href="../Lapok/link/index.php" class="header">Lapok</a>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/ucok.png">
            </div>
            <div class="content">
              <a href="../Ucok/link/index.php" class="header">Ucok</a>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="ui fluid card">
            <div class="image">
              <img src="../assets/images/modul/fokopok.png">
            </div>
            <div class="content">
              <a href="../Fokopok/link/index.php" class="header">Fokopok</a>
            </div>
          </div>
        </div>
        </div> 
</div>




<!-- FOOTER -->
<div class="ui inverted vertical footer segment stuckend">
  <div class="ui center aligned container" >
    <p> Hak cipta © 2016 oleh TiregDev </p>
  </div>
</div>
</body>
<footer>
</footer>
</html>