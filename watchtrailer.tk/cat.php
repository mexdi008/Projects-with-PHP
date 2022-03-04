<?php
 $con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');

            $sec = mysqli_query($con,"SELECT janr FROM kino GROUP BY janr");
                
                while($info=mysqli_fetch_array($sec))
{
if($_GET['x']==$info['janr'])
{$sec="".$_GET['x']."";
    
    $con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');


            $id = (int)$_GET['id'];
            $teksec = mysqli_query($con,"SELECT * FROM kino WHERE janr='".$_GET['x']."'");
            $tekinfo=mysqli_fetch_array($teksec);



}

elseif($_GET['x']=='popular')
{echo$sec="En popular kinolar";}
elseif(!empty($_GET['x']))
{echo$sec="Siz ".$_GET['x']." kateqoriyasi bolumundesiniz";}
else
{echo'<meta http-equiv="refresh" content="0; URL=index.php">';}
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WatchTraliler Categories</title>

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
                        <a href="./index.html">
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
                        <a href="./login.html"><span class="icon_profile"></span></a>
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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span><?=$sec="".$_GET['x'].""?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4><?='En Son '.$sec="".$_GET['x']."".' Filmləri'?></h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <select>
                                            <option value="">A-Z</option>
                                            <option value="">1-10</option>
                                            <option value="">10-50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            
                $num = 18;
                $page = $_GET['page'];
                $result = mysqli_query($con,"SELECT * FROM kino");
                $posts = mysqli_num_rows($result);
                $total = intval(($posts - 1)/$num)+1;
                if(empty($page) or $page<0){$page =1;}
                if($page>$total){$page=$total;}
                            
                            $start = $page * $num - $num;
                 if($_GET['x']!='latest' && $_GET['x']!='popular')
                {$sec=mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' && janr = '".$_GET['x']."'
                    ORDER BY tarix DESC LIMIT ".$start.",".$num);}
                elseif($_GET['x']=='latest')
                {$sec=mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2'
                    ORDER BY tarix DESC LIMIT ".$start.",".$num);}
                elseif($_GET['x']=='popular')
                {}
                
                
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
                    <div class="product__pagination">
                        
                        <?php
                                    
                                    
if ($page != 1) $pervpage = '<a href= "cat.php?page=1&x='.$_GET['x'].'"><<</a>
                               <a href= "cat.php?page='. ($page - 1) .'&x='.$_GET['x'].'"><</a>';
 
if ($page != $total) $nextpage = '<a href=" cat.php?page='. ($page + 1) .'&x='.$_GET['x'].'">></a>
                                   <a href=" cat.php?page=' .$total. '&x='.$_GET['x'].'">>></a>';
 
if($page - 2 > 0) $page2left = '<a href=" cat.php?page='. ($page - 2) .'&x='.$_GET['x'].'">'. ($page - 2) .'</a>';
if($page - 1 > 0) $page1left = '<a href=" cat.php?page='. ($page - 1) .'&x='.$_GET['x'].'">'. ($page - 1) .'</a>';
if($page + 2 <= $total) $page2right = '<a href=" cat.php?page='. ($page + 2) .'&x='.$_GET['x'].'">'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = '<a href=" cat.php?page='. ($page + 1) .'&x='.$_GET['x'].'">'. ($page + 1) .'</a>';
 
echo $pervpage.$page2left.$page1left.'<a class="current-page" href="#">'.$page.'</a>'.$page1right.$page2right.$nextpage;
 
 
?>



                        <!--<a href="#" class="current-page">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#"><i class="fa fa-angle-double-right"></i></a>-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Ən Populyarlar</h5>
                            </div>
                            
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul>
                            <?php
                            
                            
                            if($_GET['x']!='latest' && $_GET['x']!='popular')
            {$sec=mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2' && janr = '".$_GET['x']."'
                    ORDER BY populyarliq DESC LIMIT 12");}
                elseif($_GET['x']=='latest')
                {$sec=mysqli_query($con,"SELECT * FROM kino WHERE poster!='https://www.themoviedb.org/t/p/w600_and_h900_bestv2'
                    ORDER BY populyarliq DESC LIMIT 12");}
                elseif($_GET['x']=='popular')
                {}
                
                while($info=mysqli_fetch_array($sec))
                {
            echo'
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                    data-setbg="'.$info['poster'].'">
                                    <div class="ep"><i class="fa fa-star"></i> '.$info['populyarliq'].'</div>
                                    <div class="view"><i class="fa fa-eye"></i> '.$info['dil'].'</div>
                                    <h5><a href="https://watchtrailer.tk/trailer-details.php?id='.$info['id'].'">'.$info['ad'].'</a></h5>
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
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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