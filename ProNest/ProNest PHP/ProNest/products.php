<?php
    include_once('include/header.php');
?>

<!--all_product_banner start-->
<section class="all_product_banner" class="container-fluid">
    <div class="product_banner_area">
        <h1>Our Products</h1>
        <img src="images/all_products.png">
    </div>
</section>
<!--all_product_banner end-->


<!--products start-->
<section class="products">
    <div class="pro_head">
        <h2>Products</h2>
        <p>ProNest is your trusted partner in creating energy-efficient and sustainable homes. 
            We specialize in top-quality solar panels, home insulation, and premium windows and doors improvement. 
            Our solutions enhance your home's comfort, reduce energy costs, and contribute to a greener future. 
            Experience excellence and innovation with ProNest!</p>
    </div>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100 bg-light">
                    <img src="images/Solar Panels_product.jpg" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                        <h5 class="card-title">Solar Panels</h5>
                        <p class="card-text">Save on electricity bills and increase your home’s value with our high-efficiency solar panels. 
                            Enjoy quick returns on investment, minimal maintenance, and energy independence while reducing your 
                            carbon footprint. Contact us for a free consultation and start your journey to renewable energy today!</p>
                        <a href="solar_panel.html" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 bg-light">
                    <img src="images/Home Improvement_product.jpg" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                        <h5 class="card-title">Home Improvement</h5>
                        <p class="card-text">Elevate your living space with our innovative home improvement solutions! Designed to enhance comfort, functionality, 
                            and style, our services transform your home into a sanctuary. Whether it’s a kitchen remodel, bathroom upgrade, or a complete 
                            renovation, we tailor our approach to meet your needs. Contact us today for a free consultation and start creating the home of your dreams!</p>
                        <a href="home_improvement.html" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 bg-light">
                    <img src="images/Windows and Doors Improvement_product.jpg" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                        <h5 class="card-title">Windows and Doors Improvement</h5>
                        <p class="card-text">Enhance your home with our windows and doors improvement solutions! Upgrade to energy-efficient designs that boost security, 
                            curb appeal, and comfort while reducing noise. Transform your living space today, contact us for a free consultation and start 
                            enjoying the benefits of modern windows and doors!</p>
                        <a href="home_insulation.html" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col">
                <div class="card h-100 bg-light">
                    <img src="images/Home Insulation_product.jpg" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                        <h5 class="card-title">Home Insulation</h5>
                        <p class="card-text">Boost your home's energy efficiency with our premium insulation solutions! Designed to keep your space comfortable year-round, our products '
                            reduce energy costs and enhance comfort. Don’t wait, contact us today for a free consultation and start enjoying a cozier, more efficient home!</p>
                        <a href="windows_doors.html" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
    
<!--products end-->

<!--let_us_chat start-->
<section class="let_us_chat">
    <div class="content">
        <h3>Let's Chat!</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
    <button>Start Chat</button>
</section>
<!--pro_contact end-->

<?php
     include_once('include/footer.php');
?>