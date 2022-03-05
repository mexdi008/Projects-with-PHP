<?php
$con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="WatchTrailer">
     <meta name="keywords" content="Watch, Trailer, Action, Film">
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
                            <img src="img/watchtrailer3.jpg" alt="">
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' ORDER BY populyarliq DESC LIMIT 1");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                <div class="hero__items set-bg" data-setbg="'.$info['poster'].'">';
                }
                ?>
                    <div class="row">
                         <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' ORDER BY populyarliq DESC LIMIT 1");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">'.$info['janr'].'</div>
                                <h2>'.$info['ad'].'</h2>
                                <p>'.$info['haqqinda'].'</p>
                                <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'"><span>Kino Haqqinda</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>';
                }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Son Kinolar</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="cat.php?x=latest" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' ORDER BY tarix DESC LIMIT 6");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item"><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                                    <div class="product__item__pic set-bg" data-setbg="'.$info['poster'].'">
                                        <div class="ep">'.$info['tarix'].'</div>
                                        <div class="comment"><i class="fa fa-star"></i> '.$info['populyarliq'].'</div>
                                        <div class="view"><i class="fa fa-eye"></i> '.$info['dil'].'</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>'.$info['janr'].'</li>
                                        </ul>
                                        <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                                    </div>
                                </div>
                            </div>
                            ';
                    
                }
                        ?>
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Kinolar</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="cat.php?x=popular" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
            $sec = mysqli_query($con,"SELECT * FROM kino ORDER BY populyarliq DESC LIMIT 6");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                                    <div class="product__item__pic set-bg" data-setbg="'.$info['poster'].'">
                                        <div class="ep">'.$info['tarix'].'</div>
                                        <div class="comment"><i class="fa fa-star"></i> '.$info['populyarliq'].'</div>
                                        <div class="view"><i class="fa fa-eye"></i> '.$info['dil'].'</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Active</li>
                                            <li>Movie</li>
                                        </ul>
                                        <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                                    </div>
                                </div>
                            </div>';
                }
                            ?>
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Aksiyon Kinolari</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="https://watchtrailer.tk/cat.php?x=Action" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                              <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' && janr='Action' ORDER BY tarix DESC LIMIT 6");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                                        <div class="product__item__pic set-bg" data-setbg="'.$info['poster'].'">
                                        <div class="ep">'.$info['tarix'].'</div>
                                        <div class="comment"><i class="fa fa-star"></i> '.$info['populyarliq'].'</div>
                                        <div class="view"><i class="fa fa-eye"></i>'.$info['dil'].'</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>'.$info['janr'].'</li>
                                            
                                        </ul>
                                        <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                                    </div>
                                </div>
                            </div>';
                }
                ?>
                        </div>
                    </div>
                    <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Animasiya</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="https://watchtrailer.tk/cat.php?x=Animasiya" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' && janr='Animasiya' ORDER BY tarix DESC LIMIT 6");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                                    <div class="product__item__pic set-bg" data-setbg="'.$info['poster'].'">
                                        <div class="ep">'.$info['tarix'].'</div>
                                        <div class="comment"><i class="fa fa-star"></i> '.$info['populyarliq'].'</div>
                                        <div class="view"><i class="fa fa-eye"></i>'.$info['dil'].'</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>'.$info['janr'].'</li>
                                        </ul>
                                        <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                                    </div>
                                </div>
                            </div>';
                }
                ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Macəra Kinoları</h5>
                            </div>
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul>
                              <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' && janr='Macəra' ORDER BY tarix DESC LIMIT 6");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="filter__gallery">
                            <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
                            <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="'.$info['poster'].'">
                                <div class="view"><i class="fa fa-eye"></i> '.$info['dil'].'</div>
                                <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                            </div>';
                }
                ?>
                            
                        

                
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>Son Kinolar</h5>
        </div>
         <?php
            $sec = mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' ORDER BY tarix DESC LIMIT 17");
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
        <div class="product__sidebar__comment__item">
        <a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">
            <div class="product__sidebar__comment__item__pic">
                <img src="'.$info['poster'].'" style="width: 90px; height:130px;" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>'.$info['janr'].'</li>
                    
                </ul>
                <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
                <span><i class="fa fa-star"></i> '.$info['populyarliq'].'</span>
            </div>
        </div>';
                }
                ?>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="./index.html">Homepage</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |Project is made  by Mehdi.S
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