<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 

if(isset($_SESSION['email']) && isset($_SESSION['parol']))
{echo'<meta http-equiv="refresh" content="0; URL=orders.php">'; exit;}
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<style>
  .gradient-custom-2 {
  /* fallback for old browsers */
  background: #fccb90;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
  .gradient-form {
    height: 100vh !important;
  }
}
@media (min-width: 769px) {
  .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
  }
}
</style>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="foto/logo.jpg" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Uğurlu biznesin sirri</h4>
                </div>

                  <p>Məlumatları tam doldurmağa diqqət edin!</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email:</label>
                    <input class="form-control mr-sm-2" type="email" name="email" placeholder="Email" aria-label="Search">
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Şifrə:</label>
                    <input class="form-control mr-sm-2" type="password" name="parol" placeholder="Parol" aria-label="Search">
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button" name="daxilol">Daxil ol</button>
                    <a class="text-muted" href="#!">Şifrəni unutduz?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Hesabınız yoxdur?</p>
                    <button type="button" class="btn btn-outline-danger">Yeni hesab yarat</button>
                  </div>      
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Bizə qoşul və inamla addımla.</h4>
                <p class="small mb-0">Bizim anbar xidmətlərimizdən ödəniş etmədən istifadə edə bilərsiniz. Anbar xidmətinin yardımıyla daha sərbəst işləmə qabiliyyətiniz olacaq. İstədiyiniz yerdən nəzarət etmə haqqınız olacaqki, bu da öz növbəsində işçilərinizə nəzarət etmək üçün əla fürsətdir. Vaxt itirmə, yoluna bizimlə davam et!.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
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
?>