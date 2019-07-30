<?php

  include "koneksi.php";

  if(isset($_POST['jenis'])){
    if($_POST['jenis'] == "user"){
      if(isset($_POST['edit'])){
        if($_POST['edit'] == 'active'){
          $id = $_POST['id'];
          $active = $_POST['active'];
          $sql_update = "UPDATE users SET active = $active
                                            WHERE id_user = $id";
          mysqli_query($link,$sql_update);
          // if(mysqli_query($link,$sql_update)){
          //
          // }else {
          //   echo mysqli_error($link);
          // }
          echo "<script>window.location = '../user/index.php?a=add&m=success'</script>";
        }else if($_POST['edit'] == 'data'){

          $id_user = $_POST['id_user'];
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = md5($_POST['password']);
          $phone_number = $_POST['phone_number'];
          $created_at = date('Y-m_d');
          $jenis_id = $_POST['jenis_id'];
          $nomor_id = $_POST['nomor_id'];

          $sql_update = "UPDATE users SET first_name = '$first_name',
                                          last_name = '$last_name',
                                          username = '$username',
                                          email = '$email',
                                          password = '$password',
                                          phone_number = '$phone_number',
                                          jenis_id = '$jenis_id',
                                          nomor_id = '$nomor_id'
                                            WHERE id_user = $id_user";
          mysqli_query($link,$sql_update);
          // if(mysqli_query($link,$sql_update)){
          //
          // }else {
          //   echo mysqli_error($link);
          // }
          echo "<script>window.location = '../user/index.php?a=add&m=success'</script>";
        }else if($_POST['edit'] == 'delete'){
          $id = $_POST['id'];

          $pemesanan = mysqli_query($link,"SELECT id_pemesanan FROM pemesanan WHERE id_user = '$id'");
          while ($rowPemesanan = mysqli_fetch_array($pemesanan)) {
            $id_pemesanan = $rowPemesanan['id_pemesanan'];

            $detailPemesanan = mysqli_query($link,"SELECT id_detail_pemesanan FROM detail_pemesanan WHERE id_pemesanan = '$id_pemesanan'");
            while ($rowDetailPemesanan = mysqli_fetch_array($detailPemesanan)) {
              $id_detail_pemesanan = $rowDetailPemesanan['id_detail_pemesanan'];
              mysqli_query($link,"DELETE FROM detail_pemesanan WHERE id_detail_pemesanan = '$id_detail_pemesanan'");

            }

            $pengembalian = mysqli_query($link,"SELECT id_pengembalian FROM pengembalian WHERE id_pemesanan = '$id_pemesanan'");
            while ($rowPengembalian = mysqli_fetch_array($pengembalian)) {
              $id_pengembalian = $rowPengembalian['id_pengembalian'];

              $denda_pengembalian = mysqli_query($link,"SELECT id_denda_pengembalian FROM denda_pengembalian WHERE id_pengembalian = '$id_pengembalian'");
              while ($rowDendaPengembalian = mysqli_fetch_array($denda_pengembalian)) {
                $id_denda_pengembalian = $rowDendaPengembalian['id_denda_pengembalian'];
                mysqli_query($link,"DELETE FROM denda_pengembalian WHERE id_denda_pengembalian = '$id_denda_pengembalian'");
              }

              mysqli_query($link,"DELETE FROM pengembalian WHERE id_pengembalian = '$id_pengembalian'");

            }

            mysqli_query($link,"DELETE FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");

          }

          $query = mysqli_query($link,"DELETE FROM users WHERE id_user = '$id'");
          if(!$query){
            echo mysqli_error($link);
          }

          echo "<script>window.location = '../user/index.php?a=add&m=success'</script>";
        }

      }else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['phone_number'];
        $created_at = date('Y-m_d');
        $jenis_id = $_POST['jenis_id'];
        $nomor_id = $_POST['nomor_id'];

        $sql_insert = "INSERT INTO users(first_name,last_name,username,jenis_id,nomor_id,email,password,phone_number,created_at)
                                            VALUES (
                                                    '$first_name',
                                                    '$last_name',
                                                    '$username',
                                                    '$jenis_id',
                                                    '$nomor_id',
                                                    '$email',
                                                    '$password',
                                                    '$phone_number',
                                                    '$created_at'
                                                  )";
        $result_insert = mysqli_query($link,$sql_insert);

        echo "<script>window.location = '../user/index.php?a=add&m=success'</script>";
      }
    }else if($_POST['jenis'] == "kategori"){
      if($_POST['edit'] == 'active'){
        $id = $_POST['id'];
        $active = $_POST['active'];
        $sql_update = "UPDATE category SET active = $active
                                          WHERE id_category = $id";
        mysqli_query($link,$sql_update);
        // if(mysqli_query($link,$sql_update)){
        //
        // }else {
        //   echo mysqli_error($link);
        // }
        echo "<script>window.location = '../kategori/index.php?a=add&m=success'</script>";
      }else if($_POST['edit'] == 'data'){

        $nama_category = $_POST['nama_category'];
        $id_category = $_POST['id_category'];

        $sql_update = "UPDATE category SET nama_category = '$nama_category' WHERE id_category = $id_category";
        mysqli_query($link,$sql_update);
        // if(mysqli_query($link,$sql_update)){
        //
        // }else {
        //   echo mysqli_error($link);
        // }
        echo "<script>window.location = '../kategori/index.php?a=add&m=success'</script>";
      }else if($_POST['edit'] == 'delete'){
        $id = $_POST['id'];
        mysqli_query($link,"DELETE FROM category WHERE id_category = $id");
        echo "<script>window.location = '../kategori/index.php?a=add&m=success'</script>";
      }
    }else if($_POST['jenis'] == "alat-camping"){
      if($_POST['edit'] == 'active'){
        $id = $_POST['id'];
        $active = $_POST['active'];
        $sql_update = "UPDATE alat_camping SET active = $active
                                          WHERE id_alat = $id";
        mysqli_query($link,$sql_update);
        // if(mysqli_query($link,$sql_update)){
        //
        // }else {
        //   echo mysqli_error($link);
        // }
        echo "<script>window.location = '../alat-camping/index.php?a=add&m=success'</script>";
      }else if($_POST['edit'] == 'delete'){
        $id = $_POST['id'];
        mysqli_query($link,"DELETE FROM alat_camping WHERE id_alat = $id");
        echo "<script>window.location = '../alat-camping/index.php?a=add&m=success'</script>";
      }else if($_POST['edit'] == 'booking'){
        $id = $_POST['id'];
        mysqli_query($link,"UPDATE pemesanan SET status = 1 WHERE id_pemesanan = $id");
        echo "<script>window.location = '../rental/index.php?a=add&m=success'</script>";
      }
    }
  }

 ?>
