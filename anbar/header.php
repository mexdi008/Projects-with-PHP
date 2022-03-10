<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 

if(!isset($_SESSION['email']) or !isset($_SESSION['parol']))
{echo'<meta http-equiv="refresh" content="0; URL=index.php">'; exit;}
?>

<link rel="stylesheet" href="style.css" >

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php 

echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Anbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="brands.php">Brend</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="products.php">Məhsul</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="clients.php">Müştəri</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="orders.php">Sifariş</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="xerc.php">Xərc</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="exit.php">Çıxış</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="mesaj.php">Mesaj</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="profiles.php">Hesabım</a>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="text" name="sorgu" placeholder="Axtar..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="axtar" type="submit">Axtar</button> &nbsp;
      <button class="btn btn-outline-success my-2 my-sm-0" name="all" type="submit">Hamısı</button>
    </form>
  </div>
</nav>
<br><br><br><br>
';

?>
