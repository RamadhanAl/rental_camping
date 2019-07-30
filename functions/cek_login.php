<?php
include "koneksi.php";

$username_email = $_POST['username_email'];
$password = md5($_POST['password']);

if($_GET['lgn'] == 'usr'){
$sql = "select * from users where password = '$password' and active = 1 and username = '$username_email' or email = '$username_email'";
$result = mysqli_query($link,$sql);
$data=mysqli_fetch_array($result);
$ketemu=mysqli_num_rows($result);

if($ketemu>0)
{
  session_start();
  //buat sesion
  $_SESSION['id_user']= $data['id_user'];
  $_SESSION['username']= $data['username'];
  $_SESSION['first_name']= $data['first_name'];
  $_SESSION['last_name']= $data['last_name'];
  $_SESSION['email']= $data['email'];
  //redirect ke halaman utama
  echo ("<script> location.href='../';</script>");
  }
  else
  {
    echo ("<script> location.href='../login/index.php?m=wrong';</script>");
  }
}else {
  echo ("<script> location.href='../';</script>");
}
?>
