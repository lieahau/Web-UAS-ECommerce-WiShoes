<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css');?>"/>

        <title>WiShoes - Sign In</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>
        
        <div class="container-fluid signin-container-fluid">
            <div class="row mt-5">
                <div class="col">
                    <h2 class="text-center font-antipasto">You Need to be A Member to Check Your Shoes Out</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mx-auto">
                    <!-- START FORM -->
                    <form class="signin-form" action="<?php echo site_url('frontend/signinHandle'); ?>" method="POST">
                        <!-- START HEADER FORM -->
                        <div class="row signin-form-header pt-3">
                            <div class="col">
                                <h1 class="text-center">SIGN IN</h1>
                            </div>
                        </div>
                        <!-- END HEADER FORM -->
                        <!-- START BODY FORM -->
                        <div class="row justify-content-center signin-form-body">
                            <!-- START EMAIL -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required>
                            </div>
                            <!-- END EMAIL -->
                            <!-- START PASSWORD -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>
                            </div>
                            <!-- END PASSWORD -->
                        </div>
                        <!-- END BODY FORM -->
                        <!-- START FOOTER FORM -->
                        <div class="row justify-content-center signin-form-footer py-3">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <button type="submit" name="submit-signin" class="btn btn-signin w-100 p-0">
                                    <h4 class="text-button">SUBMIT</h4>
                                </button>
                            </div>
                        </div>
                        <!-- END FOOTER FORM -->
                    </form>
                    <!-- END FORM -->
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer']; ?>
    </body>
</html>
