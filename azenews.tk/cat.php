<?php
$con = mysqli_connect('localhost','htqkzciz_newsadmin','mf2002_!@','htqkzciz_azenews');
?>
<!DOCTYPE html>
<html>
<head>
<title>Azenews.tk</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p>Friday, December 05, 2045</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
<?php include"menu.php"; ?>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span style="font-family:Tahoma;">Son Xəbərlər</span>
          <ul id="ticker01" class="news_sticker">
               <?php
            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY created DESC");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'<li><a href="#"><img src="'.$info['foto'].'" alt="">'.$info['title'].'</a></li>';
                }
                ?>
            
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
            <?php
            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY created DESC LIMIT 5");
                
                while($info=mysqli_fetch_array($sec))
                {
          echo'<div class="single_iteam"> <a href="pages/single_page.html"> <img src="'.$info['foto'].'" alt=""></a>
          
            <div class="slider_article">
             
              <h2><a class="slider_tittle" href="pages/single_page.html" style="font-family:Tahoma;">'.$info['title'].'</a></h2>
              <p></p>
            </div>
          </div>';
                }
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_sidebar">
            <h2><span style="font-family:Tahoma;"><?=$_GET['cat'] ?></span></h2>
            <ul class="spost_nav">
                <?php
           $sec = mysqli_query($con,"SELECT * FROM news ORDER BY created DESC  LIMIT 4");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                  <div class="media-body"> <a href="https://azenews.tk/pages/xeber.php?id='.$info['id'].'" class="catg_title" style="font-family:Tahoma;">'.$info['title'].'</a> </div>
                </div>
              </li>';
                }
                ?>
            </ul>
          </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
           
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                     <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE  ORDER BY created DESC LIMIT 1 ");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="'.$info['foto'].'"> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html">'.$info['title'].'</a> </figcaption>
                    <p></p>
                  </figure>';
                }
                  ?>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <li>
                     <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Multimedia' ORDER BY created DESC  ");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title">'.$info['title'].'</a> </div>
                  </div>';
                }
                ?>
                </li>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span style="font-family:Tahoma;">Milli Məclis</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                    <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Milli Məclis' ORDER BY created DESC LIMIT 1");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
                  <li>
                    <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="'.$info['foto'].'"> <span class="overlay"></span> </a>
                      <figcaption> <a href="pages/single_page.html">'.$info['title'].'</a> </figcaption>
                      <p></p>
                    </figure>
                  </li>';
                }
                  ?>
                </ul>
                <ul class="spost_nav">
  <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Milli Məclis' ORDER BY created DESC LIMIT 4");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> '.$info['title'].'</a> </div>
                    </div>
                  </li>';
                }
                ?>
                  
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Hərbi</span></h2>
                <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Hərbi' ORDER BY created DESC LIMIT 1");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo'  <ul class="business_catgnav">
                   
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="'.$info['foto'].'"> <span class="overlay"></span> </a>
                      <figcaption> <a href="pages/single_page.html">'.$info['title'].'</a> </figcaption>
                      <p></p>
                    </figure>
                  </li>
                </ul>';
                }
                ?>
                 <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Hərbi' ");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' <ul class="spost_nav">
                   
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title">'.$info['title'].'</a> </div>
                    </div>
                  </li>
                </ul>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img style="width:186px; height:390px;" src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img style="width:186px; height:390px;" src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Futbol</span></h2>
            <div class="single_post_content_left">
                <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Futbol' ORDER BY created DESC LIMIT 2");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="pages/single_page.html"> <img src="'.$info['foto'].'" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html" style="font-family:Tahoma;">'.$info['title'].'</a> </figcaption>
                  
                  </figure>
                </li>
              </ul>';
                }
                ?>
            </div>
            <div class="single_post_content_right">
                <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='fUTBOL' ORDER BY created DESC LIMIT 10");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title" style="font-family:Tahoma;">'.$info['title'].'</a> </div>
                  </div>
                </li>
              </ul>';
                }
                ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span style="font-family:Tahoma;">Son Xəbərlər</span></h2>
            <ul class="spost_nav">
                <?php
            $sec = mysqli_query($con,"SELECT * FROM news  ORDER BY created DESC LIMIT 25 ");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title" style="font-family:Tahoma;">'.$info['title'].'</a> </div>
                </div>
              </li>';
                }
                ?>
            </ul>
          </div>
         
         
          
          
        </aside>
      </div>
    </div>
  </section>
  <footer id="footer">
 
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2021 <a href="index.php" style="color:white;">Azenews.TK</a></p>
      <p class="developer" style="color:white;">Developed By Mehdi.S</p>
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>