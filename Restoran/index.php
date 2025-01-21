<?php
    include 'partials/header.php';
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <?php 
                                $query = "SELECT * FROM home";
                                $show = mysqli_query($koneksi,$query);

                                while($data = $show->fetch_assoc()):
                            ?>
                            <h1 class="display-3 text-white animated slideInLeft"><?= $data['judul1'];?><br><?= $data['judul2'];?></h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"><?= $data['keterangan'];?></p>
                            <?php endwhile;?>
                            <a href="booking.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Booking Meja</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Chef-Chef Kami</h5>
                                <p>Chef Kami sudah memiliki banyak pengalaman di bidang F&B <br><br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Kualitas makanan</h5>
                                <p>Kami memilih bahan-bahan dasar terbaik dan fresh, sehingga menghasilkan makanan yang enak.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Order Online</h5>
                                <p>Untuk Order Online sementara kami menggunakan GrabFood, GoFood dan ShopeeFood.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Pelayanan kami</h5>
                                <p>Kami buka setiap hari dari pukul 10:00 - 21:00 <br><br><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


                <!-- About Start -->
                <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <?php 
                                $query = "SELECT * FROM about";
                                $show = mysqli_query($koneksi,$query);
                                
                                while($data = $show->fetch_assoc()):
                                ?>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="adminform/uploads/<?= $data['gambar1']; ?>" alt="Image">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="adminform/uploads/<?= $data['gambar2']; ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="adminform/uploads/<?= $data['gambar3']; ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="adminform/uploads/<?= $data['gambar4']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Selamat Datang di <i class="fa fa-utensils text-primary me-2"></i>TAMAN KELAPA RESTO</h1>
                        <p class="mb-4"><?= $data['ket1'];?></p>
                        <p class="mb-4"><?= $data['ket2'];?></p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up"><?= $data['pengalaman'];?></h1>
                                    <div class="ps-4">Tahun</p>
                                        <h6 class="text-uppercase mb-0">Pengalaman</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up"><?= $data['booking'];?></h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Meja</p>
                                        <h6 class="text-uppercase mb-0">Yang Di Booking Pertahun</h6>
                                    </div>
                                    <?php endwhile;?>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


       <!-- Menu Start -->
       <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Makanan</h5>
                    <h1 class="mb-5">Rekomendasi</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Makanan</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Special</small>
                                    <h6 class="mt-n1 mb-0">Minuman</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-boxes fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Lovely</small>
                                    <h6 class="mt-n1 mb-0">Catering</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                            <?php 
                                $query = "SELECT * FROM menus WHERE kategori = 'makanan'";
                                $tampilkan = mysqli_query($koneksi,$query);

                                while($data = $tampilkan->fetch_assoc()):?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="adminform/uploads/<?= $data['gambar']?>" alt="" style="width: 80px; height: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?= $data['nama'] ?></span>
                                                <span class="text-primary"><?= $data['harga']?>K</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $query = "SELECT * FROM menus WHERE kategori = 'minuman'";
                                $tampilkan = mysqli_query($koneksi,$query);

                                while($data = $tampilkan->fetch_assoc()):?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="adminform/uploads/<?= $data['gambar']?>" alt="" style="width: 80px; height: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?= $data['nama'] ?></span>
                                                <span class="text-primary"><?= $data['harga']?>K</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12" style="margin-left: 300px;">
                                    <div class="d-flex">
                                    <?php 
                                    $query = "SELECT * FROM menus WHERE kategori = 'catering'";
                                    $tampilkan = mysqli_query($koneksi,$query);

                                    while($data = $tampilkan->fetch_assoc()):?>
                                        <div class="d-flex">
                                            <img src="adminform/uploads/<?= $data['gambar']?>" alt="">
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


                <!-- Testimonial Start -->
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Komentar Para Pendatang!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                                <?php 
                                $query = "SELECT * FROM tb_testimoni";
                                $showtesti = mysqli_query($koneksi,$query);
                                
                                while($data1 = $showtesti->fetch_assoc()):
                                ?>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p><?= $data1['keterangan'];?><p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1"><?= $data1['nama'];?></h5>
                                <small>Via <?= $data1['via'];?></small>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        
<!-- FOOTER -->
        <?php
    include 'partials/footer.php';
?>