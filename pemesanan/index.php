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
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../admin/assets/css/daterangepicker.min.css" />
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
                            <h1 class="title">Booking Alat Camping Berkualitas</h1>
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
            <form class="form-horizontal" role="form" action="../admin/functions/tambah_data.php" method="post">
              <input name="pemesanan_user" type="hidden" value="true">
              <input name="jenis" type="hidden" value="pemesanan">
              <div class="row" style="background: #EFF3F8;margin: 0px;    padding-top: 20px;">
                <div class="col-sm-11">
                  <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> User </label>

                    <div class="col-sm-4">
                      <input type="hidden" id="form-field-1-1" name="id_user" class="form-control" value="<?php echo $_SESSION['id_user']?>">
                      <input type="text" id="form-field-1-1" class="form-control" value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?>" readonly>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> No Telpn. </label>
                    <div class="col-sm-4">
                      <input type="number" id="form-field-1-1" name="nomor_tlpn" placeholder="No Telpn Pemesan" class="form-control">
                    </div>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis ID </label>
                    <div class="col-sm-4">
                      <input type="text" name="jenis_id" id="form-field-1-1" placeholder="Jenis ID Pemesan" class="form-control">
                    </div>

                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nomor ID </label>
                    <div class="col-sm-4">
                      <input type="number" name="nomor_id" id="form-field-1-1" placeholder="Nomor ID Pemesan" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tanggal </label>

                    <div class="col-xs-8 col-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i>
                        </span>

                        <input class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1">
                      </div>
                    </div>
                  </div>
                  <div class="space-4"></div>
                </div>
              </div>
              <table id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th class="center"></th>
                    <th>Alat Camping</th>
                    <th>Category</th>
                    <th>Stok Alat</th>
                    <th>Harga</th>
                    <th class="hidden-480">Jumlah Rental</th>

                    <th>Total Harga</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $sql_alat = "select id_alat,gambar,nama,nama_category,stok,harga,total_penyewaan,status from alat_camping join category on alat_camping.id_category = category.id_category where alat_camping.active = 1";
                    $result_alat = mysqli_query($link,$sql_alat);

                    foreach ($result_alat as $data_alat_key ) {
                    ?>
                    <tr>
                      <td class="center" style="line-height:35px">
                        <label class="pos-rel">
                          <input type="checkbox" class="ace" name="id_alat[]" value="<?php echo $data_alat_key['id_alat'] ?>" />
                          <span class="lbl"></span>
                        </label>
                      </td>
                      <td style="width:300px;line-height:35px">
                        <div class="row">
                          <div class="col-sm-4" style="padding:10px">
                            <img style="border:1px solid" src="../images/alat/<?php echo $data_alat_key['gambar']?>" width="100" height="100">
                          </div>
                          <div class="col-sm-8" style="line-height:125px">
                            <?php echo $data_alat_key['nama'] ?>
                          </div>
                        </div>
                      </td>
                      <td style="width:200px;line-height:35px"><?php echo $data_alat_key['nama_category'] ?></td>
                      <td style="line-height:35px;text-align:center">
                        <?php echo $data_alat_key['stok'] ?>
                        <input type="hidden" id="stok_<?php echo $data_alat_key['id_alat'] ?>" value="<?php echo $data_alat_key['stok'] ?>">
                      </td>
                      <td style="line-height:35px">
                        Rp. <?php echo $data_alat_key['harga'] ?>/hari
                        <input type="hidden" id="harga_<?php echo $data_alat_key['id_alat'] ?>" value="<?php echo $data_alat_key['harga'] ?>">
                      </td>

                      <td class="hidden-480" style="padding:0px;text-align:center;width:120px;padding:10px" id="jumlah_<?php echo $data_alat_key['id_alat'] ?>">

                      </td>

                      <td style="width:150px" id="sub_total_<?php echo $data_alat_key['id_alat'] ?>">

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                  <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit
                  </button>

                  &nbsp; &nbsp; &nbsp;
                  <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                  </button>
                </div>
              </div>

              <div class="hr hr-24"></div>
            </form>
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
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="../admin/assets/js/bootstrap-timepicker.min.js"></script>
    <script src="../admin/assets/js/moment.min.js"></script>
    <script src="../admin/assets/js/daterangepicker.min.js"></script>

    		<!-- ace scripts -->
    		<script src="../admin/assets/js/ace-elements.min.js"></script>
    		<script src="../admin/assets/js/ace.min.js"></script>
    <script>
    function calculate(id) {
        var stok = $('#stok_'+id).val();
        var harga = $('#harga_'+id).val();
        var jumlah = $('#jumlah_input_'+id).val();
        if(jumlah > parseInt(stok)){
          $('#jumlah_input_'+id).val(0);
          alert('Jumlah Stok Tidak Tersedia')
          $('#sub_total_input_'+id).val(null);
        }else {
          var sub_total = parseInt(harga) * parseInt(jumlah);
          $('#sub_total_input_'+id).val(sub_total);
        }
    }

    $( "input[type=checkbox]" ).on( "click", function(){
      var id = $(this).val();
      if($(this).prop( "checked" ) == true){
        $('#jumlah_'+id).append('<input type="number" name="jumlah_rental[]" min="0" id="jumlah_input_'+id+'" value="0" style="width:50px" style="text-align:center;" onchange="calculate('+id+')">');
        $('#sub_total_'+id).append('<input type="number" name="sub_total[]" id="sub_total_input_'+id+'" readonly required>');
      }else {
        $('#jumlah_input_'+id).remove();
        $('#sub_total_input_'+id).remove();
      }
    });
    jQuery(function($) {

      //datepicker plugin
      //link
      $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
      })
      //show datepicker when clicking on the icon
      .next().on(ace.click_event, function(){
        $(this).prev().focus();
      });

      //or change it into a date range picker
      $('.input-daterange').datepicker({autoclose:true});


      //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
      $('input[name=date-range-picker]').daterangepicker({
        'applyClass' : 'btn-sm btn-success',
        'cancelClass' : 'btn-sm btn-default',
        locale: {
          applyLabel: 'Apply',
          cancelLabel: 'Cancel',
        }
      })
      .prev().on(ace.click_event, function(){
        $(this).next().focus();
      });
    });
    </script>
</body>
</html>
