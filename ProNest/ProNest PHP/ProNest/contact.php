<?php
    include_once('include/header.php');
?>

<!--main_product_banner start-->

<!--contact us start-->
<div class="contact_us">
        <h2>Contect Us</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 left">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>Address</h4>
                            <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>Phone</h4>
                            <p> +91 58965874526</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>Email</h4>
                            <p> sales@pronestcx.com</p>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-sm-6">
                    <div class="form mt-5 right">
                        <h3 class="text-left">Request a Quote</h3>

                        <form  id="quoteForm">
                            <!-- First Row (Personal Information) -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your last name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact" id="contact" placeholder="Enter your contact number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                                </div>
                            </div>
                
                            <!-- Second Row (Business Information) -->
                            <div class="row mb-3">
                                
                                <div class="col-md-6">
                                    <label for="sum_insured" class="form-label">Post Code</label>
                                    <input type="number" class="form-control" name="post_code" id="post_code" placeholder="Enter sum insured" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="self_contained" class="form-label">Our Products</label>

                                    <?php
                                        include "admin/config.php";
                                        $sql = "SELECT * FROM our_products"; // Replace 'our_products' with your actual table name
                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                        if (mysqli_num_rows($result) > 0) {
                                            echo '<select class="form-select" name="pname" id="self_contained" required>
                                            <option value="" selected disabled>Select Product</option>';
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option value='{$row['ID']}'>{$row['product_name']}</option>";
                                            }
                                                echo "</select>";
                                            }
                                            
                                    ?>
                                    
                                </div>

                            </div>
                
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    
                                </div>
                            </div>
                
                            <!-- Submit Button -->
                            <div class="text-left">
                                <button type="submit" class="btn">Submit</button>
                            </div>

                            

                        </form>

                        <div id="response-messages" class="mb-3">
                        <div class="alert alert-success d-none" id="success-message" role="alert">
                            Data inserted successfully!
                        </div>
                        <div class="alert alert-danger d-none" id="error-message" role="alert">
                            There was an error inserting the data. Please try again.
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function () {
        $('#quoteForm').on('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            // Serialize form data
            const formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: 'form_data.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response === 'success') {
                        $('#success-message').removeClass('d-none').fadeIn();
                        $('#error-message').addClass('d-none');
                        $('#quoteForm')[0].reset(); // Clear form fields
                    } else {
                        $('#error-message').removeClass('d-none').fadeIn();
                        $('#success-message').addClass('d-none');
                    }
                },
                error: function () {
                    $('#error-message').removeClass('d-none').fadeIn();
                    $('#success-message').addClass('d-none');
                }
            });
        });
    });
</script>



<?php
     include_once('include/footer.php');
?>