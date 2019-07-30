<?php
  session_start();

  if(!isset($_SESSION['id_admin'])){
    echo "<script>window.location = '../'</script>";
  }


  include "../functions/koneksi.php";

  $sql_pemesanan = "select * from pemesanan join users on pemesanan.id_user = users.id_user";
  $result_pemesanan = mysqli_query($link,$sql_pemesanan);
  if($result_pemesanan){

  }else {
    echo mysqli_error($link);
  }
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
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
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
								<img class="nav-user-photo" src="../assets/images/avatars/avatar5.png" alt="<?php echo $_SESSION['username'];?>'s Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['username'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li class="divider"></li>

								<li>
									<a href="../functions/logout.php">
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
						<a href="../rental">
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
								<a href="../">Home</a>
							</li>
              <li class="active">Rental</li>
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
                    <div class="action" style="float:right">
                      <a href="tambah-pemesanan"><button class="btn btn-primary"><i class="fa fa-plus"> Tambah pemesanan</i></button></a>
                    </div>
										<h3 class="header smaller lighter blue">Rental Camping Data Tables</h3>
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
											Results for "Latest Rental Camping Data"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                            <th>Detail</th>
														<th class="center">Satus</th>
														<th>Nama Pemesan</th>
														<th>
                              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Tanggal Peminjaman
                            </th>
														<th class="hidden-480">
                              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Tanggal Pengembalian
                            </th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Nomor ID</th>
                            <th>Denda Pengembalian</th>
														<th>Total Bayar</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($result_pemesanan as $data_pemesanan_key ) { ?>
														<tr>
                              <td>
                                <center>
                                  <button data-toggle="collapse" data-target="#demo_<?php echo $data_pemesanan_key['id_pemesanan'] ?>" style="background:none;border:none"><i class="fa fa-plus" style="color:blue"></i></button>
                                </center>
                              </td>
															<td class="center" style="width:70px">
                                <?php if($data_pemesanan_key['status'] == 1){ ?>
                                  <i class="fa fa-bell" style="color:#FFB752;font-size:25px"></i>
                                <?php }else if($data_pemesanan_key['status'] == 2){ ?>
                                  <i class="fa fa-check" style="color:green;font-size:25px"></i>
                                <?php }else if($data_pemesanan_key['status'] == 3){ ?>
                                  <i class="fa fa-remove" style="color:red;font-size:25px"></i>
                                <?php }else { ?>
                                  <form method="post" action="../functions/edit_data.php">
                                    <input type="hidden" name="jenis" value="alat-camping">
                                    <input type="hidden" name="edit" value="booking">
                                    <input type="hidden" name="id" value="<?php echo $data_pemesanan_key['id_pemesanan'] ?>">
                                    <button type="submit" style="background:none;border:none"><i class="ace-icon fa fa-bullhorn" style="color:blue;font-size:25px"></i></button>
                                  </form>
                                <?php } ?>
															</td>

															<td style="width:150px"><?php echo $data_pemesanan_key['first_name']." ".$data_pemesanan_key['last_name'] ?></td>
															<td style="width:110px"><?php echo $data_pemesanan_key['tanggal_peminjaman'] ?></td>
															<td style="width:130px">
                                <?php echo $data_pemesanan_key['tanggal_pengembalian'] ?>
                                <?php
                                  $denda = 0;
                                  $persen = 0;
                                  $jum_hari = 0;
                                  $tgl_sekarang=date("Y-m-d");//tanggal sekarang
                                  $tgl_mulai=$data_pemesanan_key['tanggal_pengembalian'];// tanggal launching aplikasi
                                  $jangka_waktu = strtotime('+4 days', strtotime($tgl_mulai));// jangka waktu + 365 hari
                                  $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
                                  if($data_pemesanan_key['status'] == 1){
                                    if ($tgl_sekarang >=$tgl_exp )
                                    {
                                      $tglAwal = strtotime($data_pemesanan_key['tanggal_pengembalian']);
                                      $tglAkhir = strtotime(date('Y-m-d'));
                                      $jeda = abs($tglAkhir - $tglAwal);
                                      $jum_hari = $jeda/(60*60*24);
                                      for($i=0;$i<$jum_hari;$i++){
                                        $persen = $persen + 50;
                                      }
                                      echo "<p style='color:red'>(Lewat ".$jum_hari." Hari Denda ".$persen."%)</p>";
                                    }
                                  }
                                 ?>
                              </td>
                              <td style="width:80px;text-align:center"><?php echo $data_pemesanan_key['jumlah_barang'] ?></td>
                              <td>RP. <?php echo $data_pemesanan_key['total_harga'] ?></td>
															<td><?php echo $data_pemesanan_key['no_id'] ?></td>

                              <td>
                                <?php

                                  $denda = $persen/100*$data_pemesanan_key['total_harga'];
                                  echo "Rp. ".$denda;
                                 ?>
                              </td>
                              <td><?php echo "Rp. ".$data_pemesanan_key['total_bayar'] ?></td>
															<td>
																<div class="hidden-sm hidden-xs action-buttons">
                                  <?php if($data_pemesanan_key['status'] == 1){ ?>
                                    <a href="pengembalian?kode_pemesanan=<?php echo $data_pemesanan_key['kode_pemesanan'] ?>" style="margin:0px" readonly>
                                      <button id="<?php echo $data_pemesanan_key['id_pemesanan'] ?>" class="green" style="border:none;margin:0px;background:none;padding-left:0px">
    																		<i class="ace-icon fa fa-reply icon-only" style="margin:0px" ></i>
    																	</button>
                                    </a>
                                <?php }else { ?>
                                  <button id="<?php echo $data_pemesanan_key['id_pemesanan'] ?>" class="green" style="border:none;margin:0px;background:none;padding-left:0px" disabled>
                                    <i class="ace-icon fa fa-reply icon-only" style="margin:0px" ></i>
                                  </button>
                                <?php } ?>
																	<!-- <button id="<?php echo $data_pemesanan_key['id_pemesanan'] ?>" class="blue" style="border:none;margin:0px;background:none;padding-left:0px">
																		<i class="ace-icon fa fa-pencil bigger-130" style="margin:0px" ></i>
																	</button>

                                  <form action="../functions/edit_data.php" method="post" style="display: -webkit-inline-box;">
                                    <input name="jenis" type="hidden" value="pemesanan">
                                    <input name="edit" type="hidden" value="delete">
                                    <input name="id" type="hidden" value="<?php echo $data_pemesanan_key['id_pemesanan'] ?>">
  																	<button class="red" style="border:none;margin:0px;background:none;padding-left:0px">
  																		<i class="ace-icon fa fa-remove bigger-130" style="margin:0px"></i>
  																	</button>
                                  </form> -->
																</div>

																<div class="hidden-md hidden-lg">
																	<div class="inline pos-rel">
																		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																			<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																			<li>
																				<a href="../#" class="tooltip-info" data-rel="tooltip" title="View">
																					<span class="blue">
																						<i class="ace-icon fa fa-search-plus bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="../#" class="tooltip-success" data-rel="tooltip" title="Edit">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="../#" class="tooltip-error" data-rel="tooltip" title="Delete">
																					<span class="red">
																						<i class="ace-icon fa fa-trash-o bigger-120"></i>
																					</span>
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</td>
														</tr>
                            <tr id="demo_<?php echo $data_pemesanan_key['id_pemesanan'] ?>" class="collapse">
                              <td colspan="11">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                  <thead>
                                    <th>Alat Camping</th>
                                    <th>Category</th>
                                    <th>Stok Alat</th>
                                    <th>Harga</th>
                                    <th class="hidden-480">Jumlah Rental</th>

                                    <th>Total Harga</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $sql_alat = "select id_alat_camping,nama,nama_category,stok,harga,status,jumlah,sub_total from detail_pemesanan join alat_camping on detail_pemesanan.id_alat_camping = alat_camping.id_alat join category on alat_camping.id_category = category.id_category where id_pemesanan = ".$data_pemesanan_key['id_pemesanan']."";
                                      $result_alat = mysqli_query($link,$sql_alat);

                                      foreach ($result_alat as $data_alat_key ) {
                                      ?>
                                      <tr>
                                        <td style="width:250px;line-height:35px"><?php echo $data_alat_key['nama'] ?></td>
                                        <td style="width:300px;line-height:35px"><?php echo $data_alat_key['nama_category'] ?></td>
                                        <td style="line-height:35px">
                                          <?php echo $data_alat_key['stok'] ?>
                                          <input type="hidden" value="<?php echo $data_alat_key['stok'] ?>">
                                        </td>
                                        <td style="line-height:35px">
                                          Rp. <?php echo $data_alat_key['harga'] ?>/hari
                                        </td>
                                        <td class="hidden-480" style="padding:0px;text-align:center;width:120px;padding:10px">
                                          <?php echo $data_alat_key['jumlah'] ?>
                                        </td>
                                        <td style="width:200px">
                                          Rp. <?php echo $data_alat_key['sub_total'] ?>"
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                            </tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
                    <hr>
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
							<a href="../#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="../#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="../#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="../#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

    <!-- moda -->

    <!-- tambah modal -->
    <div class="modal fade" id="tambah_pemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Tambah pemesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-modal" class="form-horizontal" role="form" action="../functions/tambah_data.php" method="post">
            <input name="jenis" type="hidden" value="pemesanan">
            <div class="modal-body">
              <div class="input-pemesanan" style="padding:20px">
                <div class="form-group" style="display:-webkit-box">
                  <input name="first_name" type="text" class="form-control" style="width:45%" placeholder="First Name" required>
                  <input name="last_name" type="text" class="form-control" style="width:45%;margin-left:10%" placeholder="Last Name" required>
                </div>
                <div class="form-group" style="display:-webkit-box">
                  <input name="username" type="text" class="form-control" style="width:45%" placeholder="Username" required>
                  <input name="phone_number" type="number" class="form-control" style="width:45%;margin-left:10%" placeholder="Phone Number" required>
                </div>
                <div class="form-group" style="display:-webkit-box">
                  <input name="jenis_id" type="text" class="form-control" style="width:45%" placeholder="Jenis ID" required>
                  <input name="nomor_id" type="number" class="form-control" style="width:45%;margin-left:10%" placeholder="Nomor ID" required>
                </div>
                <div class="form-group">
                  <input name="email" type="text" class="form-control" style="width:100%" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control" style="width:100%" placeholder="Password" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="edit_pemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Edit pemesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-modal" class="form-horizontal" role="form" action="../functions/edit_data.php" method="post">
            <input name="jenis" type="hidden" value="pemesanan">
            <input name="edit" type="hidden" value="data">
            <input name="id_pemesanan" id="id_pemesanan" type="hidden">
            <div class="modal-body">
              <div class="input-pemesanan" style="padding:20px">
                <div class="form-group" style="display:-webkit-box">
                  <input name="first_name" id="first_name" type="text" class="form-control" style="width:45%" placeholder="First Name" required>
                  <input name="last_name" id="last_name" type="text" class="form-control" style="width:45%;margin-left:10%" placeholder="Last Name" required>
                </div>
                <div class="form-group" style="display:-webkit-box">
                  <input name="username" id="username" type="text" class="form-control" style="width:45%" placeholder="Username" required>
                  <input name="phone_number" id="phone_number" type="number" class="form-control" style="width:45%;margin-left:10%" placeholder="Phone Number" required>
                </div>
                <div class="form-group" style="display:-webkit-box">
                  <input name="jenis_id" id="jenis_id" type="text" class="form-control" style="width:45%" placeholder="Jenis ID" required>
                  <input name="nomor_id" id="nomor_id" type="number" class="form-control" style="width:45%;margin-left:10%" placeholder="Nomor ID" required>
                </div>
                <div class="form-group">
                  <input name="email" id="email" type="text" class="form-control" style="width:100%" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control" style="width:100%" placeholder="New Password" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>


		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false }, null,
					  null, null,null, null, null, null, null, null,
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



				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );

				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			});

      function edit(id_pemesanan,first,last,username,phone_number,jenis_id,nomor_id,email) {
        $('#first_name').val(first);
        $('#last_name').val(last);
        $('#username').val(username);
        $('#phone_number').val(phone_number);
        $('#jenis_id').val(jenis_id);
        $('#nomor_id').val(nomor_id);
        $('#email').val(email);
        $('#id_user').val(id_user);
      }
		</script>
	</body>
</html>
