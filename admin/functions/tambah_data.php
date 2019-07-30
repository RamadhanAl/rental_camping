<?php

  include "koneksi.php";

  if(isset($_POST['jenis'])){
    if($_POST['jenis'] == "user"){
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
    }else if($_POST['jenis'] == "kategori"){
      $nama_category = $_POST['nama_category'];
      $created_at = date('Y-m_d');
      $sql_insert = "INSERT INTO category(nama_category,created_at) VALUES ('$nama_category','$created_at')";

      $result_insert = mysqli_query($link,$sql_insert);

      echo "<script>window.location = '../kategori/index.php?a=add&m=success'</script>";
    }else if($_POST['jenis'] == "alat-camping"){
      // var_dump($_FILES);
      $nama_alat = $_POST['nama_alat'];
      $deskripsi = $_POST['deskripsi'];
      $stok = $_POST['stok'];
      $harga = $_POST['harga'];
      if($stok <= 0){
        $status = "Out Of Stok";
      }else {
        $status = "Avalible";
      }
      $id_category = $_POST['id_category'];
      $target_dir = '../../images/alat/';
      $imgs= basename($_FILES["gambar"]["name"]);
      $imageFileType = strtolower(pathinfo($imgs,PATHINFO_EXTENSION));
      $img = md5(time()).'.'.$imageFileType;
      $target_file = $target_dir . $img;

      move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

      $created_at = date('Y-m_d');
      $sql_insert = "INSERT INTO alat_camping(nama,id_category,stok,harga,status,gambar,created_at,deskripsi) VALUES ('$nama_alat','$id_category','$stok','$harga','$status','$img','$created_at','$deskripsi')";

      $result_insert = mysqli_query($link,$sql_insert);

      echo "<script>window.location = '../alat-camping/index.php?a=add&m=success'</script>";
    }else if($_POST['jenis'] == "pemesanan"){

      $jumlah = 0;
      $total_harga = 0;
      $kode_pesanan = uniqid();
      $stok = array();
      $count_jumlah = count($_POST['id_alat']);

      for($i=0;$i<$count_jumlah;$i++){
        $jumlah = $jumlah + $_POST['jumlah_rental'][$i];
        $total_harga = $total_harga + $_POST['sub_total'][$i];
      }

      $sql_cek = "select kode_pemesanan from pemesanan where kode_pemesanan = '$kode_pesanan'";
      $result_cek = mysqli_query($link,$sql_cek);

      while (mysqli_num_rows($result_cek) != 0 ) {
        $kode_pesanan = uniqid();

        $sql_cek = "select kode_pemesanan from pemesanan where kode_pemesanan = '$kode_pesanan'";
        $result_cek = mysqli_query($link,$sql_cek);

      }

      $id_user = $_POST['id_user'];
      $jenis_id = $_POST['jenis_id'];
      $no_id = $_POST['nomor_id'];
      $nomor_tlpn = $_POST['nomor_tlpn'];
      $tanggal_peminjaman_format = substr($_POST['date-range-picker'],0,10);
      $tanggal_pengembalian_format = substr($_POST['date-range-picker'],13,23);
      $tanggal_peminjaman = "";
      $tanggal_pengembalian = "";

      for($t=0;$t<3;$t++){
        if($t == 0){
          $tanggal_peminjaman .= substr($tanggal_peminjaman_format,6,4);
          $tanggal_pengembalian .= substr($tanggal_pengembalian_format,6,4);
        }elseif ($t == 1) {
          $tanggal_peminjaman .= "-".substr($tanggal_peminjaman_format,0,2);
          $tanggal_pengembalian .= "-".substr($tanggal_pengembalian_format,0,2);
        }else {
          $tanggal_peminjaman .= "-".substr($tanggal_peminjaman_format,3,2);
          $tanggal_pengembalian .= "-".substr($tanggal_pengembalian_format,3,2);
        }
      }


      for($i=0;$i<$count_jumlah;$i++){
        $id = $_POST['id_alat'][$i];
        $sql_cek = "select stok,total_penyewaan from alat_camping where id_alat = $id";
        $result_cek = mysqli_query($link,$sql_cek);
        $data=mysqli_fetch_array($result_cek);

        $update_stok = $data['stok'] - $_POST['jumlah_rental'][$i];
        $update_penyewaan = $data['total_penyewaan'] + 1;

        $sql_update = "UPDATE alat_camping SET stok = $update_stok, total_penyewaan = $update_penyewaan WHERE id_alat = $id";
        mysqli_query($link,$sql_update);
      }

      if(isset($_POST['pemesanan_user'])){
        $stas = 4;
      }else {
        $stat = 1;
      }

      $sql_insert = "INSERT INTO pemesanan(id_user,jenis_id,no_id,nomor_tlpn,tanggal_peminjaman,tanggal_pengembalian,jumlah_barang,total_harga,kode_pemesanan,status)
                                          VALUES (
                                                  '$id_user',
                                                  '$jenis_id',
                                                  '$no_id',
                                                  '$nomor_tlpn',
                                                  '$tanggal_peminjaman',
                                                  '$tanggal_pengembalian',
                                                  '$jumlah',
                                                  '$total_harga',
                                                  '$kode_pesanan',
                                                  '$stas'
                                                )";
      $result_insert = mysqli_query($link,$sql_insert);

      $select_max = "select max(id_pemesanan) from pemesanan";
      $result_max = mysqli_query($link,$select_max);
      $data_max=mysqli_fetch_array($result_max);

      $id_pemesanan = $data_max['max(id_pemesanan)'];
      var_dump($id_pemesanan);

      for($i=0;$i<$count_jumlah;$i++){
        $id = $_POST['id_alat'][$i];
        $jumlah_rental = $_POST['jumlah_rental'][$i];
        $sub_total = $_POST['sub_total'][$i];
        $sql_detail_insert = "INSERT INTO detail_pemesanan(id_pemesanan,id_alat_camping,jumlah,sub_total)
                                            VALUES (
                                                    '$id_pemesanan',
                                                    '$id',
                                                    '$jumlah_rental',
                                                    '$sub_total'
                                                  )";
        $result_detail_insert = mysqli_query($link,$sql_detail_insert);

      }
      if(isset($_POST['pemesanan_user'])){
        echo "<script>window.location = '../../dashboard/index.php?a=add&m=success'</script>";
      }else {
        echo "<script>window.location = '../rental/tambah-pemesanan/index.php?a=add&m=success'</script>";
      }
    }else if($_POST['jenis'] == "pengembalian"){
      $id_pemesanan = $_POST['id_pemesanan'];
      $tanggal_kembali = date('Y-m-d');
      $total_harga = substr($_POST['total_harga'],4);
      $total_bayar = $_POST['pembayaran'];
      $lama_tanggal_lewat = substr($_POST['lama_tanggal_lewat'],0,-5);
      $persentase_denda = substr($_POST['persentase_denda'],0,-2);
      $total_denda = substr($_POST['total_denda'],4);
      // var_dump($total_harga);
      $sql_pengembalian = "INSERT INTO pengembalian(id_pemesanan,tanggal_kembali,total_harga,total_bayar)
                                          VALUES (
                                                  '$id_pemesanan',
                                                  '$tanggal_kembali',
                                                  '$total_harga',
                                                  '$total_bayar'
                                                )";
      $result_pengembalian = mysqli_query($link,$sql_pengembalian);
      if($lama_tanggal_lewat != 0){
        $select_max = "select max(id_pengembalian) from pengembalian";
        $result_max = mysqli_query($link,$select_max);
        $data_max=mysqli_fetch_array($result_max);
        $id_pengembalian = $data_max['max(id_pengembalian)'];
        $sql_denda = "INSERT INTO denda_pengembalian(id_pengembalian,lama_tanggal_lewat,persentase_denda,total_denda)
                                            VALUES (
                                                    '$id_pengembalian',
                                                    '$lama_tanggal_lewat',
                                                    '$total_harga',
                                                    '$total_bayar'
                                                  )";
        $result_denda = mysqli_query($link,$sql_denda);
      }

      $sql_update = "UPDATE pemesanan SET status = 2, total_bayar = $total_bayar WHERE id_pemesanan = $id_pemesanan";
      mysqli_query($link,$sql_update);

      $sql_stok_alat = "select id_alat_camping,jumlah from detail_pemesanan where id_pemesanan = $id_pemesanan";
      $result_stok_alat = mysqli_query($link,$sql_stok_alat);

      foreach ($result_stok_alat as $result_stok_alat_key) {
        $sql_cek = "select stok from alat_camping where id_alat = ".$result_stok_alat_key['id_alat_camping']."";
        $result_cek = mysqli_query($link,$sql_cek);
        $data=mysqli_fetch_array($result_cek);

        $update_stok = $data['stok'] + $result_stok_alat_key['jumlah'];

        $sql_update = "UPDATE alat_camping SET stok = $update_stok WHERE id_alat = ".$result_stok_alat_key['id_alat_camping']."";
        mysqli_query($link,$sql_update);
      }
      echo "<script>window.location = '../rental/tambah-pemesanan/index.php?a=add&m=success'</script>";
    }
  }

 ?>
