<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <?php echo $initial['slickcss']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/brand.css');?>"/>

        <title>WiShoes - Brand</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>

        <div class="container-fluid px-5 shoes-container">
            <div class="row">
                <div class="col slick-list my-3 card-deck">
                        <?php
                            foreach($listsepatu as $sepatu){
                                $imageshoe = base_url('assets/database/shoes/'.$sepatu->merk.'/'.$sepatu->image);

                                echo "<div class='card' style='max-width: 20rem;'>";
                                    echo "<a href='".site_url('shoe/'.$sepatu->id)."' class='deco-none'>";
                                        echo "<img class='card-img-top' src='".$imageshoe."' />";
                                        echo "<div class='card-body'>";
                                            echo "<h5 class='card-title'>".$sepatu->Nama."</h5>";
                                            echo "<hr/>";
                                            echo "<p class='card-text'>".$sepatu->jenis."</p>";
                                            echo "<p class='card-text'><small class='text-muted'>Rp. ".number_format($sepatu->harga_satuan,2,',','.')."</small></p>";
                                        echo "</div>";
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
