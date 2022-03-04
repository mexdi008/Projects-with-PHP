<?php
session_start();
$con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');


$id = (int)$_GET['id'];
$teksec = mysqli_query($con,"SELECT * FROM kino WHERE id='".$id."'");
$tekinfo=mysqli_fetch_array($teksec);

$date1 = date('Y-m-d H:i:s');
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WATCHTRAILER</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <?php include"menu.php"; ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="./login.php"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./cat.php?x=<?=$tekinfo['janr']?>"><?=$tekinfo['janr']?></a>
                        <span><?=$tekinfo['ad']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="'<?=$tekinfo['poster']?>'">
                            <div class="comment"><i class="fa fa-star"> </i> <?=$tekinfo['populyarliq']?></div>
                            <div class="view"><i class="fa fa-globe"></i> <?=$tekinfo['dil']?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?=$tekinfo['ad']?></h3>
                                
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p><?=$tekinfo['haqqinda']?></p>
                            
                            <div class="anime__details__btn">
                                <iframe width="677" height="381" src="https://www.youtube.com/embed/<?=$tekinfo['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Serhler</h5>
                            </div>
                            <?php
                            if(isset($_POST['d'])){
                                if(!empty($_POST['ad']) && !empty($_POST['soyad']))
                                {
                                    $serh = trim($_POST['serh']);
                        			$serh = strip_tags($serh);
                        			$serh = htmlspecialchars($serh);
                        			$serh = mysqli_real_escape_string($con,$serh);
                        			
                        			$ad = trim($_POST['ad']);
                        			$ad = strip_tags($ad);
                        			$ad = htmlspecialchars($ad);
                        			$ad = mysqli_real_escape_string($con,$ad);
                        			
                        			$soyad = trim($_POST['soyad']);
                        			$soyad = strip_tags($soyad);
                        			$soyad = htmlspecialchars($soyad);
                        			$soyad = mysqli_real_escape_string($con,$soyad);
                        			if($_SESSION['token'] == $_POST['token']){
                        		
                                    $daxil = mysqli_query($con,"INSERT INTO kinoserh(serh,connect,ad,soyad,tarix) VALUES ('".$serh."','".$_GET['id']."','".$ad."','".$soyad."','".$date1."')");
                                    
                                }
                             }
                          }
                            
                            
                        
            $sec = mysqli_query($con,"SELECT * FROM kinoserh WHERE connect ='".$id."'");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="img/anime/review-1.jpg" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>'.$info['ad'].' '.$info['soyad'].' - <span>'.$info['tarix'].'</span></h6>
                                    <p>'.$info['serh'].'</p>
                                </div>
                            </div>';
                }
                
                ?>
                
                
                
                        </div>
                        <?php
                        $token = md5(time());
                        $_SESSION['token']=$token;
                        echo'
                        
                        <div class="anime__details__form">
                            
                            <form method="post">
                                <input type="hidden" name = "token" value="'.$_SESSION['token'].'">
                                <div class="section-title">
                                <h5>Adiniz</h5>
                            </div>
                                <input type="text" name="ad"><br><br>
                                <div class="section-title">
                                <h5>Soyadiniz</h5>
                            </div>
                                <input type="text" name="soyad"><br><br>
                                <div class="section-title">
                                <h5>Serhiniz</h5>
                            </div>
                                <textarea placeholder="Serhiniz" name ="serh"></textarea>
                                <button type="submit" name="d"><i class="fa fa-location-arrow"></i> Gonder</button>
                            </form>
                            
                        </div>';
                        ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>Bunlarıda Bəyənə Bilərsiniz</h5>
                            </div>
                             <?php
                  
             $sec=mysqli_query($con,"SELECT * FROM kino WHERE janr = '".$tekinfo['janr']."' ORDER BY tarix DESC LIMIT 3");
             
            
             while($info=mysqli_fetch_array($sec))
            
                 {
                echo'           
                            <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                            <div class="product__sidebar__view__item set-bg" data-setbg="'.$info['poster'].'">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                            </div>';
                 }
                 ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="page-up">
                <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer__logo">
                            <a href="./index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer__nav">
                            <ul>
                                <li class="active"><a href="./index.php">Homepage</a></li>
                                <li><a href="./categories.html">Categories</a></li>
                                <li><a href="./blog.html">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Project is made  by Mehdi.S
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                      </div>
                  </div>
              </div>
          </footer>
          <!-- Footer Section End -->

          <!-- Search model Begin -->
          <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><i class="icon_close"></i></div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/player.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>