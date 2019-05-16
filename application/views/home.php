<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <?php echo $initial['slickcss']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css');?>"/>

        <title>WiShoes - Home</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>

        <!-- Carousel -->
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                    for($i = 0; $i < count($listcarousel); $i++)
                        echo "<li data-target='#carouselIndicators' data-slide-to='".$i."'".(($i === 0) ? " class='active'":"").")></li>";
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                    for($i = 0; $i < count($listcarousel); $i++)
                    {
                        $imagecarousel = base_url('assets/database/carousels/'.$listcarousel[$i]);
                        echo "<div class='carousel-item".(($i === 0) ? " active":"")."'>";
                            echo "<img src='".$imagecarousel."' class='d-block w-100' alt='WiShoes'/>";
                        echo "</div>";
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Brands -->
        <div class="container-fluid bg-white px-5 brand-container">
            <div class="row">
                <div class="col slick-list mt-2">
                    <?php
                        foreach($listbrand as $brand){
                            $brandname = substr($brand, 0, strripos($brand, "."));
                            $imagebrand = base_url('assets/database/brands/'.$brand);
                            echo "<div class='p-1'>";
                                echo "<a href='".site_url('brand/'.$brandname)."'>";
                                    echo "<img src='".$imagebrand."' alt='".$brandname."' class='brand-logo'/>";
                                echo "</a>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer']; ?>
        <?php echo $initial['slickjs']; ?>
    </body>
</html>
