<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url('/assets/template/back/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('/assets/template/back/css/sb-admin.css') ?>" rel="stylesheet">
	<?php echo $style ?>

</head>
<body>
  <form action="<?php echo site_url('/CheckLogin') ?>" method="post" enctype="multipart/form-data" >
  	<div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 10%;">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin">
                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus >
                  <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>
</html>