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
                <div class="col-md-6 mr-auto my-auto">
                        <?php 
                            if(!empty($this->session->userdata('email')) && $sepatu->stok > 0)
                            {
                        ?>
                        <div class="row size-container">
                            <div class="col">
                                <h2 class='align-middle'>Choose Your Size :</h2>
                                <div class="btn-group dropdown dropdown-size">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Choose Size
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-size">
                                        <li><a class="dropdown-item" href="#"><?php echo $sepatu->ukuran; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row qty-container my-5">
                            <div class="col">
                                <h2 class='align-middle'>Choose Quantity :</h2>
                                <div class="slidecontainer">
                                    <input type="range" min="1" max='<?php echo $sepatu->stok; ?>' value="1" class="slider-qty" id="qtyRange">
                                </div>
                                <p>Value: <span id="qtyVal"></span></p>
                            </div>
                        </div>
                        <div class="row add-cart-container">
                            <div class="col">
                                <button class="btn my-3" id="btn-cart" name="submit" disabled>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    <?php
                        }
                        else if($sepatu->stok == 0)
                        {
                            echo "<div class='row'>";
                                echo "<div class='col'>";
                                    echo "<h2 class='align-middle text-danger'>Sorry, this product is out of stock.</h2>";
                                echo "</div>";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div class='row'>";
                                echo "<div class='col'>";
                                    echo "<h2 class='align-middle text-danger'>You Need to <a class='deco-none' href='".site_url('frontend/signin')."'>Sign In</a> to Buy this Product.</h2>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div id="modal-container">
            <div class="modal-background">
                <div class="modal">
                    <div class="success-checkmark">
                        <div class="check-icon">
                            <span class="icon-line line-tip"></span>
                            <span class="icon-line line-long"></span>
                            <div class="icon-circle"></div>
                            <div class="icon-fix"></div>
                        </div>
                    </div>
                    <h2 class="mb-5">Success</h2>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer']; ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/shoe.js');?>"></script>
        <script type="text/javascript" >
            $(document).ready(function(){
                // ADD TO CART
                $('#btn-cart').click(function(){
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('frontend/addcart');?>",
                        data:
                        { 
                            'id_sepatu': <?php echo $sepatu->id; ?>,
                            'jumlah': $('#qtyRange').val()
                        }
                    }).done(
                        function(){
                            $('#modal-container').removeAttr('class').addClass('add-cart');
                            $('body').addClass('modal-active');

                            $(".check-icon").hide();
                            setTimeout(function () {
                                $(".check-icon").show();
                                setTimeout(function () {
                                    window.location.href = "<?php echo site_url('cart'); ?>";
                                }, 2000);
                            }, 1000);
                        }
                    )
                    .fail(
                        function(xhr, status, error){
                            console.log(xhr.responseText);
                        }
                    );
                });
            });
        </script>

    </body>
</html>
