<?php 
/*
Mushteri:<br>
<select name="client_id">
	<option value="">Mushterini secin</option>
	<option value="5">Farid Aliyev</option>
</select><br>

Mehsul:<br>
<select name="product_id">
	<option value="">Mehsulu secin</option>
	<option value="5">Zara - Kofta [250]</option>
</select><br>
Miqdar:<br>
<input type="text" name="miqdar">
<br><br>
<input type="submit" name="d" value="Daxil et">

# Mushteri		Brend	Mehsul	Alis   Satis   Miqdar   Sifarish   Qazanc   Tarix
1 Ferid Aliyev	Zara	Kofta	50	   150	   250     	50         400		2021-10-08  redakte sil 
*/
include "header.php";
	$miqdar = trim($_POST['miqdar']);
	$miqdar = strip_tags($miqdar);
	$miqdar = htmlspecialchars($miqdar);
	$miqdar = mysqli_real_escape_string($con,$miqdar);
echo '<form method="POST">
	Musteri:<br>
	<select name="client_id">
		<option value="">Musteri secin</option>';
		$mus= mysqli_query($con, "SELECT * FROM clients ORDER BY ad ASC");
	 	while($info=mysqli_fetch_array($mus))
	 		{ echo'<option value="'.$info['id'].'">'.$info['ad'].''.' '.''.$info['soyad'].'</option> '; }
echo'		
	</select ><br><br>
	Mehsulu secin:<br>
	<select name="product_id">
		<option value="">Mehsulu secin</option>';
		$sec = mysqli_query($con, " SELECT brands.ad AS brend, 
										tasks.id, 
										products.ad AS mehsul,
										products.tarix FROM brands,products WHERE tasks.id=products.brand_id AND products.brand_id=brands.id AND tasks.id='".$id."'   ");
	$infob = mysqli_fetch_array($sec);
	 		{ echo'<option value="'.$infob['id'].'">'.$infob['brend'].''.$infob['mehsul'].'</option> '; }
echo'
	</select><br><br>
	Miqdar:<br>
	<input type="text" name="miqdar"><br><br>
	<button type="sumbit" name="d" >Daxil et</button>
</form>';

if (isset($_POST['d'])) {
	if (!empty($miqdar)) {
		$daxil= mysqli_query($con, "INSERT INTO tasks (client_id, product_id, miqdar, tarix) VALUES ('".$_POST['client_id']."','".$_POST['product_id']."','".$miqdar."','".$tarix."') ");
		if($daxil==true)
			{echo 'Sifaris qebul olundu';}
		else
			{echo 'Sifaris qebul olmadi';}
	}

	else
		{ echo 'Melumatlari tam ddoldurun';}

}



?>
