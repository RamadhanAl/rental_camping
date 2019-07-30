<?php
include "koneksi.php";

$username = $_POST['username'];
$password = ($_POST['password']);

if($_GET['lgn'] == 'adm'){
$sql = "select * from admin where password = '$password' and active = 1 and username = '$username'";
$result = mysqli_query($link,$sql);
$data=mysqli_fetch_array($result);
$ketemu=mysqli_num_rows($result);
// var_dump($ketemu);
if($ketemu>0)
{
  session_start();
  //buat sesion
  $_SESSION['id_admin']= $data['id_admin'];
  $_SESSION['username']= $data['username'];
  $_SESSION['nama']= $data['nama'];
  //redirect ke halaman utama
  echo ("<script> location.href='../dashboard';</script>");
  }
  else
  {
    echo ("<script> location.href='../index.php?m=wrong';</script>");
  }
}else {
  echo ("<script> location.href='../';</script>");
}
?>
