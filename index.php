<?php 
// panggil koneksi database
include "koneksi.php";

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD De-Code</title>
    <link href="./Boostraps/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
        <img src="./asset/Decode.jpg" alt="Bootstrap" width="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#decode">De Code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#artikel">Artikel</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hero Section -->
    <section class="jumbotron text-center" id="home">
      <img src="./asset/img.jpg" alt="Eric Sumartian" width="200" class="rounded-circle img-thumbnail">
      <h1 class="display-4">Eric Sumartian</h1>
      <p class="lead">Graphic Design De Code</p>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L48,234.7C96,213,192,171,288,154.7C384,139,480,149,576,138.7C672,128,768,96,864,112C960,128,1056,192,1152,208C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    <!-- Hero Section -->

    <!-- About Section -->
    <div class="container" id="decode">
        <div class="row align-items-center hero-section">
            <!-- Kolom Teks (Kiri) -->
            <div class="col-md-6 order-md-1">
                <h1 class="title">De Code</h1>
                <p class="description">
                  De Code adalah komunitas coding yang ada di Universitas Dehasen Bengkulu. Komunitas ini dibentuk unutk menampung minat dan bakat mahasiswa dalam bidang teknologi.Khususnya pemrograman dan pengembangan Hardware/Software.Tujuan utama De Code adalah unutk meningkatkan keterampilan dalam coding, berbagi pengetahuan serta menciptakan lingkungan kolaboratif diantara mahasiswa terbaik dengan dunia teknologi. 
                </p>
            </div>
            
            <!-- Kolom Gambar (Kanan) -->
            <div class="col-md-6 order-md-2">
                <img src="./asset/Decode.jpg" alt="De Code" class="hero-image">
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,64L48,74.7C96,85,192,107,288,101.3C384,96,480,64,576,48C672,32,768,32,864,32C960,32,1056,32,1152,32C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
    <!-- About Section -->

    <div class="container">
      <div class="mt-3">
        <h3 class="text-center">Data Pengurus De-Code</h3>
    </div>


      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Data Pengurus De-Code
      </div>


        <div class="card-body">

          <!-- Start Button trigger modal -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Data
          </button>
          <!-- End Button trigger modal -->



          <!-- Start Table -->
          <table class="table table-bordered table-striped table-hover mt-3">

            <!-- Start Judul Table -->
            <tr>
              <th>No.</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Divisi</th>
              <th>Jurusan</th>
              <th>Aksi</th>
            </tr>
            <!-- End Judul Table -->

            <?php
            // menampilkan data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tpengurus ORDER BY id_pengurus DESC");
            while($data = mysqli_fetch_array($tampil)) :
            ?>
            <!-- Start Isi Table -->
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['npm'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['divisi'] ?></td>
              <td><?= $data['prodi'] ?></td>
              <td>
                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Edit</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Delete</a>
              </td>
            </tr>
            <!-- End Isi Table -->
            <!-- Awal Modal Edit-->
            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Pengurus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form  method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id_pengurus" value="<?= $data['id_pengurus']?>">
                    <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">NPM</label>
                          <input type="text" class="form-control" name="tnpm" value="<?=$data['npm']?>"  placeholder="Masukkan NPM">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nama</label>
                          <input type="text" class="form-control" name="tnama" value="<?=$data['nama']?>"  placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Divisi</label>
                          <select class="form-select" name="tdivisi">
                            <option value="<?=$data['divisi']?>"><?= $data['divisi']?></option>
                            <option value="Graphic Design">Graphic Design</option>
                            <option value="Sosmed Media">Sosial Media</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Talent Management">Telent Management</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Prodi</label>
                          <select class="form-select" name="tprodi">
                            <option value="<?=$data['prodi']?>"><?= $data['prodi']?></option>
                            <option value="Informatika">Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Rekayasa Sistem Komputer">Rekayasa Sistem Komputer</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bubah">Edit</button>
                      <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Akhir Modal Edit-->


            <!-- Awal Modal Hapus-->
            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form  method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id_pengurus" value="<?= $data['id_pengurus']?>">
                    <div class="modal-body">
                      <h5 class="text-center">Hapus Data?<br>
                      <span class="text-danger"><?= $data['npm']?> - <?= $data['nama']?></span>
                      <h5>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bhapus">Delete</button>
                      <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Akhir Modal Hapus-->
            <?php endwhile; ?>
          </table>
          <!-- End Table -->

          

          <!-- Awal Modal Tambah-->
          <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pengurus</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="POST" action="aksi_crud.php">
                  <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="tnpm"  placeholder="Masukkan NPM">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="tnama"  placeholder="Masukkan Nama">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Divisi</label>
                        <select class="form-select" name="tdivisi">
                          <option></option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option value="Sosmed Media">Sosial Media</option>
                          <option value="Bisnis">Bisnis</option>
                          <option value="Human Resource Development">Human Resource Development</option>
                          <option value="Talent Management">Telent Management</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <select class="form-select" name="tprodi">
                          <option></option>
                          <option value="Informatika">Informatika</option>
                          <option value="Sistem Informasi">Sistem Informasi</option>
                          <option value="Rekayasa Sistem Komputer">Rekayasa Sistem Komputer</option>
                        </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Akhir Modal Tambah-->

          
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,245.3C384,267,480,277,576,250.7C672,224,768,160,864,160C960,160,1056,224,1152,250.7C1248,277,1344,267,1392,261.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

              <!-- Artikel -->
              <section id="artikel" style="background-color: #e2edff;">
                <div class="container">
                  <div class="row text-center">
                    <div class="col">
                      <h2>Artikel</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="card">
                        <img src="./asset/belajar.jpg" class="card-img-top" alt="pengalaman/pembelajaran">
                        <div class="card-body">
                          <p class="card-text">Belajar Bersama</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card">
                        <img src="./asset/online.jpg" class="card-img-top" alt="pengalaman/pembelajaran">
                        <div class="card-body">
                          <p class="card-text">Belajar via zoom</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card">
                        <img src="./asset/bootcamp.jpg" class="card-img-top" alt="pengalaman/pembelajaran">
                        <div class="card-body">
                          <p class="card-text">Bootcamp</p>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,160C384,171,480,149,576,149.3C672,149,768,171,864,197.3C960,224,1056,256,1152,240C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
              </section>
              <!-- Artikel -->

              <!-- footer -->
              <footer class="bg-primary text-white text-center pb-5">
                <p>Created with by <a href="https://www.instagram.com/ric_sumar_tian?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white fw-bold">Eric Sumartian</a></p>
              </footer>
              <!-- footer -->

    <script src="./Boostraps/js/bootstrap.min.js"></script>
  </body>
</html>