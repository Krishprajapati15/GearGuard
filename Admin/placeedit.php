<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Add Place</title>
</head>
<style>
    .text-type-number::-webkit-inner-spin-button,
.text-type-number::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.text-type-number {
    -moz-appearance: textfield;
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
                        <h4>Add Place</h4>
                    </div>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Place Name <b style="color:red">*</b></label>
                                        <input type="text" name="p_name" value="Rajvant Palace" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category <b style="color:red">*</b></label>
                                        <input type="text" name="p_cat" value="Historical" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Entry Fee <b style="color:red">*</b></label>
                                        <input type="number" class="text-type-number form-control" value="100" name="p_fee" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Address <b style="color:red">*</b></label>
                                        <input type="text" name="p_fee" value="Rajpipla, Gujarat" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Latitude <b style="color:red">*</b></label>
                                        <input type="number" class="text-type-number form-control" value="21.86880000" name="p_lat" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Longitude <b style="color:red">*</b></label>
                                        <input type="number" class="text-type-number form-control"value="73.50730000" name="p_long" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Opening Time <b style="color:red">*</b></label>
                                        <input type="time" class="form-control" name="p_open" value="07:00" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Closing Time <b style="color:red">*</b></label>
                                        <input type="time" class="form-control" name="p_close" value="08:00" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Mobile Number<b style="color:red">*</b></label>
                                        <input type="number" name="h_owner_mobile_no" id="mobile-input" value="9978343950" class="text-type-number form-control" pattern="\d{10}" title="Please enter exactly 10 digits." required>
                                        <span id="error-message" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Discription <b style="color:red">*</b></label>
                                        <textarea name="p_disc" style="height: auto;" require>A grand heritage palace built by Maharaja Vijaysinhji, now a luxury heritage hotel.</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event Image <b style="color:red">*</b>   </label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="productImage" id="fileUpload" required>
                                        </div>
                                        <p style="font-weight: bold; color: red;">Image: rajvant.png</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-submit me-2">
                                    <a href="placelist" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const mobileInput = document.getElementById('mobile-input');
            const errorMessage = document.getElementById('error-message');
            const submitBtn = document.getElementById('submit-btn');
    
            // Function to validate the mobile number
            function validateMobileNumber() {
                const mobileNumber = mobileInput.value;
    
                // Check if the input matches the pattern for a 10-digit number
                const isValid = /^\d{10}$/.test(mobileNumber);
    
                if (!isValid) {
                    errorMessage.textContent = 'Please enter a valid 10-digit mobile number.';
                    submitBtn.disabled = true; // Disable submit button
                } else {
                    errorMessage.textContent = '';
                    submitBtn.disabled = false; // Enable submit button
                }
            }
    
            // Attach the validation function to the input event
            mobileInput.addEventListener('input', validateMobileNumber);
    
            // Initial validation in case the field has a default value
            validateMobileNumber();
        </script>
        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../assets/js/feather.min.js"></script>
    
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
    
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
        <script src="../assets/plugins/select2/js/select2.min.js"></script>
    
        <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>
    
        <script src="../assets/js/script.js"></script>
</body>

</html>