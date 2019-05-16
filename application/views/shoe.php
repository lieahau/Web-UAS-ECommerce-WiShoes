<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/shoe.css');?>"/>

        <title>WiShoes - Shoe</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>

        <div class="container-fluid px-5 shoes-container">
            <div class="row">
                <div class="col-md-3 mr-auto my-3">
                    <div class="card">
                        <?php $imageshoe = base_url('assets/database/shoes/'.$sepatu->merk.'/'.$sepatu->image); ?>
                        <img class='card-img-top' src='<?php echo $imageshoe;?>' />
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $sepatu->Nama; ?></h5>
                            <hr/>
                            <p class='card-text jenis'><?php echo $sepatu->jenis; ?></p>
                            <p class='card-text harga'><?php echo "Rp. ".number_format($sepatu->harga_satuan,2,',','.'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mr-auto my-auto">
                    <h2 class="align-middle">Choose Your Size :</h2>
                    <div class="row">
                        <form class="col" action="<?php echo site_url('frontend/cart'); ?>" method="POST">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Choose Size
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><?php echo $sepatu->ukuran; ?></a></li>
                                </div>
                            </div>
                            <button class="btn my-3" id="btn-cart" type="submit" name="submit">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer']; ?>
        <script>
            $(document).ready(function(){
                $(".dropdown-menu li a").click(function(){
                    $(this).parents('.dropdown').find('.dropdown-toggle').html($(this).text());
                });
            })
        </script>
    </body>
</html>
