<?php
session_start();
include 'db.php';
//Tangkap Data Dari form
if($_SERVER['REQUEST_METHOD']==="POST"){
    $nama_customer = $_POST['nama_customer'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    $query =$koneksi->prepare("INSERT INTO tb_contacts (nama_customer, email, subjek, pesan) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $nama_customer, $email, $subjek, $pesan);

    if ($query->execute()) {
        // Jika berhasil, set session variable
        $_SESSION['contact_success'] = true;
    } else {
        // Jika gagal, set session variable
        $_SESSION['contact_failed'] = true;
    }

    $query->close();
    $koneksi->close();

    // Redirect ke halaman yang sama untuk menampilkan modal
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

}
?>
<?php include 'partials/header.php';?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                    <h1 class="mb-5">Kontak Kami</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Booking</h5>
                                <a href="https://api.whatsapp.com/send?phone=6281216169510" target="_blank"><p><i class="fab fa-whatsapp text-primary me-2"></i>081216169510</p></a>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">General</h5>
                                <a href="https://www.instagram.com/new.taman.kelapa/"><p><i class="fab fa-instagram text-primary me-2"></i>Ig.Restoran</p></a>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Technical</h5>
                                <a href="https://api.whatsapp.com/send?phone=6281216169510" target="_blank"><p><i class="fab fa-whatsapp  text-primary me-2"></i>081216169510</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.8237204640004!2d110.78632657356327!3d-6.7912929664154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dcb6bea61729%3A0x660602b534729cf8!2sTaman%20Kelapa!5e0!3m2!1sid!2sid!4v1734886270980!5m2!1sid!2sid"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="nama_customer" placeholder="Nama Kamu">
                                            <label for="name">Nama Kamu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Kamu">
                                            <label for="email">Email Kamu</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subjek" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="pesan" name="pesan" style="height: 150px"></textarea>
                                            <label for="pesan">Pesan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">TERIMAKASIH SARAN & KRITIK NYA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_SESSION['contact_success'])) {
                    echo "<p class='text-success'><strong>TERIMAKASIH ATAS SARAN DAN KRITIK NYA!.</strong></p><hr><p class='text-success'><strong>Kami Akan Berusaha Sebaik Mungkin Untuk Membuat Pelanggan Merasa Nyaman.</strong></p><hr><p class='text-success'><strong>SIlahkan Whatsapp Kami Agar Lebih Cepat Direspon</strong></p>";
                    unset($_SESSION['contact_success']); // Hapus sesi setelah ditampilkan
                } elseif (isset($_SESSION['contact_failed'])) {
                    echo "<p class='text-danger'>Gagal melakukan Kirim Saran. Silakan coba lagi.</p>";
                    unset($_SESSION['contact_failed']); // Hapus sesi setelah ditampilkan
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="https://api.whatsapp.com/send?phone=6281216169510" class="btn btn-primary"><i class="fab fa-whatsapp"></i> Hubungi Sekarang</a>
            </div>
        </div>
    </div>
</div>

        <?php include 'partials/footer.php';?>
