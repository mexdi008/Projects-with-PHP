<?php
include "header.php";


echo'<div class="container">';


		$redmiqdar = trim($_POST['redmiqdar']);
		$redmiqdar = strip_tags($redmiqdar);
		$redmiqdar = htmlspecialchars($redmiqdar);
		$redmiqdar = mysqli_real_escape_string($con,$redmiqdar);



/*
	if (!isset($_POST['edit'])) {
		echo'<form method="POST">
		<select class="form-control" name="client_id">
			<option value="">Müştəri seçin</option>';
		$mus = mysqli_query($con, "SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto FROM users,clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ORDER BY ad ASC");
		while($info = mysqli_fetch_array($mus))
			{echo'<option value="'.$info['id'].'">'.$info['ad'].''.' '.''.$info['soyad'].'</option>';}
	echo '		
		</select><br>
		<select class="form-control" name="product_id">
			<option value="">Məhsul seçin</option>';
		$meh = mysqli_query($con, "SELECT products.id, products.ad AS mehsul, brands.ad AS brend, products.miqdar, brands.foto FROM users, products, brands WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' ORDER BY products.ad ASC");
		while($minfo = mysqli_fetch_array($meh))
			{ echo'<option value="'.$minfo['id'].'">'.$minfo['brend'].''.'-'.''.$minfo['mehsul'].'['.$minfo['miqdar'].']</option>';}
	echo '
		</select><br>
		<input type="text" class="form-control" name="miqdar"><br>
		<button type="submit" class="btn btn-success btn-sm" name="d">Daxil et</button>
		
		
	</form>';
	}
*/

	if (isset($_POST['edit'])) {
		$baza = mysqli_query($con, "SELECT 
								orders.id,
								clients.id AS idc,
								products.id AS idp,
								orders.miqdar,
								products.ad AS mehsul,
								brands.ad AS brend, 
								clients.ad AS ad,
								clients.soyad
								FROM users,orders, products, clients, brands WHERE orders.product_id=products.id AND orders.client_id=clients.id AND products.brand_id=brands.id AND orders.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND orders.id='".$_POST['id']."'
								 ORDER BY orders.id ASC") ;
	 	$infob = mysqli_fetch_array($baza);
			echo'<form method="POST">

		<select class="form-control" name="client_id">
			<option value="'.$infob['idc'].'">'.$infob['ad'].' '.$infob['soyad'].'</option>';
		$mus = mysqli_query($con, "SELECT * FROM users,clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ad!='".$infob['ad']."'   ORDER BY ad ASC");
		while($info = mysqli_fetch_array($mus))
			{echo'<option value="'.$info['id'].'">'.$info['ad'].' '.$info['soyad'].'</option>';} 
	echo '		
		</select><br>

		<select class="form-control" name="product_id">
			<option value="'.$infob['idp'].'">'.$infob['brend'].' '.$infob['mehsul'].'</option>';
		$meh = mysqli_query($con, "SELECT products.id, products.ad AS mehsul, brands.ad AS brend FROM users,products, brands WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' ORDER BY products.ad ASC");
		while($minfo = mysqli_fetch_array($meh))
			{ echo'<option value="'.$minfo['id'].'">'.$minfo['brend'].'-'.$minfo['mehsul'].'</option>';}

	echo '
		</select><br>
		<input type="hidden" name="id" value="'.$infob['id'].'">
		<input type="text" class="form-control" name="redmiqdar" value="'.$infob['miqdar'].'"><br>
		<button type="submit" class="btn btn-success btn-sm" name="update">Yenilə</button>
		<button type="submit" class="btn btn-success btn-sm" name="update">İmtina</button>
	</form>';
		}


	if (isset($_POST['update'])) {
		$updates= mysqli_query($con, "UPDATE orders SET client_id='".$_POST['client_id']."', product_id='".$_POST['product_id']."', miqdar='".$redmiqdar."' WHERE id='".$_POST['id']."' ");


		if ($updates==true) {
				echo '<div class="alert alert-success" role="alert"> Sifariş yeniləndi </div>';
			}
			else{
				echo '<div class="alert alert-danger" role="alert"> Sifarişi yeniləmək mümkün olmadı </div>'; }
	}


	 

	/*if (isset($_POST['sil'])) {
		$baza = mysqli_query($con,"SELECT orders.id,clients.ad,clients.soyad FROM users,orders,clients WHERE orders.client_id=clients.id AND orders.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND orders.id='".$_POST['id']."' ");
	 	$infob = mysqli_fetch_array($baza);
		echo '<div class="alert alert-light" role="alert"> '.$infob['ad'].' '.$infob['soyad'].' adlı müştərinin sifarişini silmək istəyirsinizmi?';
		echo '<form method="post">
		<input type="submit" class="btn btn-success btn-sm" name="he" value="Hə">
		<input type="submit" class="btn btn-danger btn-sm" name="yox" value="Yox">
		<input type="hidden" name="id" value="'.$infob['id'].'">
		</form></div>
		' ;
	}*/


/*
	if (isset($_POST['d'])) {
		if (!empty($miqdar) && !empty($_POST['client_id']) && !empty($_POST['product_id']) ){
			$daxil = mysqli_query($con, "INSERT INTO orders(client_id,product_id,miqdar,tarix,user_id) VALUES ('".$_POST['client_id']."','".$_POST['product_id']."','".$miqdar."', '".$tarix."','".$_SESSION['user_id']."') ");
			if ($daxil==true) {
				echo'<div class="alert alert-success" role="alert">Sifariş qeydə alındı</div>'; }
			else{
				echo'<div class="alert alert-danger" role="alert">Sifarişi qeydə almaq mümkün olmadı</div>';}
		}

		else {
			echo'<div class="alert alert-info" role="alert">Məlumatları tam doldurun</div>';}	 
	}

*/
	if(isset($_POST['tesdiq']))
	{
		if($_POST['smiq']<=$_POST['pmiq'])
		{
			$ptesdiq = mysqli_query($con,"UPDATE products SET miqdar=miqdar-".$_POST['smiq']." WHERE id='".$_POST['pid']."'");

			if($ptesdiq==true)
			{
				$stesdiq = mysqli_query($con,"UPDATE orders SET tesdiq=1 WHERE id='".$_POST['id']."'");

				if($ptesdiq==true)
				{echo'<div class="alert alert-success" role="alert">Sifarişiniz təsdiq olundu</div>';}
				else
				{
					echo'<div class="alert alert-danger" role="alert">Sifarişinizi təsdiq etmək mümkün olmadı</div>';

					$ptesdiq = mysqli_query($con,"UPDATE products SET miqdar=miqdar+".$_POST['smiq']." WHERE id='".$_POST['pid']."'");
				}



			}
		}
		else
		{echo'<div class="alert alert-info" role="alert">Sifarişi təsdiq etmək üçün anbarda kifayət qədər məhsul yoxdur</div>';}

	}

	if (isset($_POST['inkar'])) {
		$pinkar = mysqli_query($con, "UPDATE products SET miqdar=miqdar+".$_POST['smiq']." WHERE  id='".$_POST['pid']."' ");

		if ($pinkar==true) {
			$stesdiq = mysqli_query($con, "UPDATE orders SET tesdiq=0 WHERE id='".$_POST['id']."' ");
			if ($pinkar==true) {
			echo '<div class="alert alert-success" role="alert">Sifarişiniz ləğv edildi</div>';	}
			else{
			echo '<div class="alert alert-danger" role="alert">Sifarişinizi ləğv etmək mümkün olmadı</div>';  }

		}
			
	}

	echo'<div id="data"><img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"></div>';
	
?>
</div>
<script>
	$(document).ready(function(){
		$.ajax({
			type:'GET',
			url:'getOrders.php',
			dataType:'html',
			success: function(response){
				$('#data').html(response)
			}
		})
	})

	$(document).on('click','.sil',function(){
		let sil_id = $(this).attr('id')

		if(confirm('Sifarişi silmək istədiyinizdən əminsinizmi?')){
			$('#data').html('<img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif">')
			$.ajax({
				type:'POST',
				url:'getOrders.php',
				data:{silid:sil_id},
				success: function(response){
					$('#data').html(response)
				}
			})
		}
		else{
			return false;
		}
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
            url: "getOrders.php",
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
			url:'getOrders.php',
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
			url:'getOrders.php',
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
			url:'getOrders.php',
			data:{f3:f3_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})

	$(document).on('click','.f6',function(){
		
			let f6_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getOrders.php',
			data:{f6:f6_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})

	$(document).on('click','.f6',function(){
		
			let f6_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getOrders.php',
			data:{f6:f6_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})

	$(document).on('click','.f7',function(){
		
			let f7_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getOrders.php',
			data:{f7:f7_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})

	$(document).on('click','.f8',function(){
		
			let f8_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getOrders.php',
			data:{f8:f8_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})

	$(document).on('click','.f9',function(){
		
			let f9_id = $(this).attr('id')

			$.ajax({
			type:'POST',
			url:'getOrders.php',
			data:{f9:f9_id},
			success: function(response){
				$('#data').html(response)
				}
			})
		
	})



</script>