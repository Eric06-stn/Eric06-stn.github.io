<?php
// panggil koneksi database
include "koneksi.php";

// tombol simpan diklik
if(isset($_POST['bsimpan'])){
  // persiapan simpan
  $simpan = mysqli_query($koneksi, "INSERT INTO tpengurus (npm, nama, divisi, prodi)
                                    VALUES ('$_POST[tnpm]',
                                            '$_POST[tnama]',
                                            '$_POST[tdivisi]',
                                            '$_POST[tprodi]')");
  // jika simpan sukses
  if($simpan){
    echo "<script>
            alert('Simpan Data Berhasil');
            document.location='index.php';
          </script>";
  }else{
    echo "<script>
            alert('Simpan Data Gagal');
            document.location='index.php';
          </script>";
  }
}


// tombol edit diklik
if(isset($_POST['bubah'])){
  // persiapan edit
  $ubah = mysqli_query($koneksi,"UPDATE tpengurus SET
                                                        npm = '$_POST[tnpm]',
                                                        nama = '$_POST[tnama]',
                                                        divisi = '$_POST[tdivisi]',
                                                        prodi = '$_POST[tprodi]'
                                                  WHERE id_pengurus = '$_POST[id_pengurus]'
                                                  ");
  // jika edit sukses
  if($ubah){
    echo "<script>
            alert('Ubah Data Berhasil');
            document.location='index.php';
          </script>";
  }else{
    echo "<script>
            alert('Ubah Data Gagal');
            document.location='index.php';
          </script>";
  }
}


// tombol hapus diklik
if(isset($_POST['bhapus'])){
  // persiapan hapus
  $hapus = mysqli_query($koneksi,"DELETE FROM tpengurus WHERE id_pengurus = '$_POST[id_pengurus]'");
  // jika hapus sukses
  if($hapus){
    echo "<script>
            alert('Hapus Data Berhasil');
            document.location='index.php';
          </script>";
  }else{
    echo "<script>
            alert('Hapus Data Gagal');
            document.location='index.php';
          </script>";
  }
}
?>