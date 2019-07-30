<?php

session_start();

if(isset($_SESSION['id_user'])){
  echo "<script>window.location = '../'</script>";
}

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
                        <?php if(isset($_SESSION['id_user'])){ ?>
                        <li><a href="../dashboard">Dashboard</a></li>
                        <li><a href="../pemesanan">Pemesanan</a></li>
                        <li><a href="../">Log Out</a></li>
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
                          <?php if(isset($_GET['m'])){ ?>
                            <div class="register_success" style="text-align:center">
                              <h1>Selamat Anda Telah Berhasil Mendaftar</h1>
                              <p>Silahkan Tunggu Admin Mengaktifkan Akun Anda. Silahkan Menuju Halaman <a href="../login">Login</a></p>
                            </div>
                          <?php }else { ?>
                            <h1 class="title">Register</h1>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="map-section">
      <?php if(!isset($_GET['m'])){ ?>
        <div class="container">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <img src="../images/home/slider/hill.png" class="slider-house" alt="slider image" style="height:400px;width:100%">
              </div>
              <div class="col-sm-8">
                <form method="post" action="../functions/register.php">
                  <div class="form-group" style="display:-webkit-box">
                    <input name="first_name" type="text" class="form-control" style="width:40%" placeholder="First Name">
                    <input name="last_name" type="text" class="form-control" style="width:40%;margin-left:10%" placeholder="Last Name">
                  </div>
                  <div class="form-group" style="display:-webkit-box">
                    <input name="username" type="text" class="form-control" style="width:40%" placeholder="Username">
                    <input name="phone_number" type="number" class="form-control" style="width:40%;margin-left:10%" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <input name="email" type="text" class="form-control" style="width:90%" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control" style="width:90%" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-info">Register</button>
                  </div>
                  <br>
                  <P style="">Have Account?, Sign in <a href="../login">Here</a></P>
                  <br>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
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
    <script type="text/javascript" src="../http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../js/gmaps.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
