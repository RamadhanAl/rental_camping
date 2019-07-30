<?php

  session_start();

  include "../functions/koneksi.php";

  $sql_kategori = "select * from category where active = 1";
  $result_kategori = mysqli_query($link,$sql_kategori);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>POTONG.COMPAS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
  table.dataTable.row-border tbody tr:first-child th, table.dataTable.row-border tbody tr:first-child td, table.dataTable.display tbody tr:first-child th, table.dataTable.display tbody tr:first-child td {
    background: white;
    border-top: none;
  }

  table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
    background-color: white;
  }

  table.dataTable.display tbody tr.even>.sorting_1, table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
    background-color: white;
  }

  table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
    background: white;
    border-top: 1px solid #ddd;
  }
</style>
    <!--[if lt IE 9]>
	    <script src="../js/html5shiv.js"></script>
	    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href="../"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="../"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="../"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="../"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="../"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="../">
                    	<h1 style="    font-family: cursive;">POTONG.COMPAS</h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="../">Home</a></li>
                        <li class="dropdown"><a href="../alat-camping">Alat Camping <i></i></a>
                          <ul role="menu" class="sub-menu">

                              <?php foreach ($result_kategori as $data_kategori_key ) { ?>

                              <?php } ?>
                          </ul>
                        </li>
                        <?php if(isset($_SESSION['id_user'])){ ?>
                        <li><a href="../dashboard">Dashboard</a></li>
                        <li><a href="../pemesanan">Pemesanan</a></li>
                        <li><a href="../functions/logout.php">Log Out</a></li>
                        <?php }else{ ?>
                        <li><a href="../login">Login</a></li>
                        <li><a href="../register">Register</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Semua Alat Camping Berkualitas</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="map-section">
        <div class="container">
          <div class="col-sm-8">
            <div class="table" style="border:1px solid;padding:20px;border-color:#e0e0e0">
              <table id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                      <th style="width:120px">Alat Camping</th>
                      <th style="width:280px">Deskripsi</th>
                      <th>Harga</th>
                      <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($_GET['kat'])){
                    $sql_alat = "select * from alat_camping where active = 1 and id_category = ".$_GET['kat']."";
                  }else {
                    $sql_alat = "select * from alat_camping where active = 1";
                  }
                    $result_alat = mysqli_query($link,$sql_alat);

                    foreach ($result_alat as $data_alat_key ) {
                  ?>
                  <tr>
                      <td>
                        <img src="../images/alat/<?php echo $data_alat_key['gambar'] ?>" style="width:120px"> ;

                      </td>
                      <td>
                        <p><u><?php echo $data_alat_key['nama'] ?></u></p>
                        <?php echo $data_alat_key['deskripsi']; ?>
                      </td>
                      <td>Rp. 15000 / Hari</td>
                      <td style="width:20px;text-align:center">12</td>
                  </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="category" style="border:1px solid;padding:20px;border-color:#e0e0e0">
          <h1>Category</h1>
          <hr>
            <ul role="menu" class="menu">
                <li><a href="../alat-camping">All</a><hr></li>
                <?php foreach ($result_kategori as $data_kategori_key ) { ?>
                  <li><a href="index.php?kat=<?php echo $data_kategori_key['id_category'] ?>"><?php echo $data_kategori_key['nama_category']; ?></a><hr></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </section> <!--/#map-section-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="../images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="../#"><img src="../images/home/profile1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore tail.</blockquote>
                                <h3><a href="../#">- Jhon Kalis</a></h3>
                            </div>
                         </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="../#"><img src="../images/home/profile2.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Capicola nisi flank sed minim sunt aliqua rump pancetta leberkas venison eiusmod.</blockquote>
                                <h3><a href="../">- Abraham Josef</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="../mailto:someone@example.com">email@email.com</a> <br>
                        Phone: +1 (123) 456 7890 <br>
                        Fax: +1 (123) 456 7891 <br>
                        </address>

                        <h2>Address</h2>
                        <address>
                        Unit C2, St.Vincent's Trading Est., <br>
                        Feeder Road, <br>
                        Bristol, BS2 0UY <br>
                        United Kingdom <br>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="../http://www.themeum.com">Themeum</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/gmaps.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
</body>
</html>
