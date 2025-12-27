<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Place Details</title>
</head>
<style>
    h6 li{
        list-style:disc;
        margin-left: 16px;
    }
</style>
<body>
    <div class="main-wrapper">

        <?php 
            include("header.php");
        ?>


        <?php
            include("sidebar.php");
        ?>

        <div class="page-wrapper">
            <div class="content">
                <!-- alert-box -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Place Details</h4>
                        <h6>Full details of Place</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Place Name</h4>
                                            <h6>
                                                Rajvant Palace
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Category</h4>
                                            <h6>
                                                Historical
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Discription</h4>
                                            <h6>
                                                A grand heritage palace built by Maharaja Vijaysinhji, now a luxury heritage hotel.
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Rating</h4>
                                            <h6>
                                                4.70
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Location</h4>
                                            <h6>
                                                Rajpipla, Gujarat
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Latitude</h4>
                                            <h6>
                                                21.86880000
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Longitude</h4>
                                            <h6>
                                                73.50730000
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Time</h4>
                                            <h6>
                                                08:00 AM - 07:00 PM
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Entry Fee</h4>
                                            <h6>
                                                100
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Contact Number</h4>
                                            <h6>
                                                +91-9978343950
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme product-slide">
                                        <div class="slider-product">
                                            <img src="../assets/img/SSIP_logo.png" alt='img'>
                                            <h4>Place Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>