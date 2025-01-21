<!-- Include Header -->
<?php 
session_start();
// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php?belum_login=1");
    exit();
}
include 'partials/header.php';
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                                  <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kelola Tampilan Testimonial Di Halaman Service</h1>
                    <!-- Pemberitahuan Crud -->
                    <div class="card shadow mb-4">
                        <h3 class="h5 mb-2 mt-2">Pesan Akan Muncul Dibawah ini Jika berhasil Update Testimonial di Halaman Service </h3>
                        <?php
                            if (isset($_GET['success_update']) && $_GET['success_update'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Text Testimoanial Berhasil DiUpdate!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if(isset($_GET['gagal']) && $_GET['gagal'] == 1){
                                echo "
                                <div class='alert alert-warning alert-dismissible fade show w-100' role='alert'>
                                    Gagal Ubah Text!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if (isset($_GET['error']) && $_GET['error'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Gagal Menambahkan Text Halaman Service!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                                </div>";
                            }
                            if (isset($_GET['error_update']) && $_GET['error_update'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Gagal Update Text Halaman Service!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                                </div>";
                            }
                            if(isset($_GET['update-berhasil']) && $_GET['update-berhasil'] == 1){
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Behasil Update Text Halaman Service
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if(isset($_GET['update-gagal']) && $_GET['update-gagal'] == 1){
                                echo "
                                <div class='alert alert-dange ralert-dismissible fade show w-100' role='alert'>
                                    Gagal Update Text Halaman Service
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                        ?>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>Via</th>
                                            <th>Keterangan</th>
                                            <th>Di Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>Via</th>
                                            <th>Keterangan</th>
                                            <th>Di Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM tb_testimoni";
                                        $tampilkan = mysqli_query($koneksi,$query);

                                        while($data = $tampilkan->fetch_assoc()):?>
                                        <tr>
                                            <td><?= $data['nama']?></td>
                                            <td><?= $data['via']?></td>
                                            <td><?= $data['keterangan']?></td>
                                            <td><?= $data['updated_at']?></td>
            
                                            <!-- Tombol Update -->
                                            <td><button class="btn btn-warning btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#update-testimoniModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-nama="<?= $data['nama']; ?>"
                                                data-via="<?= $data['via']; ?>"
                                                data-keterangan="<?= $data['keterangan']; ?>">
                                                <span class="icon text-white-50"><i class="fas fa-pen"></i></span> <span class="text">Update</span>
                                            </button>
                                            </td>

                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->
 <!-- Modal Update -->
<div class="modal fade-shadow" id="update-testimoniModal" tabindex="-1" role="dialog" aria-labelledby="update-testimoniModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="api/testimoni/update.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-testimoniModalLabel">Update Tampilan Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="h3">Update Tampilan Service</h3>
                    <input type="hidden" name="id" id="update-id"> 
                    <div class="form-group">
                        <label for="update-nama" class="form-label">Update Keterangan Chef</label>
                        <input type="text" id="update-nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update-via" class="form-label">Update Keterangan Makanan</label>
                        <input type="text" id="update-via" name="via" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update-keterangan" class="form-label">Update Keterangan Order</label>
                        <textarea class="form-control" id="update-keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php include 'partials/footer.php'?>

    <script>
$('#update-testimoniModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Ketika Button yang diklik
    var id = button.data('id');
    var nama = button.data('nama');
    var via = button.data('via');
    var keterangan = button.data('keterangan');

    var modal = $(this);
    modal.find('#update-id').val(id);
    modal.find('#update-nama').val(nama);
    modal.find('#update-via').val(via);
    modal.find('#update-keterangan').val(keterangan);

});
            </script>