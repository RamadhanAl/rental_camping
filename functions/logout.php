<?php

session_start();

if(isset($_SESSION['id_user'])){
session_destroy();
echo ("<script> location.href='../';</script>");
}else if(isset($_SESSION['id_admn'])){
  session_destroy();
  echo ("<script> location.href='../admin';</script>");
}

 ?>
