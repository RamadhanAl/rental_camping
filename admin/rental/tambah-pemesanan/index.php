<?php
  session_start();

  if(!isset($_SESSION['id_admin'])){
    echo "<script>window.location = '../../'</script>";
  }


  include "../../functions/koneksi.php";

  $sql_pemesanan = "select * from pemesanan";
  $result_pemesanan = mysqli_query($link,$sql_pemesanan);
	// var_dump($result_pemesanan);
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tables - Ace Admin</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
		<link rel="stylesheet" href="../../assets/css/daterangepicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../../assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../../assets/js/html5shiv.min.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="../index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="../#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../../assets/images/avatars/avatar5.png" alt="<?php echo $_SESSION['username'];?>'s Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['username'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li class="divider"></li>

								<li>
									<a href="../../functions/logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="../dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="active">
						<a href="../../rental">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> Rental </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="../alat-camping">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Alat Camping </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="../kategori">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Kategori </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="../user">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> User </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="../../">Home</a>
							</li>
              <li><a href="../">Rental</a></li>
              <li class="active">Tambah Rental</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Rental Camping Tambah Data</h3>
                    <?php if(isset($_GET['m'])){ ?>
                      <?php if($_GET['m'] == "success"){ ?>
                        <div class="alert alert-success">
                          <button class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                          </button>
                          Pengolahan Data Berhasil
                        </div>
                      <?php }else { ?>
                        <div class="alert alert-danger">
                          <button class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                          </button>
                          Pengolahan Data Gagal
                        </div>
                      <?php } ?>
                    <?php } ?>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Tambah Data Rental Camping
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
                      <form class="form-horizontal" role="form" action="../../functions/tambah_data.php" method="post">
                        <input name="jenis" type="hidden" value="pemesanan">
                        <div class="row" style="background: #EFF3F8;margin: 0px;    padding-top: 20px;">
                          <div class="col-sm-11">
          									<div class="form-group">
          										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> User </label>

          										<div class="col-sm-4">
          											<select id="form-field-1" name="id_user" class="col-xs-10 col-sm-12">
                                  <option value="">-Pilih User-</option>
                                  <?php
                                    $sql_user = "select * from users";
                                    $result_user = mysqli_query($link,$sql_user);

                                    foreach ($result_user as $data_user_key ) {
                                   ?>
                                   <option value="<?php echo $data_user_key['id_user'] ?>"><?php echo $data_user_key['first_name']." ".$data_user_key['last_name'] ?></option>
                                 <?php } ?>
                                </select>
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
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
                              $sql_alat = "select id_alat,nama,nama_category,stok,harga,total_penyewaan,status from alat_camping join category on alat_camping.id_category = category.id_category where alat_camping.active = 1";
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

                                <td style="width:250px;line-height:35px"><?php echo $data_alat_key['nama'] ?></td>
                                <td style="width:300px;line-height:35px"><?php echo $data_alat_key['nama_category'] ?></td>
                                <td style="line-height:35px">
                                  <?php echo $data_alat_key['stok'] ?>
                                  <input type="hidden" id="stok_<?php echo $data_alat_key['id_alat'] ?>" value="<?php echo $data_alat_key['stok'] ?>">
                                </td>
                                <td style="line-height:35px">
                                  Rp. <?php echo $data_alat_key['harga'] ?>/hari
                                  <input type="hidden" id="harga_<?php echo $data_alat_key['id_alat'] ?>" value="<?php echo $data_alat_key['harga'] ?>">
                                </td>

                                <td class="hidden-480" style="padding:0px;text-align:center;width:120px;padding:10px" id="jumlah_<?php echo $data_alat_key['id_alat'] ?>">

                                </td>

                                <td style="width:200px" id="sub_total_<?php echo $data_alat_key['id_alat'] ?>">

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
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="../../#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="../../#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="../../#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="../../#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!--[if !IE]> -->
		<script src="../../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/js/bootstrap-timepicker.min.js"></script>
    <script src="../../assets/js/moment.min.js"></script>
    <script src="../../assets/js/daterangepicker.min.js"></script>
    <!-- page specific plugin scripts -->
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="../../assets/js/dataTables.buttons.min.js"></script>
    <script src="../../assets/js/buttons.flash.min.js"></script>
    <script src="../../assets/js/buttons.html5.min.js"></script>
    <script src="../../assets/js/buttons.print.min.js"></script>
    <script src="../../assets/js/buttons.colVis.min.js"></script>
    <script src="../../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../../assets/js/ace-elements.min.js"></script>
		<script src="../../assets/js/ace.min.js"></script>
    <script type="text/javascript">
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
      //initiate dataTables plugin
      var myTable =
      $('#dynamic-table')
      //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
      .DataTable( {
        bAutoWidth: false,
        "aoColumns": [
          { "bSortable": false },
          null, null,null, null, { "bSortable": false },
          { "bSortable": false }
        ],
        "aaSorting": [],


        //"bProcessing": true,
            //"bServerSide": true,
            //"sAjaxSource": "http://127.0.0.1/table.php"	,

        //,
        //"sScrollY": "200px",
        //"bPaginate": false,

        //"sScrollX": "100%",
        //"sScrollXInner": "120%",
        //"bScrollCollapse": true,
        //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
        //you may want to wrap the table inside a "div.dataTables_borderWrap" element

        //"iDisplayLength": 50


        select: {
          style: 'multi'
        }
        } );

    })
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
