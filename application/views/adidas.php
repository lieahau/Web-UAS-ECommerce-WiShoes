<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adidas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="public/slick/slick-theme.css"/>
 
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="public/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
           breakpoint: 600,
           settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        ]
      });    
    })
  </script>
</head>

<body style="background-image: url('public/assets/background.jpg'); background-size: cover;">
  <!-- Navigation -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" class="navbar-left"><img style="max-width: 300px" src="public/assets/logo.png"></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Browse</a></li>
        <li><a href="#">SignUp</a></li>
      </ul>
    </div>
  </nav>

  <div class="slider responsive">
      <div>
        <img src="public/adidas/web/1.jpg" style="max-width: 500px; margin: auto">
      </div>
      <div>
        <img src="public/adidas/web/2.jpg" style="max-width: 500px; margin: auto">
      </div>
      <div>
        <img src="public/adidas/web/3.jpg" style="max-width: 500px; margin: auto">
      </div>
      <div>
        <img src="public/adidas/web/4.jpg" style="max-width: 500px; margin: auto">
      </div>
      <div>
        <img src="public/adidas/web/5.jpg" style="max-width: 500px; margin: auto">
      </div>
    </div>
</body>
</html>
