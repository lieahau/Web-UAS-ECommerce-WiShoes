<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/cart.css');?>"/>

        <title>WiShoes - Cart</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>
<?php var_dump('listcart'); ?>
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto py-5">
                    <section class="shopping-cart dark">
                        <div class="container">
                            <div class="block-heading">
                                <h2>Hello, <?php echo $userdata->first_name; ?></h2>
                                <p>Here is your shopping cart.</p>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="items">
                                            <div class="product">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img class="img-fluid mx-auto d-block image" src='<?php echo base_url('assets/database/shoes/Nike/5cdc552f52cf5.jpg'); ?>'>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="info">
                                                            <div class="row">
                                                                <div class="col-md-4 product-name">
                                                                    <div class="product-name">
                                                                        <a href="#">Nama Sepatu</a>
                                                                        <div class="product-info">
                                                                            <div><span class="value">Running Shoes</span></div>
                                                                            <div>Size: <span class="value">40</span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 quantity">
                                                                    <p>Quantity:</p>
                                                                    <p>1</p>
                                                                </div>
                                                                <div class="col-md-5 price">
                                                                    <span>Rp. 1.000.000</span>
                                                                </div>
                                                                <div class="col-md-1 delete">
                                                                    <button id="delete" type="button" class="btn"><i class="fas fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img class="img-fluid mx-auto d-block image" src='<?php echo base_url('assets/database/shoes/Nike/5cdc552f52cf5.jpg'); ?>'>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="info">
                                                            <div class="row">
                                                                <div class="col-md-4 product-name">
                                                                    <div class="product-name">
                                                                        <a href="#">Nama Sepatu</a>
                                                                        <div class="product-info">
                                                                            <div><span class="value">Running Shoes</span></div>
                                                                            <div>Size: <span class="value">40</span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 quantity">
                                                                    <p>Quantity:</p>
                                                                    <p>2</p>
                                                                </div>
                                                                <div class="col-md-5 price">
                                                                    <span>Rp. 2.000.000</span>
                                                                </div>
                                                                <div class="col-md-1 delete">
                                                                    <button type="button" class="btn"><i class="fas fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="summary">
                                            <h3>Summary</h3>
                                            <div class="summary-item"><span class="text">Subtotal</span><span class="price">Rp. 3.000.000</span></div>
                                            <div class="summary-item"><span class="text">Discount</span><span class="price">Rp. 0</span></div>
                                            <div class="summary-item"><span class="text">Shipping</span><span class="price">Rp. 0</span></div>
                                            <div class="summary-item"><span class="text">Total</span><span class="price">Rp. 3.000.000</span></div>
                                            <button type="button" id="checkout" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
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

        <?php echo $initial['footer']; ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/cart.js');?>"></script>
    </body>
</html>
