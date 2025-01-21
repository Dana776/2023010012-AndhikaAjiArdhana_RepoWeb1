<?php include 'partials/header.php';?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


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
        
        <?php include 'partials/footer.php';?>