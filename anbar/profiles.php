<?php
include "header.php";

echo '<div class="container">';  
if (!isset($_POST['d1']) && !isset($_POST['d2']) && !isset($_POST['d3']) && !isset($_POST['d4'])) {
	echo '<form method="post" enctype="multipart/form-data">
		<button type="submit" name="d1" class="btn btn-success btn-sm; form-control" style="margin: 2px;">Prolfil adını dəyiş</button><br>
		<button type="submit" name="d2" class="btn btn-success btn-sm; form-control" style="margin: 2px;">Parolunu dəyiş</button><br>
		<button type="submit" name="d3" class="btn btn-success btn-sm; form-control" style="margin: 2px;">Emaili dəyiş</button><br>
		<button type="submit" name="d4" class="btn btn-success btn-sm; form-control" style="margin: 2px;">Yardım</button><br>
    </form>'; 
}
if (isset($_POST['d1'])) {

	echo'<form method="post">
	<input type="text" name="nad" class="form-control" value="'.$_SESSION['ad'].'" autocomplete="off" ><br>
  	<input type="text" name="nsoyad" class="form-control" value="'.$_SESSION['soyad'].'" autocomplete="off"><br>
  	<input type="hidden" name="id" value="'.$_SESSION['user_id'].'">
  	<button type="submit" name="d5" class="btn btn-success btn-sm">Yenilə</button>
  	<button type="submit" name="d6" class="btn btn-success btn-sm">İmtina</button>
  	</form>';
}

if (isset($_POST['d5']) ) {
	if (!empty($_POST['nad']) && !empty($_POST['nsoyad'])) {
		$daxil=mysqli_query($con, "UPDATE users SET ad='".$_POST['nad']."', soyad='".$_POST['nsoyad']."' WHERE id='".$_POST['id']."' ");
	if ($daxil==true) {
		echo 'Profil adınız yeniləndi';
	}
	else{
		echo 'Yeniləmək mümkün olmadı';
	}
	}
	

	else{
	echo 'Məlumatları tam doldurun';
}
}



if (isset($_POST['d2'])) {
	echo'<form method="post">
	<input type="text" name="nparol" class="form-control" placeholder="Parolunuzu yazın" autocomplete="off" ><br>
  	<input type="text" name="nnparol" class="form-control" placeholder="Yeni parolu yazın" autocomplete="off"><br>
  	<input type="text" name="ntparol" class="form-control" placeholder="Yeni parolu təkrar yazın" autocomplete="off"><br>
  	<input type="hidden" name="id" value="'.$_SESSION['user_id'].'">
  	<button type="submit" name="d7" class="btn btn-success btn-sm">Yenilə</button>
  	<button type="submit" name="d8" class="btn btn-success btn-sm">İmtina</button>
  	</form>';
}

if (isset($_POST['d7']) ) {
	if (!empty($_POST['nparol']) && !empty($_POST['nnparol']) && !empty($_POST['ntparol'])) {
		if ($_SESSION['parol']==$_POST['nparol'] && $_POST['nnparol']==$_POST['ntparol']) {
		$daxilparol=mysqli_query($con, "UPDATE users SET parol='".$_POST['nnparol']."' WHERE id='".$_POST['id']."' ");
		if ($daxilparol==true) {
			echo 'Parolunuz yeniləndi';
		}
		else{
			echo 'Yeniləmək mümkün olmadı';
		}
	}
	}
	

	else{
		echo 'Parol yeniləmə uğursuz oldu. Məlumatların doğruluğunu yoxlayın';
	}
	
}



echo '</div>';
?>