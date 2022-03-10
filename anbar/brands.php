<?php
include"header.php";


//<link rel="stylesheet" href="">


echo'<div class="container">';
	

/*if (isset($_POST['d'])) {

		if (!empty($ad)) {
			$yoxla = "WHERE brands.ad='".$ad."' AND brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND brands.id='".$id."' ";
			$yoxlama = mysqli_query($con, "SELECT users.id,brands.id AS bid,brands.ad,brands.foto,brands.user_id FROM users,brands ".$yoxla." ");
			$sayi = mysqli_num_rows($yoxlama);

			if ($sayi==0){

				include"upload.php";
				if ($unvan=='foto/') {
				$unvan='foto/bossekil.svg';
			}

				if(!isset($error))
				{
					if($_SESSION['token']==$_POST['token'])
					{
						$daxil= mysqli_query($con, "INSERT INTO brands(ad,foto,tarix,user_id) VALUES ('".$ad."','".$unvan."','".$tarix."','".$_SESSION['user_id']."') " );
						if ($daxil==true) {
							echo '<div class="alert alert-success" role="alert">Brend daxil edildi'.'</div>'; }
						else{
							echo '<div class="alert alert-danger" role="alert">Brend daxil etmek mümkün olmadı</div>'; }
					}
				}
			}
			if ($sayi==1)
				{ echo '<div class="alert alert-light" role="alert"> Bu brend artıq mövcuddur</div>'; }

		}
		else{
				echo '<div class="alert alert-warning" role="alert">Məlumatları tam doldurun</div>'; }
	}*/





	
	/*
	if (!isset($_POST['edit'])) {

		$token = md5(time());
		$_SESSION['token'] = $token;

		echo '
		<form method="post" enctype="multipart/form-data">
		<input type="text" name="ad" class="form-control" placeholder="Brend daxil edin" autocomplete="off">
		Loqo:<br>
		<div class="loqo">
		<input type="file" name="foto" class="sekil" style="color: transparent"  >
		</div><br>
		<button type="submit" name="d" class="btn btn-success btn-sm daxil">Daxil et</button>
		<input type="hidden" name="token" value="'.$_SESSION['token'].'">
		<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_brands.php" >Excel</a>
		</form>
			';
	}
	*/


	if (isset($_POST['ssil'])) {
			$unvan='foto/bossekil.svg';
					$yenile = mysqli_query($con, "UPDATE brands SET foto='".$unvan."' WHERE id='".$id."' ");
				if ($yenile == true) {
					echo '<div class="alert alert-success" role="alert">Şəkil silindi</div>';
				}
				else{
					echo '<div class="alert alert-danger" role="alert">Şəkli silmək mümkün olmadı</div>'; }		
	}


	/*if (isset($_POST['update'])) {
		$sec = mysqli_query($con, " SELECT users.id,brands.id AS bid,brands.ad,brands.foto,brands.user_id FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND brands.id='".$id."' ");
		$info = mysqli_fetch_array($sec);
		if (!empty($redad) ) {
		include "upload.php"; 	
		if ($unvan=='foto/') {
			$unvan=$info['foto'];
		}
			if (!isset($error)) {

					$yenile = mysqli_query($con, "UPDATE brands SET ad='".$redad."', foto='".$unvan."' WHERE brands.id='".$id."' ");
				if ($yenile == true) {
					echo '<div class="alert alert-success" role="alert">Brend yeniləndi</div>';
				}
				else{
					echo '<div class="alert alert-danger" role="alert">Brendi yeniləmək mümkün olmadı</div>'; }
				}
				
			}
			
		else{
			echo '<div class="alert alert-info" role="alert">Məlumatları tam doldurun</div>'; }
		
	}*/

	/*if (isset($_POST['sil'])) {
		$baza = mysqli_query($con,"SELECT users.id,brands.id AS bid,brands.ad,brands.foto,brands.user_id FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND brands.id='".$id."'");
	 	$info = mysqli_fetch_array($baza);
		echo '<div class="alert alert-light" role="alert">'.$info['ad'].' adlı brendi silmək istəyirsinizmi?';
		echo '<form method="post">
		<input type="submit" class="btn btn-success btn-sm" name="he" value="Hə">
		<input type="submit" class="btn btn-danger btn-sm" name="yox" value="Yox">
		<input type="hidden" name="id" value="'.$info['bid'].'">
		</form></div>
		' ;
	}*/



	

	if(isset($_POST['axtar']) && !empty($_POST['sorgu']))
	{
		if(strlen($_POST['sorgu'])==1)
		{$axtar = " AND (ad LIKE '".$_POST['sorgu']."%') ";}
		else
		{$axtar = " AND (ad LIKE '%".$_POST['sorgu']."%') ";}
	}
	else
	{$axtar = '';}

	




	echo'<div id="data"><img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"></div>';


?>
<script>
	$(document).ready(function(){ 
		$.ajax({
			type:'GET',
			url:'getBrands.php', 
			dataType:'html', 
			success: function(response){
				$('#data').html(response)
			}
		})
	 })



	$(document).on('click','.sil',function(){
		let sil_id = $(this).attr('id')

		
		if(confirm('Əməliyyatı icra etmək istəyirsinizmi?')){
			$('#data').html('<img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif">')
			$.ajax({
			type:'POST',
			url:'getBrands.php',
			data:{silid:sil_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		}
		else
		{return false;}
	} )

	$(document).on('click','.edit',function(){
		let update_id = $(this).attr('id')
			$('#data').html('<img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif">')
			$.ajax({
			type:'POST',
			url:'getBrands.php',
			data:{update:update_id},
			success: function(response){
				$('#data').html(response)
				}
			})

	} )


	$(document).on('click','.f1',function(){
		
			let f1_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getBrands.php',
			data:{f1:f1_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
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
            url: "getBrands.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

               $('#data').html(response)
 
            },
           
        });
 
    });
   	
   	$(document).on('click','#yenile',function(){

        event.preventDefault();
        let form = $('#updateForm')[0];
 		let data = new FormData(form);
 
 
       // disabled the submit button
        //$("#btnSubmit").prop("disabled", true);
 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "getBrands.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

               $('#data').html(response)
 
            },
           
        });
 
    });
 


</script>