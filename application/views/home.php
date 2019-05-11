<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body style="background-image: url('public/assets/background.jpg'); background-size: cover;">
  <!-- Navigation -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" class="navbar-left"><img style="max-width: 200px" src="public/assets/logo.png"></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Browse</a></li>
        <li><a href="#">SignUp</a></li>
      </ul>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item">
        <img src="public/assets/carousel_1.png" alt="First slide" class="img-responsive">
      </div>
      <div class="item active">
        <img src="public/assets/carousel_2.jpg" alt="Second slide" class="img-responsive">
      </div>
      <div class="item">
        <img src="public/assets/carousel_3.jpg" alt="Third slide" class="img-responsive">
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right"></span>
    	<span class="sr-only">Next</span>
    </a>
  </div>

  <!-- /.carousel -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="title" style="text-align: center;"><strong>Popular Brands:</strong></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-3">
        <img src="public/assets/adidas.png" style="width:100%">
      </div>
      <div class="col-xs-6 col-sm-3">
        <img src="public/assets/nike.png" style="width:100%">
      </div>
      <div class="col-xs-6 col-sm-3">
        <img src="public/assets/skechers.png" style="width:100%">
      </div>
      <div class="col-xs-6 col-sm-3">
        <img src="public/assets/vans.png" style="width:100%">
      </div>
    </div>
  </div>
</body>
</html>
