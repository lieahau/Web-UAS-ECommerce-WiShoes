<!doctype html>
<html lang="en">
    <head>
        <?php echo $initial['header'] ?>
        <?php echo $initial['slickcss'] ?>

        <title>WiShoes - Home</title>
    </head>
    <body style="background-image: url('assets/background.jpg'); background-size: cover;">
        <?php echo $initial['navbar'] ?>

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
        <div class="container-fluid bg-white px-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title" style="text-align: center;"><strong>Popular Brands:</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col brand-list mt-2">
                    <?php
                        foreach($listbrand as $brand){
                            $brandname = substr($brand, 0, strripos($brand, "."));
                            $imagebrand = base_url('assets/database/brands/'.$brand);
                            echo "<div class='p-1'>";
                                echo "<a href='".site_url('brand/'.$brandname)."'>";
                                    echo "<img src='".$imagebrand."' alt='".$brandname."' style='max-height: 100px; object-fit: cover; margin: auto;'/>";
                                echo "</a>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer'] ?>
        <?php echo $initial['slickjs'] ?>
    </body>
</html>
