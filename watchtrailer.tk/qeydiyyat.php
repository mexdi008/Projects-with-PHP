<?php
session_start();
$con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');

$id = (int)$_GET['id'];
$teksec = mysqli_query($con,"SELECT * FROM kino WHERE id='".$id."'");
$tekinfo=mysqli_fetch_array($teksec);

$date1 = date('Y-m-d H:i:s');
?>
<?php
if(isset($_SESSION['user_email']) && isset($_SESSION['user_parol']))
{echo'<meta http-equiv="refresh" content="0; URL=orders2.php">'; exit;}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="WatchTrailer">
     <meta name="keywords" content="Watch, Trailer, Action, Film">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WATCHTRAILER.TK</title>

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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Qeydiyyat</h2>
                        <p>Watchtrailer.tk saytına xoş gəlmişsiniz!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            
                            <?php
                    $con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');
$tarix = date('Y-m-d H:i:s'); 
if(!isset($_POST['z']) && !isset($_POST['g']))
{
echo '<form method="post">
    <div class="alert alert-secondary" role="alert">
        Ad Daxil Edin:<br>
        <input type="text" class="form-control" name="ad" placeholder="Adınızı daxil edin.." autocomplete="off"><br>
        Soyad Daxil Edin:<br>
        <input type="text" class="form-control" name="soyad" placeholder="Soyadınızı daxil edin.." autocomplete="off"><br>
        Telefon Daxil Edin:<br>
        <input type="text" class="form-control" name="tel" placeholder="Telefon nömrənizi daxil edin.." autocomplete="off"><br>
         E-mail Daxil Edin:<br>
        <input type="email" class="form-control" name="email" placeholder="E-Mailinizi daxil edin.." autocomplete="off"><br>
         Şifrə Daxil Edin:<br>
        <input type="password" class="form-control" name="p1" placeholder="Şifrənizi daxil edin.." autocomplete="off"><br>
        Şifrəni Yeniden Daxil Edin:<br>
        <input type="password" class="form-control" name="p2" placeholder="Şifrənizi yenidən daxil edin.." autocomplete="off"><br>
        <button class="btn btn-success" name="d"> Qeydiyyatdan keç</button>
        </form>
    </div>';
}


// USERI BAZAYA DAXIL ETMEK
    if(isset($_POST['d']))
    {
      
    if(!empty($_POST['ad']) && !empty($_POST['soyad']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['p1']) &&!empty($_POST['p2']))
    {
     
    
      $ad = trim($_POST['ad']);
      $ad = strip_tags($ad);
      $ad = htmlspecialchars($ad);
      $ad = mysqli_real_escape_string($con,$ad);

      $soyad = trim($_POST['soyad']);
      $soyad = strip_tags($soyad);
      $soyad = htmlspecialchars($soyad);
      $soyad = mysqli_real_escape_string($con,$soyad);

      $tel = trim($_POST['tel']);
      $tel = strip_tags($tel);
      $tel = htmlspecialchars($tel);
      $tel = mysqli_real_escape_string($con,$tel);
      
      $email = trim($_POST['email']);
      $email = strip_tags($email);
      $email = htmlspecialchars($email);
      $email = mysqli_real_escape_string($con,$email);

      $p1 = trim($_POST['p1']);
      $p1 = strip_tags($p1);
      $p1 = htmlspecialchars($p1);
      $p1 = mysqli_real_escape_string($con,$p1);

      $p2 = trim($_POST['p2']);
      $p2 = strip_tags($p2);
      $p2 = htmlspecialchars($p2);
      $p2 = mysqli_real_escape_string($con,$p2);
       if($p1==$p2)
      {



      $yoxla = mysqli_query($con,"SELECT * FROM users WHERE email = '".$email."' OR tel = '".$tel."'");
      if(mysqli_num_rows($yoxla)==0){
        
        $daxilet = mysqli_query($con,"INSERT INTO users(ad,soyad,tel,email,parol,tarix) VALUES('".$ad."','".$soyad."','".$tel."','".$email."','".$p1."','".$tarix."')");
        if($daxilet==true)
        {echo'<div class="alert alert-success" role="alert">Uğurla Qeydiyyatdan Keçdiniz!</div>'.'<br>';}
        else{echo'<div class="alert alert-danger" role="alert">Qeydiyyatdan keçmək mümkün olmadı zəhmət olmasa məlumatlarınızı dəqiq qeyd edin..</div>'.'<br>';}
         
  }
  else{echo'<div class="alert alert-danger" role="alert">Bu email və ya telefon
 Zaten Bazada Mövcuddur!</div>'.'<br>';}
    }
    else{echo'<div class="alert alert-danger" role="alert">Parollar Ferqlidir!</div>'.'<br>';}
  }
   else{echo'<div class="alert alert-danger" role="alert">Məlumatları tam doldurun!</div>'.'<br>';}
  }
    

    if(isset($_POST['z'])){
      echo '<form method="post">
      Email ve ya Telefon daxil edin:<br>
            <input type="text" class="form-control" name="tel1" placeholder="Telefon nömrənizi ve ya E-mail daxil edin.." autocomplete="off"><br>
             <button class="btn btn-success" name="g"> Göndər </button>
             </form>';
    }

            if(isset($_POST['g']))
          {
            if(!empty($_POST['tel1']))
            {echo'
          <div class="alert alert-success" role="alert">Kodunuz Göndərildi zəhmət olmasa yoxlayın..</div>
          <form method="post">
          Sizə gələn kodu buraya daxil edin:<br>
              <input type="text" class="form-control" name="kod" placeholder="Kod" autocomplete="off"><br>
             <button class="btn btn-success" name="x"> Daxil Et </button>
             </form>';}
            else
            {echo'<div class="alert alert-danger" role="alert">Zəhmət olmasa məlumatları tam doldurun..!</div>
                    <form method="post">
              Email ve ya Telefon daxil edin:<br>
              <input type="text" class="form-control" name="tel1" placeholder="Telefon nömrənizi ve ya E-mail daxil edin.." autocomplete="off"><br>
             <button class="btn btn-success" name="g"> Göndər </button>
             </form>';}
          }

?>
          
                
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i>Facebook İlə qeydiyyatdan keçin</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i>Google İlə qeydiyyatdan keçin</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i>Twitter İlə qeydiyyatdan keçin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

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
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site developed by <a href="watchtrailer.tk" target="_blank">Mehdi S.</a>
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