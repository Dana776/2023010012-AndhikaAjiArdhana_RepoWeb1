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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kelola Halaman contact</h1>
                    <!-- Pemberitahuan Crud -->
                    <div class="card shadow mb-4">
                        <h3 class="h5 mb-2 mt-2">Pesan Akan Muncul Dibawah ini jika berhasil atau gagal Delete Data Contact</h3>
                        <?php
                            //alert delete data
                            if(isset($_GET['delete-berhasil']) && $_GET['delete-berhasil'] == 1){
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Behasil Delete Menu
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if(isset($_GET['delete-gagal']) && $_GET['delete-gagal'] == 1){
                                echo "
                                <div class='alert alert-dangeralert-dismissible fade show w-100' role='alert'>
                                    Gagal Delete Menu
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                        ?>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable7" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Subjek</th>
                                            <th>Pesan</th>
                                            <th>DiBuat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Subjek</th>
                                            <th>Pesan</th>
                                            <th>DiBuat</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM tb_contacts";
                                        $tampilkan = mysqli_query($koneksi,$query);

                                        while($data = $tampilkan->fetch_assoc()):?>
                                        <tr>
                                            <td><?= $data['nama_customer']?></td>
                                            <td><?= $data['email']?></td>
                                            <td><?= $data['subjek']?></td>
                                            <td><?= $data['pesan']?></td>
                                            <td><?= $data['created_at']?></td>
                                           
                                            <!-- Tombol Delete -->
                                            <td>
                                            <button class="btn btn-danger btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#delete-contactModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-nama="<?= $data['nama_customer'] ?>"
                                                data-email="<?= $data['email'] ?>">
                                                <span class="icon text-white-50"><i class="fas fa-trash"></i></span> <span class="text">Delete</span>
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

     <!-- Modal Delete -->
     <div class="modal fade-show" id="delete-contactModal" tabindex="-1" role="dialog" aria-labelledby="delete-contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-contactModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <div class="mb-2">
            <i class="bi bi-trash3-fill text-danger display-1 mx-auto"></i>
            </div>
                <h3 class="h3">Apakah Anda yakin ingin menghapus data contact ini?</h3> 
                <h5 class="h5">Nama Customer: <strong id="delete-nama"></strong></h5>
                <h5 class="h5">Email: <strong id="delete-email"></strong></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>
    <?php include 'partials/footer.php'?>

    <script>
$('#confirmDelete').on('click', function() {
    var id = $(this).data('id'); // Mengambil ID dari tombol konfirmasi
    // Lakukan aksi delete, misalnya mengarahkan ke URL delete
    window.location.href = 'api/contact/delete.php?id=' + id; // Ganti dengan URL delete yang sesuai
});
$('#delete-contactModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nama = button.data('nama');
    var email = button.data('email');

    var modal = $(this);
    modal.find('#delete-id').val(id);
    modal.find('#delete-nama').text(nama);
    modal.find('#delete-email').text(email);
    modal.find('#confirmDelete').data('id', id); // Menyimpan ID ke tombol konfirmasi


});
            </script>