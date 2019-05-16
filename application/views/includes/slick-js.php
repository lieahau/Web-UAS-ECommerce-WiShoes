<!-- Slick Javascript -->
<script type="text/javascript" src="<?php echo base_url('assets/template/front/slick/slick.min.js');?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.brand-list').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
           breakpoint: 600,
           settings: {
            slidesToShow: 2,
            slidesToScroll: 1
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