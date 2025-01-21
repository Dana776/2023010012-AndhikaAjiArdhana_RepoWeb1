<!-- Include Header -->
<?php 
session_start();
// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php?belum_login=1");
    exit();
}elseif($_SESSION['role'] === 'staff'){
    header("Location: index.php?bukan-admin=1");
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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kelola User</h1>
                    <!-- Pemberitahuan Crud -->
                    <div class="card shadow mb-4">
                        <h3 class="h5 mb-2 mt-2">Pesan Akan Muncul Dibawah ini jika berhasil atau gagal Upload/Delete Users</h3>
                        <?php
                            if (isset($_GET['success']) && $_GET['success'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Data User Berhasil Ditambahkan!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if (isset($_GET['success_update']) && $_GET['success_update'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Data User Berhasil DiUpdate!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if (isset($_GET['success_delete']) && $_GET['success_delete'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Data User Berhasil DiHapus!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                                </div>";
                            }
                            if (isset($_GET['error']) && $_GET['error'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Gagal Menambahkan Data User!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                                </div>";
                            }
                            if (isset($_GET['error_update']) && $_GET['error_update'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Gagal Update Data User!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                                </div>";
                            }
                            if (isset($_GET['error_delete']) && $_GET['error_delete'] == 1) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                                    Gagal Delete Data User!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                                </div>";
                            }
                        ?>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                            <i class="fas fa-plus-square"></i> Tambah User
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel"> Tambah User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="text-center">Isi Data User</h1>
                                        <div class="container">
                                            <form action="api/users/create_user.php" method="post" enctype="multipart/form-data">
                                                <div class="form-grup">
                                                    <label for="username1" class="form-label">Username</label>
                                                    <input type="text" id="username1" name="username" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password1" class="form-label">Password</label>
                                                    <input type="password" id="password1" name="password" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role" class="form-label">role</label>
                                                    <select name="role" id="role" class="custom-select custom-select-lg">
                                                        <option value="admin">admin</option>
                                                        <option value="staff">staff</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>                          
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <!-- <th>DiBuat</th> -->
                                            <th>DiUpdate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <!-- <th>DiBuat</th> -->
                                            <th>DiUpdate</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $tampilkan = mysqli_query($koneksi,$query);

                                        while($data = $tampilkan->fetch_assoc()):?>
                                        <tr>
                                            <td><?= $data['username']?></td>
                                            <td><?= $data['password']?></td>
                                            <td><?= $data['role']?></td>
                                            <td><?= $data['updated_at']?></td>
                                            <!-- Tombol Update -->
                                            <td><button class="btn btn-warning btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#update-usersModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-username="<?= $data['username'] ?>">
                                                <span class="icon text-white-50"><i class="fas fa-pen"></i></span> <span class="text">Update</span>
                                            </button>
                                            <hr>
                                            <!-- Tombol Delete -->
                                            <button class="btn btn-danger btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#delete-usersModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-username="<?= $data['username'] ?>"
                                                data-role="<?= $data['role'] ?>">
                                                <span class="icon text-white-50"><i class="fas fa-pen"></i></span> <span class="text">Delete</span>
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
<div class="modal fade-shadow" id="update-usersModal" tabindex="-1" role="dialog" aria-labelledby="update-usersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="api/users/update_users.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-usersModalLabel">Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="h3">Update Data Users</h3>
                    <input type="hidden" name="id" id="update-id">
                    <div class="form-group">
                        <label for="update-username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id='update-username' placeholder="Update Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="update-role-option" class="form-label">Role</label>
                        <select name="role" id="update-role-option" class="custom-select custom-select-md">
                            <option value="admin">admin</option>
                            <option value="staff">staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update-password" class="form-label">Password</label>
                        <input type="password" id="update-password" name="password" class="form-control" required>
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

     <!-- Modal Delete -->
     <div class="modal fade-show" id="delete-usersModal" tabindex="-1" role="dialog" aria-labelledby="delete-usersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-usersModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-2">
                <i class="bi bi-trash3-fill text-danger display-1 mx-auto"></i>
                </div>
                <h3 class="h3">Apakah Anda yakin ingin menghapus User ini?</h3> 
                <h5 class="h5">Nama: <strong id="delete-username"></strong></h5>
                <h5 class="h5">Role: <strong id="delete-role"></strong></h5>
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

$('#update-usersModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button yang diklik
    var id = button.data('id');
    var username = button.data('username');
    var password = button.data('password');
    var role = button.data('role');

    var modal = $(this);
    modal.find('#update-id').val(id);
    modal.find('#update-username').val(username);
    modal.find('#update-password').val(password);
    modal.find('#update-role option').each(function () {
    if ($(this).val() === role) {
        $(this).prop('selected', true);
    }
});

});
$('#confirmDelete').on('click', function() {
    var id = $(this).data('id'); // Mengambil ID dari tombol konfirmasi
    // Lakukan aksi delete, misalnya mengarahkan ke URL delete
    window.location.href = 'api/users/delete_users.php?id=' + id; // Ganti dengan URL delete yang sesuai
});
$('#delete-usersModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var username = button.data('username');
    var role = button.data('role');

    var modal = $(this);
    modal.find('#delete-id').val(id);
    modal.find('#delete-username').text(username);
    modal.find('#delete-role').text(role);
    modal.find('#confirmDelete').data('id', id); // Menyimpan ID ke tombol konfirmasi


});
            </script>