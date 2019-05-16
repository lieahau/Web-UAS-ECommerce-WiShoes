<!doctype HTML>
<html lang="en">
    <head>
        <?php echo $initial['header']; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signup.css');?>"/>

        <title>WiShoes - Sign Up</title>
    </head>
    <body>
        <?php echo $initial['navbar']; ?>
        
        <div class="container-fluid signup-container-fluid">
            <div class="row mt-5">
                <div class="col">
                    <h2 class="text-center font-antipasto">You Need to be A Member to Check Your Shoes Out</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mx-auto">
                    <!-- START FORM -->
                    <form class="signup-form" action="<?php echo site_url('frontend/signupHandle'); ?>" method="POST">
                        <!-- START HEADER FORM -->
                        <div class="row signup-form-header pt-3">
                            <div class="col">
                                <h1 class="text-center">SIGN UP</h1>
                            </div>
                        </div>
                        <!-- END HEADER FORM -->
                        <!-- START BODY FORM -->
                        <div class="row justify-content-center signup-form-body">
                            <!-- START USERNAME -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" required>
                            </div>
                            <!-- END USERNAME -->
                            <!-- START PASSWORD -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>
                            </div>
                            <!-- END PASSWORD -->
                            <!-- START EMAIL -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required>
                            </div>
                            <!-- END EMAIL -->
                            <!-- START NAME -->
                            <div class="col-10 input-group py-1">
                                <div class="form-row signup-form-name">
                                    <div class="col">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="FIRST NAME" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="LAST NAME" required>
                                    </div>
                                </div>
                            </div>
                            <!-- END NAME -->
                            <!-- START ADDRESS -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-street-view"></i></span>
                                </div>
                                <input type="text" class="form-control" id="address" name="address" placeholder="ADDRESS" required>
                            </div>
                            <!-- END ADDRESS -->
                            <!-- START PHONE -->
                            <div class="col-10 input-group py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="form-input-icon fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="PHONE NUMBER" required>
                            </div>
                            <!-- END PHONE -->
                        </div>
                        <!-- END BODY FORM -->
                        <!-- START FOOTER FORM -->
                        <div class="row justify-content-center signup-form-footer py-3">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <button type="submit" name="submit-signup" class="btn btn-signup w-100 p-0">
                                    <h4 class="text-button">SUBMIT</h4>
                                </button>
                            </div>
                        </div>
                        <!-- END FOOTER FORM -->
                    </form>
                    <!-- END FORM -->
                </div>
            </div>
            <div class="row">
                <div class="col signin-link pt-5">
                    <h2 class="text-center text-footer font-antipasto">
                        Already a Member? <a href="<?php echo site_url('frontend/signin'); ?>">Sign In</a> Here!
                    </h2>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $initial['footer']; ?>
    </body>
</html>
