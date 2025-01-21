<?php
session_start();
include 'db.php';
//Tangkap Data Dari form
if($_SERVER['REQUEST_METHOD']==="POST"){
    $nama_customer = $_POST['nama_customer'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $waktu = $_POST['waktu'];
    $jumlah = $_POST['jumlah_tamu'];
    $status = $_POST['belum_konfirmasi'];
    $pesan = $_POST['pesan'];

    $query =$koneksi->prepare("INSERT INTO bookings (nama_customer, email, no_telp, waktu, jumlah_tamu, status, pesan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssssss", $nama_customer, $email, $no_telp, $waktu, $jumlah, $status, $pesan);

    if ($query->execute()) {
        // Jika berhasil, set session variable
        $_SESSION['booking_success'] = true;
    } else {
        // Jika gagal, set session variable
        $_SESSION['booking_failed'] = true;
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Booking Disini</h5>
                <h1 class="mb-5">Booking Meja</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Booking Meja Online Disini</h1>
                        <form action="" method="POST" >
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="nama_customer" placeholder="Your Name" required>
                                        <label for="name">Nama Kamu</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Email Kamu</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="telepon" name="no_telp" pattern="^(?:\+62|0)[1-9][0-9]{7,11}$" placeholder="Your telepon">
                                        <label for="telepon">No. HP Kamu (+62xxx/0xxx)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="datetime-local" name="waktu" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" required/>
                                        <label for="datetime">Pilih Tanggal dan Waktu</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1" name="jumlah_tamu">
                                          <option value="1-Orang">1-Orang</option>
                                          <option value="2-Orang">2-Orang</option>
                                          <option value="3-Orang">3-Orang</option>
                                          <option value="4-Orang">4-Orang</option>
                                          <option value="5-Orang-Lebih">5-Orang-Lebih</option>
                                        </select>
                                        <label for="select1">Jumlah Orang</label>
                                      </div>
                                </div>
                                <input type="hidden" name="belum_konfirmasi" value="belum-konfirmasi">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" name="pesan" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Booking Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_SESSION['booking_success'])) {
                    echo "<h5 class='text-success'>Booking Anda telah berhasil!</h5><br><h5 class='text-success'>Jika ingin booking anda di Konfirmasi, silakan hubungi kami melalui WhatsApp di nomor <strong>081216169510</strong></h5>";
                    unset($_SESSION['booking_success']); // Hapus sesi setelah ditampilkan
                } elseif (isset($_SESSION['booking_failed'])) {
                    echo "Gagal melakukan booking. Silakan coba lagi.";
                    unset($_SESSION['booking_failed']); // Hapus sesi setelah ditampilkan
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
        

<?php include 'partials/footer.php'; ?>
