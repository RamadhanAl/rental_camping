<?php

  session_start();
  if(!isset($_SESSION['id_user'])){
    echo "<script>window.location = '../'</script>";
  }
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
                        <li class="dropdown"><a href="../alat-camping">Alat Camping <i ></i></a>
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
                            <h1 class="title">Data Pemesanan Alat Camping</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="map-section">
        <div class="container">
          <div class="col-sm-12">
            <div class="table" style="border:1px solid;padding:20px;border-color:#e0e0e0">
              <table id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                      <th style="width:120px">Kode Pemesanan</th>
                      <th style="width:100px;text-align:center">Tanggal Peminjaman</th>
                      <th style="width:100px;text-align:center">Tanggal Pengembalian</th>
                      <th  style="width:100px;text-align:center">Jumlah Barang</th>
                      <th style="text-align:center">Total Harga</th>
                      <th style="text-align:center">Total Bayar</th>
                      <th style="text-align:center">Pengembalian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql_pemesanan = "select first_name,last_name,id_pemesanan,pemesanan.jenis_id,pemesanan.no_id,pemesanan.nomor_tlpn,tanggal_peminjaman,tanggal_pengembalian,jumlah_barang,total_harga,total_bayar,pemesanan.status,kode_pemesanan from pemesanan join users on pemesanan.id_user = users.id_user  where pemesanan.id_user = ".$_SESSION['id_user']."";

                    $result_pemesanan = mysqli_query($link,$sql_pemesanan);
                    if($result_pemesanan){

                    }else {
                      echo mysqli_error($link);
                    }
                    foreach ($result_pemesanan as $data_pemesanan_key ) {
                  ?>
                  <tr>
                      <td><?php echo $data_pemesanan_key['kode_pemesanan'] ?></td>
                      <td style="width:100px;text-align:center"><?php echo $data_pemesanan_key['tanggal_peminjaman'] ?></td>
                      <td style="width:100px;text-align:center"><?php echo $data_pemesanan_key['tanggal_pengembalian'] ?></td>
                      <td style="width:20px;text-align:center"><?php echo $data_pemesanan_key['jumlah_barang'] ?></td>
                      <td style="text-align:center">Rp. <?php echo $data_pemesanan_key['total_harga'] ?></td>
                      <td style="text-align:center">Rp. <?php echo $data_pemesanan_key['total_bayar'] ?></td>
                      <td style="text-align:center;">
                        <?php if($data_pemesanan_key['status'] == 1){ ?>
                          <i class="fa fa-bell" style="color:#FFB752;font-size:25px"></i>
                        <?php }else if($data_pemesanan_key['status'] == 2){ ?>
                          <i class="fa fa-check" style="color:green;font-size:25px"></i>
                        <?php }else if($data_pemesanan_key['status'] == 3){ ?>
                          <i class="fa fa-remove" style="color:red;font-size:25px"></i>
                        <?php }else { ?>
                          <i class="ace-icon fa fa-bullhorn" style="color:blue;font-size:25px"></i>
                        <?php } ?>
                        <button type="button"  data-toggle="modal" data-target="#tambah_kategori" style="background:none;border:none">
                          <i class="fa fa-search" style="color:blue;font-size:20px"></i>
                        </button>
                      </td>
                  </tr>
                  <div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width:800px;height:auto">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title" id="exampleModalLabel" style="float: left;">Detail Pemesanan</h1>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <br><br>
                        </div>
                        <br><br>
                        <div class="row">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User </label>

                              <div class="col-sm-4">
                                : <?php echo $data_pemesanan_key['first_name']." ".$data_pemesanan_key['last_name']?>
                              </div>
                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> No Telpn. </label>
                              <div class="col-sm-3">
                                : <?php echo $data_pemesanan_key['nomor_tlpn']?>
                              </div>
                            </div>
                            <br>
                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis ID </label>
                              <div class="col-sm-4">
                                : <?php echo $data_pemesanan_key['jenis_id']?>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nomor ID </label>
                              <div class="col-sm-3">
                                : <?php echo $data_pemesanan_key['no_id']?>
                              </div>
                            </div>
                            <br>
                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal </label>

                              <div class="col-xs-8 col-sm-9">
                                <div class="input-group">
                                  <?php
                                  $tanggal_peminjaman = "";
                                  $tanggal_pengembalian = "";

                                  for($t=0;$t<3;$t++){
                                    if($t == 0){
                                      $tanggal_peminjaman .= substr($data_pemesanan_key['tanggal_peminjaman'],5,2);
                                      $tanggal_pengembalian .= substr($data_pemesanan_key['tanggal_pengembalian'],5,2);
                                    }elseif ($t == 1) {
                                      $tanggal_peminjaman .= "/".substr($data_pemesanan_key['tanggal_peminjaman'],8,2);
                                      $tanggal_pengembalian .= "/".substr($data_pemesanan_key['tanggal_pengembalian'],8,2);
                                    }else {
                                      $tanggal_peminjaman .= "/".substr($data_pemesanan_key['tanggal_peminjaman'],0,4);
                                      $tanggal_pengembalian .= "/".substr($data_pemesanan_key['tanggal_pengembalian'],0,4);
                                    }
                                  }
                                  $tanggal = $tanggal_peminjaman." - ".$tanggal_pengembalian;
                                   ?>
                                  : <?php echo $tanggal?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Lama Tanggal Lewat </label>
                              <div class="col-sm-4">
                                <?php
                                  $persen = 0;
                                  $jum_hari = 0;
                                  $tgl_sekarang=date("Y-m-d");//tanggal sekarang
                                  $tgl_mulai=$data_pemesanan_key['tanggal_pengembalian'];// tanggal launching aplikasi
                                  $jangka_waktu = strtotime('+4 days', strtotime($tgl_mulai));// jangka waktu + 365 hari
                                  $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
                                  if ($tgl_sekarang >=$tgl_exp )
                                  {
                                    $tglAwal = strtotime($data_pemesanan_key['tanggal_pengembalian']);
                                    $tglAkhir = strtotime(date('Y-m-d'));
                                    $jeda = abs($tglAkhir - $tglAwal);
                                    $jum_hari = $jeda/(60*60*24);
                                    for($i=0;$i<$jum_hari;$i++){
                                      $persen = $persen + 50;
                                    }
                                  }
                                 ?>
                                : <?php echo $jum_hari?> Hari
                              </div>

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> % Denda </label>
                              <div class="col-sm-2">
                                : <?php echo $persen?> %
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Total Denda </label>
                              <div class="col-sm-4">
                                : Rp. <?php echo $persen/100*$data_pemesanan_key['total_harga'];?>
                              </div>
                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Barang </label>
                              <div class="col-sm-3">
                                : <?php echo $data_pemesanan_key['jumlah_barang']?> Barang
                              </div>

                            </div>
                            <br>
                            <div class="form-group">

                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Harga </label>
                              <div class="col-sm-4">
                                : Rp. <?php echo $data_pemesanan_key['total_harga']?>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Total Harga </label>
                              <div class="col-sm-3">
                              : Rp. <?php echo $data_pemesanan_key['total_harga'] + ($persen/100*$data_pemesanan_key['total_harga'])?>
                              </div>
                            </div>
                            <br><br>
                            <div class="space-4"></div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                <?php } ?>
                </tbody>
            </table>
          </div>
          <div class="keterangan">
            <div class="row">
              <div class="col-sm-6">
                <div class="well">
                  <i class="fa fa-bell" style="color:#FFB752;font-size:25px"></i>
                  Pemesanan Sedang Berjalan.
                </div>
                <div class="well">
                  <i class="fa fa-check" style="color:green;font-size:25px"></i>
                  Pemesanan Sudah Selesai dan Sudah Dikembalikan.
                </div>
              </div>
              <div class="col-sm-6">
                <div class="well">
                  <i class="fa fa-remove" style="color:red;font-size:25px"></i>
                  Pemesanan Sudah Dibatalkan.
                </div>
                <div class="well">
                  <i class="fa fa-bullhorn" style="color:blue;font-size:25px"></i>
                  Pemesanan Bookingan Pelanggan.
                </div>
              </div>
            </div>
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
