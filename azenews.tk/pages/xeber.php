<?php
$con = mysqli_connect('localhost','htqkzciz_newsadmin','mf2002_!@','htqkzciz_azenews');

$id = (int)$_GET['id'];
$teksec = mysqli_query($con,"SELECT * FROM news WHERE id='".$id."'");
$tekinfo=mysqli_fetch_array($teksec);

?>

<!DOCTYPE html>
<html>
<head>
<title><?=$tekinfo['title'] ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">


<meta property="og:image" content="<?=$tekinfo['foto'] ?>"/>
    <!--<meta property="og:image:secure_url" content="" /> -->
    <meta property="og:image:width" content="640" /> 
    <meta property="og:image:height" content="442" />
<?php

$text = substr($tekinfo['text'],0,100);

?>
   
    <meta property="og:title" content='<?=$tekinfo['title'] ?>'/>
    <meta property="og:description" content='<?=$text ?>'/>
    <meta property="og:site_name" content="Qafqazinfo"/>
    <meta property="og:type" content="article"/>

    <meta property="fb:admins" content="ebilova"/>

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content='Cenevrədə Zəfər Günü və Bayraq Günü münasibətilə rəsmi tədbir — Video + Fotolar'/>
    <meta itemprop="description" content="İsveçrənin Cenevrə şəhərində Ümumdünya Əqli Mülkiyyət Təşkilatının (ÜƏMT) baş qərargahında Zəfər Günü və Bayraq Günü münasibətilə rəsmi tədbir keçiril"/>
    <meta itemprop="image" content="https://qafqazinfo.az/uploads/1636720514/MyCollages_-_2021-11-12T163606.455.jpg"/>

    <!-- Twitter Card data -->
    <meta name="twitter:url" content="https://qafqazinfo.az/news/detail/cenevrede-zefer-gunu-ve-bayraq-gunu-munasibetile-resmi-tedbir-video-fotolar-342778" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="@qafqazinfo" />
    <meta name="twitter:title" content=" Cenevrədə Zəfər Günü və Bayraq Günü münasibətilə rəsmi tədbir — Video + Fotolar " />
    <meta name="twitter:image" content="https://qafqazinfo.az/uploads/1636720514/MyCollages_-_2021-11-12T163606.455.jpg">       

    <meta property="article:section" content="İsveçrənin Cenevrə şəhərində Ümumdünya Əqli Mülkiyyət Təşkilatının (ÜƏMT) baş qərargahında Zəfər Günü və Bayraq Günü münasibətilə rəsmi tədbir keçiril" />
    <meta property="article:tag" content="" />
    <meta property="article:published_time" content="2021-11-12 16:37:00" />




<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
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
              <li><a href="https://azenews.tk/" style="font-family:Tahoma;">Əsas Səhifə</a></li>
              <li><a href="#">Haqqımızda</a></li>
              <li><a href="contact.php" style="font-family:Tahoma;">Əlaqə</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo date('Y-m-d H:i:s');?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="../index.html" class="logo"><img src="../images/azelogo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="../images/azebanner.jpg" style="width:600px;height: 200px"alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="../index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kategoriyalar</a>
            <ul class="dropdown-menu" role="menu">
              <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat NOT IN('İnfrastruktur','Ask','Biznes','Milli məclis','Sosial müdafiə','Energetika','Mədəniyyət siyasəti','Daxili siyasət','Xarici siyasət','Hərbi','Elm və təhsil','Sənaye','Qarabağ') GROUP BY cat");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
          <li><a href="https://azenews.tk/cat.php?cat='.$info['cat'].'" style="font-family:Tahoma;">'.$info['cat'].'</a></li>';
                }
                ?>
           
      </div>
    </nav>
  </section>
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
              <li class="facebook"><a href="https://www.facebook.com/mexdi008/"></a></li>
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
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
            <li><a href="../index.php">Əsas Səhifə</a></li>
            <li><a href="#"><?=$tekinfo['cat'] ?></a></li>
            <li class="active"><?=$tekinfo['title'] ?></li>
            </ol>
            <h1 style="font-family:Tahoma;"><?=$tekinfo['title'] ?></h1>
            <div class="post_commentbox"> <a href="<?=$tekinfo['link'] ?>"><i class="fa fa-user"></i><?=$tekinfo['menbe'] ?></a> <span><i class="fa fa-calendar"></i><?php
            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY created DESC");
            echo $info['created'];
                ?>
                </span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <div class="single_page_content"> <img class="img-center" src="<?=$tekinfo['foto'] ?>" alt="">
             <blockquote><?=$tekinfo['text']?></blockquote>
             
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2 style="font-family:Tahoma;">Son Xəbərlər <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                  <?php
                  
             $sec=mysqli_query($con,"SELECT * FROM news ORDER BY created DESC LIMIT 3");
             while($info=mysqli_fetch_array($sec))
            
                 {
                echo'
                <li>
                <div class="media" style="font-family:Tahoma;"> <a class="media-left" href="single_page.html"> 
                     <img src="'.$info['foto'].'" alt=""> 
                    </a>
                     <div class="media-body"> <a class="catg_title" href="https://azenews.tk/pages/xeber.php?id='.$info['id'].'""> '.$info['title'].'
                    </a> 
                    </div>
                </div>
                </li>';
                }
                ?>
    
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span style="font-family:Tahoma;">Başqa Xəbərlər</span></h2>
            <ul class="spost_nav">
            <?php
            $sec=mysqli_query($con,"SELECT * FROM news LIMIT 13,13");
            while($info=mysqli_fetch_array($sec)){

            echo'
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="'.$info['foto'].'"> </a>
                  <div class="media-body"> <a href="https://azenews.tk/pages/xeber.php?id='.$info['id'].'" class="catg_title"> '.$info['title'].'</a> </div>
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
      <p class="copyright">Copyright &copy; 2021 <a href="../index.php">AZENEWS.TK</a></p>
      <p class="developer" style="color:white;">Developed By Mehdi.S</p>
    </div>
  </footer>
</div>
<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../assets/js/custom.js"></script>
</body>
</html>