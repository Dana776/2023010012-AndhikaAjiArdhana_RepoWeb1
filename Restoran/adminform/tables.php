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
                    <h1 class="h3 mb-2 text-gray-800">Table Menu</h1>
                    <!-- Pemberitahuan Crud -->
                    <div class="card shadow mb-4">
                        <h3 class="h5 mb-2 mt-2">Pesan Akan Muncul Dibawah ini jika berhasil atau gagal Upload/Update/Delete Menu</h3>
                    <?php
                    if(isset($_GET['success']) && $_GET['success'] == 1) {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                            Data Menu Berhasil Ditambahkan!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
                    if(isset($_GET['error']) && $_GET['error'] == 1){
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show w-100' role='alert'>
                            Gagal Menambahkan Data!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
                    if(isset($_GET['gagal']) && $_GET['gagal'] == 1){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show w-100' role='alert'>
                            Gagal Upload Files!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
                    //alert update data
                    if(isset($_GET['update-berhasil']) && $_GET['update-berhasil'] == 1){
                        echo "
                        <div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
                            Behasil Update Menu
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
                    if(isset($_GET['update-gagal']) && $_GET['update-gagal'] == 1){
                        echo "
                        <div class='alert alert-dange ralert-dismissible fade show w-100' role='alert'>
                            Gagal Update Menu
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
                    if(isset($_GET['upload-required']) && $_GET['upload-required'] == 1){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show w-100' role='alert'>
                            Pastikan Anda Tidak lupa Upload Gambar!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times</button>
                        </div>";
                    }
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-square"></i> Tambah Menu 
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Tambah Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="text-center">Isi Menu Baru</h1>
                                        <div class="container">
                                            <form action="api/menu/create.php" method="post" enctype="multipart/form-data">
                                                <div class="form-grup mt-2">
                                                    <div class="custom-file">
                                                    <label class="custom-file-label" for="inputGroupFile01" >Upload Gambar</label>
                                                    <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile01" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add-nama" class="form-label">Nama Menu</label>
                                                    <input type="text" name="nama" class="form-control" id="add-nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add-kategori" class="form-label">Kategori</label>
                                                    <select name="kategori" id="add-kategori" class="custom-select custom-select-md">
                                                        <option value="makanan">Makanan</option>
                                                        <option value="minuman">Minuman</option>
                                                        <option value="catering">Catering</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add-harga" class="form-label">Harga</label>
                                                    <input type="number" name="harga" id="add-harga" class="form-control" required>
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
                                <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <!-- <th>DiBuat</th> -->
                                            <th>DiUpdate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <!-- <th>DiBuat</th> -->
                                            <th>DiUpdate</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM menus";
                                        $tampilkan = mysqli_query($koneksi,$query);

                                        while($data = $tampilkan->fetch_assoc()):?>
                                        <tr>
                                            <td><img src="uploads/<?= $data['gambar']?>" alt="gambar" width="80"></td>
                                            <td><?= $data['nama']?></td>
                                            <td><?= $data['harga']?></td>
                                            <td><?= $data['kategori']?></td>
                                            <!-- <td><?php  //$data['created_at']?></td> -->
                                            <td><?= $data['updated_at']?></td>

                                            <!-- Tombol Update -->
                                            <td><button class="btn btn-warning btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#updateModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-gambar="<?= $data['gambar'] ?>"
                                                data-nama="<?= $data['nama']; ?>"
                                                data-harga="<?= $data['harga']; ?>"
                                                data-kategori="<?= $data['kategori']; ?>">
                                                <span class="icon text-white-50"><i class="fas fa-pen"></i></span> <span class="text">Update</span>
                                            </button>
                                            <hr>
                                            <!-- Tombol Delete -->
                                            <button class="btn btn-danger btn-icon-split btn-sm border border-dark" data-toggle="modal" data-target="#deleteModal" 
                                                data-id="<?= $data['id']; ?>" 
                                                data-gambar="<?= $data['gambar'] ?>"
                                                data-nama="<?= $data['nama']; ?>">
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

                        <!-- Modal Update -->
        <div class="modal fade-shadow" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="api/menu/update_menu.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">Update Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="update-id" >
                            <div class="form-group">
                            <label for="update-gambar" class="form-label">Gambar Lama</label>
                            <div class="mb-2">
                                <img id="current-image" src="" alt="Gambar Saat Ini" width="100" class="img-thumbnail">
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="update-gambar">Pilih Gambar Baru</label>
                                <input type="file" name="gambar" class="custom-file-input" id="update-gambar">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="update-nama" class="form-label">Nama Menu</label>
                                <input type="text" name="nama" class="form-control" id='update-nama' required>
                            </div>
                            <div class="form-group">
                                <label for="update-kategori-option" class="form-label">Kategori</label>
                                    <select name="kategori" id="update-kategori-option" class="custom-select custom-select-md">
                                        <option value="makanan">Makanan</option>
                                        <option value="minuman">Minuman</option>
                                        <option value="catering">Catering</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="update-harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id='update-harga' class="form-control" required>
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
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <div class="mb-2">
            <i class="bi bi-trash3-fill text-danger display-1 mx-auto"></i>
            </div>
            <h3 class="h3">Apakah Anda Yakin Akan Menghapus Menu ini?</h3> 
            <img id="current-image" src="" alt="Gambar Saat Ini" width="100" class="img-thumbnail">
            <h5 class="h5">Nama: <strong id="delete-nama"></strong></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>
            <!-- End of Main Content -->
            <?php include 'partials/footer.php'?>
                <!-- Algoritma Pencarian -->

            <script>
                
                $(document).ready(function() {
    // Destroy the existing DataTable instance if it exists
    if ($.fn.DataTable.isDataTable('#dataTable')) {
        $('#dataTable').DataTable().destroy();
    }

    // Initialize DataTable
    $('#dataTable').DataTable({
        // Your DataTable options here
    });
});

$(document).ready(function() {
    // Inisialisasi DataTables
    var table = $('#dataTable').DataTable({
        "searching": true, // Fitur pencarian diaktifkan
        "info": false, // Menyembunyikan informasi tabel
        "lengthChange": false // Menyembunyikan opsi jumlah baris
    });

    // Menghubungkan input pencarian dengan DataTables
    $('#customSearch').on('keyup', function() {
        table.search(this.value).draw(); // Melakukan pencarian berdasarkan input
    });
});
        
$('#updateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button yang diklik
    var id = button.data('id');
    var gambar = button.data('gambar');
    var nama = button.data('nama');
    var harga = button.data('harga');
    var kategori = button.data('kategori');

    var modal = $(this);
    modal.find('#update-id').val(id);
    modal.find('#current-image').attr('src', 'uploads/' + gambar);
    modal.find('#update-nama').val(nama);
    modal.find('#update-harga').val(harga);
    modal.find('#update-kategori option').each(function () {
    if ($(this).val() === kategori) {
        $(this).prop('selected', true);
    }
});

});
$('#confirmDelete').on('click', function() {
    var id = $(this).data('id'); // Mengambil ID dari tombol konfirmasi
    // Lakukan aksi delete, misalnya mengarahkan ke URL delete
    window.location.href = 'api/menu/delete_menu.php?id=' + id; // Ganti dengan URL delete yang sesuai
});
$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var gambar = button.data('gambar');
    var nama = button.data('nama');

    var modal = $(this);
    modal.find('#delete-id').val(id);
    modal.find('#current-image').attr('src', 'uploads/' + gambar);
    modal.find('#delete-nama').text(nama);
    modal.find('#confirmDelete').data('id', id); // Menyimpan ID ke tombol konfirmasi


});
            </script>

