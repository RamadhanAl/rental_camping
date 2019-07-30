<?php

  include "koneksi.php";

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $phone_number = $_POST['phone_number'];
  $created_at = date('Y-m-d');

  $sql_insert = "INSERT INTO users(first_name,last_name,username,email,password,phone_number,created_at)
                                      VALUES (
                                              '$first_name',
                                              '$last_name',
                                              '$username',
                                              '$email',
                                              '$password',
                                              '$phone_number',
                                              '$created_at'
                                            )";
  $result_insert = mysqli_query($link,$sql_insert);

  echo "<script>window.location = '../register/index.php?m=success'</script>";


 ?>
