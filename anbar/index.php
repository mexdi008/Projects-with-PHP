<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 

if(isset($_SESSION['email']) && isset($_SESSION['parol']))
{echo'<meta http-equiv="refresh" content="0; URL=orders.php">'; exit;}
?>
<link rel="stylesheet" href="style.css" >

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Anbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="#">Haqqımızda</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Əlaqə</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="email" name="email" placeholder="Email" aria-label="Search">
      <input class="form-control mr-sm-2" type="password" name="parol" placeholder="Parol" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="daxilol" type="submit">Daxil ol</button>
    </form>
  </div>
</nav>

<br><br>
<div class="alert alert-warning" role="alert">Anbar proqramında işləmək üçün ya qeydiyyatdan keçin, ya da email və parolunuzu daxil edərək sistemə giriş edin</div>
<div class="container">


<?php

if(isset($_POST['daxilol']))
{
  if(!empty($_POST['email']) && !empty($_POST['parol']))
  {
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    $email = mysqli_real_escape_string($con,$email);
 

    $parol = trim($_POST['parol']);
    $parol = strip_tags($parol);
    $parol = htmlspecialchars($parol);
    $parol = mysqli_real_escape_string($con,$parol);

    $yoxla = mysqli_query($con,"SELECT * FROM users WHERE email='".$email."' AND parol='".$parol."'");

    if(mysqli_num_rows($yoxla)>0)
    {
      $info = mysqli_fetch_array($yoxla);

      $_SESSION['user_id'] = $info['id'];
      $_SESSION['ad'] = $info['ad'];
      $_SESSION['soyad'] = $info['soyad'];
      $_SESSION['tel'] = $info['tel'];
      $_SESSION['email'] = $info['email'];
      $_SESSION['parol'] = $info['parol'];

      echo'<meta http-equiv="refresh" content="0; URL=brands.php">';

    }
  }
}



    
if (!isset($_POST['d2']) && !isset($_POST['d3']) && !isset($_POST['dyes']) && !isset($_POST['qebul'])) {
  echo '<form method="post" enctype="multipart/form-data">
  <input type="text" name="ad" class="form-control" placeholder="Ad daxil edin" autocomplete="off" ><br>
  <input type="text" name="soyad" class="form-control" placeholder="Soyad daxil edin" autocomplete="off"><br>
  <input type="file" name="foto" class="form-control"><br>
  <input type="text" name="tel" class="form-control" placeholder="Telefon daxil edin" autocomplete="off"><br>
  <input type="email" name="email" class="form-control" placeholder="Email daxil edin" autocomplete="off"><br>
  <input type="password" name="p" class="form-control" placeholder="Parol daxil edin" autocomplete="off"><br>
  <input type="password" name="p1" class="form-control" placeholder="Təkrar parol" autocomplete="off"><br>
  <button type="submit" name="d" class="btn btn-success btn-sm">Qeydiyyatdan keç</button>
  <button type="submit" name="d2" class="btn btn-warning btn-sm">Şifrəni unutmuşam</button>
    </form>';
}

if (isset($_POST['d2']) && !isset($_POST['d3']) && !isset($_POST['dyes']) && !isset($_POST['qebul'])) {
  echo '<form method="post">
  <input type="text" name="helpemail" class="form-control" placeholder="emailinizi daxil edin" autocomplete="off" ><br>
  <button type="submit" name="d3" class="btn btn-success btn-sm">Axtar</button>
    </form>';
}
$e=0;
if (isset($_POST['d3']) && !isset($_POST['dyes']) && !isset($_POST['qebul'])) {
  $help=mysqli_query($con,"SELECT * FROM users");
  while($helpinfo=mysqli_fetch_array($help)){
  if ($helpinfo['email']==$_POST['helpemail']) {
    echo $helpinfo['ad'].' '.$helpinfo['soyad'].' bu hesab sizə aiddir?';
    echo '<form method="post">
          <button type="submit" name="dyes" class="btn btn-success btn-sm">Bəli</button>
          <button type="submit" name="dno" class="btn btn-success btn-sm">Xeyr</button>
          <input type="hidden" name="id" value="'.$helpinfo['id'].'">
        </form>';
  }
  
}
}
if (isset($_POST['dyes']) && !isset($_POST['qebul'])) {
  $help=mysqli_query($con,"SELECT * FROM users WHERE id='".$_POST['id']."'");
  $helpinfo=mysqli_fetch_array($help);
          echo  '<form method="post">
                <input type="text" name="helpparol" class="form-control" placeholder="Xatırladığınız son parolu yazın" autocomplete="off" ><br>
                <button type="submit" name="qebul" class="btn btn-success btn-sm">Daxil et</button>
                <input type="hidden" name="id" value="'.$helpinfo['id'].'">
              </form>';
              
          
}
if (isset($_POST['qebul'])) {
  $help=mysqli_query($con,"SELECT * FROM users WHERE id='".$_POST['id']."'");
  $helpinfo=mysqli_fetch_array($help);
  echo  '<form method="post"> <input type="hidden" name="id" value="'.$helpinfo['id'].'">  </form>';
/*  $parolunuz=$helpinfo['parol'];
  $parolyoxla=str_split($_POST['helpparol'] );
              $parola=str_split($helpinfo['parol'] );

              
              for ($i=0; $i < count($parolyoxla); $i++) { 
                if ($parola[$i]==$parolyoxla[$i]) {
                  $e=$e+1;
                }
              }
  
  $t=($e/count($parola))*100;

if ($t>70) {$help=mysqli_query($con,"SELECT * FROM users WHERE id='".$_POST['id']."'");
  $helpinfo=mysqli_fetch_array($help);
  echo 'Sizin parolunuz '.$helpinfo['parol'] ;

}
if ($t<=70) {
  echo 'Parolunuzu tapmaq mümkün olmadı';

}*/

$sim = similar_text($helpinfo['parol'], $_POST['helpparol'], $x);

echo $x;


}

if (isset($_POST['d'])) {

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
 

    $p = trim($_POST['p']);
    $p = strip_tags($p);
    $p = htmlspecialchars($p);
    $p = mysqli_real_escape_string($con,$p);


    $p1 = trim($_POST['p1']);
    $p1 = strip_tags($p1);
    $p1 = htmlspecialchars($p1);
    $p1 = mysqli_real_escape_string($con,$p1);
    $id = (int)$_POST['id'];

  if ($p==$p1) {
    $yoxla = "WHERE email='".$email."' or tel='".$tel."' ";
    $yoxlama=mysqli_query($con, "SELECT * FROM users ".$yoxla." " );
    $sayi = mysqli_num_rows($yoxlama);
    if ($sayi==0 ) {
               include "upload.php";
            if ($unvan=='foto/') {
              $unvan='foto/user.svg';
            }
            if (!isset($error)) {
               $qey=mysqli_query($con, "INSERT INTO users(ad,soyad,photo,tel,email,parol,tarix) VALUES ('".$ad."', '".$soyad."','".$unvan."','".$tel."','".$email."','".$p."','".$tarix."' ) ");

              if ($qey==true) {
                        echo '<div class="alert alert-success" role="alert">Qeydiyyat uğurla həyata keçirildi</div>'; }
                      else{
                        echo '<div class="alert alert-danger" role="alert">Qeydiyyat uğursuzluğla nəticələndi</div>'; }

        }

        else{
          echo 'Parolunuzu yoxlayın.';  }  
      }


    if ($sayi>0) {
      echo '<div class="alert alert-danger" role="alert">Qeyd olunmuş email və ya nömrəyə aid profil var</div>';
    }

    }


   
}

?>


</div>