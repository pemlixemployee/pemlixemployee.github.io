<?php
    include_once('include/header.php');
?>

<!--main_product_banner start-->

<section class="main_product_banner" class="container-fluid">

    <img src="images/main_home_improvement_banner.jpg">

        <div class="product_name_background">
            <h1>Home Improvement</h1>
        </div>

</section>

<!--main_product_banner end-->


<!--main_product_section_one start-->

<section class="main_product_section_one container-fluid">
    <div class="product_desc">
        <h2>Why we use Home Improvement?</h2>
        <p>Solar panels harness sunlight, a renewable and inexhaustible energy source, 
            to generate electricity, reducing reliance on finite fossil fuels like coal 
            and natural gas. This clean energy solution lowers greenhouse gas emissions, combats 
            climate change, and minimizes air pollution. By producing your own electricity, solar 
            panels significantly reduce or eliminate monthly bills, offering long-term cost savings 
            and protection against rising energy prices. Additionally, they enhance energy independence 
            by empowering individuals and communities to rely less on centralized power grids and foreign 
            energy sources, bolstering energy security and resilience.</p>
    </div>
</section>

<!--main_product_section_one end-->


<!--jumpto_second(copied from home) start-->
<section id="jumpto_second">
    <div class="container">
        <h3>All Products Related to Home Improvement</h3>
        <p>
            Comprehensive solutions for all your home improvement needs.
        </p>

        <div class="row" id="product-cards">
            <!-- First 4 cards shown by default -->
            <div class="fours">
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Energy Efficient Doors _pro.jpg" alt="spray foam insulation">
                        <div class="card-body">
                            <h4 class="card-title">Energy Efficient Doors </h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_energy_efficient_doors.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Stylish Doors_pro.webp" alt="Fiberglass insulation">
                        <div class="card-body">
                            <h4 class="card-title">Stylish Doors</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_stylish_doors.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Modern Kitchens  _pro.jpg" alt="Rockwool insulation">
                        <div class="card-body">
                            <h4 class="card-title">Modern Kitchens</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_modern_kitchens.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Bathroom Renovations_pro.jpg" alt="Mineral wool insulation">
                        <div class="card-body">
                            <h4 class="card-title">Bathroom Renovations</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_bathroom_renovations.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional hidden cards -->
            <div class="fours additional-cards" style="display: none;">
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Outdoor living spaces_pro.jpeg" alt="Sheep Wool">
                        <div class="card-body">
                            <h4 class="card-title">Outdoor living spaces</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_outdoor_living_spaces.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Innovative lighting solutions_pro.jpg" alt="Sheep Wool">
                        <div class="card-body">
                            <h4 class="card-title">Innovative lighting solutions</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_innovative_lighting_solutions.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Basement renovations_pro.jpg" alt="Sheep Wool">
                        <div class="card-body">
                            <h4 class="card-title">Basement renovations</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_basement_renovations.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Green Remodeling_pro.jpg" alt="Sheep Wool">
                        <div class="card-body">
                            <h4 class="card-title">Green Remodeling</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_green_remodeling.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/Home Restoration_pro.jpg" alt="Sheep Wool">
                        <div class="card-body">
                            <h4 class="card-title">Home Restoration</h4>
                            <h5>Home Improvement Product</h5>
                            <a href="sub_home_restoration.php" class="btn">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

        <div class="text-center">
            <button id="show-more-btn" class="btn btn-primary">Show More</button>
        </div>
        <div class="text-center">
            <button id="show-less-btn" class="btn btn-primary">Show Less</button>
        </div>
    </div>
</section>

<!--jumpto_second(copied from home) end -->


<!--contact_details start -->
<section class="con_details container-fluid">
        <h3>Do you have any queries?<span> Connect to us</span></h3>
        <div class="row">
            <div class="col-sm-4 con">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <h5>Address: Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
            </div>
            <div class="col-sm-4 con">
                <i class="fa fa-phone-square" aria-hidden="true"></i>
                <h5>Call: +91 8698574126</h5>
            </div>
            <div class="col-sm-4 con">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <h5>Email-Id: abc@gmail.com</h5>
            </div>
        </div>
</section>

<!--contact_details end -->

<?php
     include_once('include/footer.php');
?>