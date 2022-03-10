<?php
include"header.php";

echo '<div class="container">'; 
    

	$redad = trim($_POST['redad']);
	$redad = strip_tags($redad);
	$redad = htmlspecialchars($redad);
	$redad = mysqli_real_escape_string($con,$redad);

	$redsoyad = trim($_POST['redsoyad']);
	$redsoyad = strip_tags($redsoyad);
	$redsoyad = htmlspecialchars($redsoyad);
	$redsoyad = mysqli_real_escape_string($con,$redsoyad);

	$redshirket = trim($_POST['redshirket']);
	$redshirket = strip_tags($redshirket);
	$redshirket = htmlspecialchars($redshirket);
	$redshirket = mysqli_real_escape_string($con,$redshirket);

	$redtel = trim($_POST['redtel']);
	$redtel = strip_tags($redtel);
	$redtel = htmlspecialchars($redtel);
	$redtel = mysqli_real_escape_string($con,$redtel);

	$id = (int)$_POST['id'];
/*

if (!isset($_POST['edit'])) {
	echo '<form method="post" enctype="multipart/form-data">
	<input type="text" name="ad" class="form-control" placeholder="Ad daxil edin" autocomplete="off" ><br>
	<input type="text" name="soyad" class="form-control" placeholder="Soyad daxil edin" autocomplete="off"><br>
	<input type="text" name="shirket" class="form-control" placeholder="Şirkət daxil edin" autocomplete="off"><br>
	<input type="text" name="tel" class="form-control" placeholder="Telefon daxil edin" autocomplete="off"><br>
	<style>
			.loqo{
			border: 1px solid black;
			height: 40px;
			width: 100px;
			overflow: hidden;
			background: linear-gradient(to left ,grey,white);
			}
			.loqo>input{
				padding: 5px;
			}
			.loqo>button:active {
				background-color: green;
			}
		</style>
		<div class="loqo">
	<input type="file" name="foto" style="color: transparent;" >
	</div><br>
	<button type="submit" name="d" class="btn btn-success btn-sm">Daxil et</button>
	<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_clients.php">Excel</a>
  	</form>';
}
*/
if (isset($_POST['edit'])) {
	$sec = mysqli_query($con, " SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto FROM clients,users WHERE  clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND clients.id='".$id."' ");
	$info = mysqli_fetch_array($sec);
	echo '<form method="post" enctype="multipart/form-data">
			Brendin adi:<br>
			<input type="text" class="form-control" name="redad" value="'.$info['ad'].'" autocomlete="off"><br><br>
			<input type="text" class="form-control" name="redsoyad" value="'.$info['soyad'].'" autocomplete="off"><br><br>
			<input type="text" class="form-control" name="redshirket" value="'.$info['shirket'].'" autocomplete="off"><br><br>
			<input type="text" class="form-control" name="redtel" value="'.$info['tel'].'" autocomplete="off"><br><br>
			<div class="sss">
			<input type="file" name="foto" class="form-control"><img style="width:65px; height:52px;" src="'.$info['foto'].'"><br>
			</div>
			<input type="hidden" name="id" value="'.$info['id'].'" autocomplete="off">
			<input type="submit" name="update" class="btn btn-success btn-sm" value="Yenilə">
			<input type="submit" name="updates" class="btn btn-danger btn-sm" value="İmtina">
			<input type="submit" name="ssil" class="btn btn-danger btn-sm" value="Şəkli sil">
		</form><br>';

}

if (isset($_POST['ssil'])) {
	$unvan='foto/user.svg';
	$yenile = mysqli_query($con, "UPDATE clients SET foto='".$unvan."' WHERE id='".$id."' ");
			if ($yenile == true) {
				echo '<div class="alert alert-success" role="alert"> Profil şəkli silindi </div>';
			}
			else{
				echo '<div class="alert alert-danger" role="alert"> Profil şəklini simək mümkün olmadı </div>'; }
}

if (isset($_POST['update'])) {
	$sec = mysqli_query($con, " SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto FROM users,clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND  clients.id='".$id."' ");
	$info = mysqli_fetch_array($sec);
	if (!empty($redad) && !empty($redsoyad) && !empty($redshirket) && !empty($redtel)) {
		$yoxla = "WHERE tel='".$redtel."' AND clients.id!='".$id."' AND  clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ";
		$yoxlama = mysqli_query($con,"SELECT * FROM clients ".$yoxla." ") ;
		$sayi = mysqli_num_rows($yoxlama) ;
		if($sayi==0){
			include "upload.php";
			if ($unvan=='foto/') {
			$unvan=$info['foto'];
			}
			$yenile = mysqli_query($con, "UPDATE clients SET foto='".$unvan."',ad='".$redad."' , soyad='".$redsoyad."' , shirket='".$redshirket."' , tel='".$redtel."'  WHERE id='".$id."' ");
			if ($yenile == true) {
				echo '<div class="alert alert-success" role="alert"> Müştəri yeniləndi </div>';
			}
			else{
				echo '<div class="alert alert-danger" role="alert"> Müştərini yeniləmək mümkün olmadı </div>'; }
		}
		if ($sayi==1) {
				echo '<div class="alert alert-danger" role="alert">Bu nömre artıq istifadə olunub</div>';
			}	
	}
	else{
		echo '<div class="alert alert-info" role="alert"> Məlumatları tam doldurun</div>'; }
	
}
/*if (isset($_POST['sil'])) {
	$baza = mysqli_query($con,"SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto FROM users,clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND clients.id='".$_POST['id']."'");
 	$info = mysqli_fetch_array($baza);
	echo $info['ad'].' '.$info['soyad'].' adlı müştərini silmək istəyirsinizmi?';
	echo '<form method="post">
	<input type="submit" name="he" class="btn btn-success btn-sm" value="Hə">
	<input type="submit" name="yox" class="btn btn-danger btn-sm" value="Yox">
	<input type="hidden" name="id" value="'.$info['id'].'">
	</form>
	' ;
}*/
if (isset($_POST['he'])){
	$sil = mysqli_query($con,"DELETE FROM clients WHERE id= '".$id."' ");
	if ($sil == true) {
		echo '<div class="alert alert-success" role="alert"> Müştəri silindi</div>'; }
	else{
		echo '<div class="alert alert-danger" role="alert"> Müştərini silmək mümkün olmadı</div>';	}
}
/*
if (isset($_POST['d'])) {

	if (!empty($ad) && !empty($soyad) && !empty($shirket) && !empty($tel)) {

		$tel = str_replace(' ','',$tel);
		$tel = str_replace('-','',$tel);



		$yoxla = "WHERE clients.tel='".$tel."'  AND clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ";
		$yoxlama = mysqli_query($con,"SELECT * FROM users,clients ".$yoxla." ") ;
		$sayi = mysqli_num_rows($yoxlama) ;
		if($sayi==0){
			include "upload.php";
			if ($unvan=='foto/') {
				$unvan='foto/user.svg';
			}
			if (!isset($error)) {
					$daxil= mysqli_query($con, "INSERT INTO clients (foto,ad,soyad,shirket,tel,tarix,user_id) VALUES ('".$unvan."','".$ad."','".$soyad."','".$shirket."','".$tel."','".$tarix."','".$_SESSION['user_id']."') " );
				if ($daxil==true) {
					echo '<div class="alert alert-success" role="alert"> Müştəri daxil edildi</div>'; }
				else{
					echo '<div class="alert alert-danger" role="alert"> Müştəri daxil etmek mümkün olmadı</div>'; }
			}
		}
		if ($sayi==1) {
			echo 'Bu nömre artıq istifadə olunub';
		}
	}
	else{
		echo '<div class="alert alert-info" role="alert"> Məlumatları tam doldurun</div>'; }
}
*/


echo'<div id="data"><img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"></div>';



echo'
		</div>';
?>
<script>
	$(document).ready(function(){
		$.ajax({
			type: 'GET',
			url: 'getClients.php',
			dataType: 'html',
			success: function(response){
				$('#data').html(response)
			}
		})
	})


	$(document).on('click','.sil',function(){
		let sil_id = $(this).attr('id')

		if (confirm('Əməliyyatı icra etmək istəyirsinizmi?')) {
			html('<div id="data"><img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"></div>')
			$.ajax({
				type: 'POST',
				url: 'getClients.php',
				data: {silid:sil_id},
				success: function (response) {
					$('#data').html(response)
				}
			})
		}
		else
		{return false;}
		
	})



	$(document).on('click','#daxilet',function(){

        event.preventDefault();
        let form = $('#insertForm')[0];
 		let data = new FormData(form);
 
 
       // disabled the submit button
        //$("#btnSubmit").prop("disabled", true);
 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "getClients.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

               $('#data').html(response)
 
            },
           
        });
 
    });






	$(document).on('click','.f1',function(){
		
			let f1_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getClients.php',
			data:{f1:f1_id},
			success: function(response){
				$('#data').html(response)
				}
			})
			
		
	})

	$(document).on('click','.f2',function(){
		
			let f2_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getClients.php',
			data:{f2:f2_id},
			success: function(response){
				$('#data').html(response)
				}
			})
			
		
	})

	$(document).on('click','.f3',function(){
		
			let f3_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getClients.php',
			data:{f3:f3_id},
			success: function(response){
				$('#data').html(response)
				}
			})
			
		
	})


</script>