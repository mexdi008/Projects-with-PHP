<?php
include"header.php";

echo '<div class="container">'; 
    

	$redad = trim($_POST['redad']);
	$redad = strip_tags($redad);
	$redad = htmlspecialchars($redad);
	$redad = mysqli_real_escape_string($con,$redad);

	$redalis = trim($_POST['redalis']);
	$redalis = strip_tags($redalis);
	$redalis = htmlspecialchars($redalis);
	$redalis = mysqli_real_escape_string($con,$redalis);

	$redsatis = trim($_POST['redsatis']);
	$redsatis = strip_tags($redsatis);
	$redsatis = htmlspecialchars($redsatis);
	$redsatis = mysqli_real_escape_string($con,$redsatis);

	$redmiqdar = trim($_POST['redmiqdar']);
	$redmiqdar = strip_tags($redmiqdar);
	$redmiqdar = htmlspecialchars($redmiqdar);
	$redmiqdar = mysqli_real_escape_string($con,$redmiqdar);

	$id = (int)$_POST['id'];







/*
if (!isset($_POST['edit'])) {
	echo '<form method="post">
	<select name="brand_id" class="form-control">
		<option value="">Brend seçin</option>';

		$bsec = mysqli_query($con,"SELECT * FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."'  ");

		while($binfo = mysqli_fetch_array($bsec))
		{echo'<option value="'.$binfo['id'].'">'.$binfo['ad'].'</option>';}

	echo'
	</select><br>
	<input type="text" name="ad" class="form-control" placeholder="Məhsul daxil edin" autocomplete="off" ><br>
	<input type="text" name="alis" class="form-control" placeholder="alış" autocomplete="off"><br>
	<input type="text" name="satis" class="form-control" placeholder="satış" autocomplete="off"><br>
	<input type="text" name="miqdar"class="form-control" placeholder="miqdar" autocomplete="off"><br>	
	<button type="submit" name="d" class="btn btn-success btn-sm">Daxil et</button>
	<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_products.php">Excel</a>
  	</form>';
}
*/
if (isset($_POST['edit'])) {
	//$sec = mysqli_query($con, " SELECT * FROM products WHERE id='".$id."' ");
	$sec = mysqli_query($con, " SELECT brands.ad AS brend, 
										products.id , 
										products.miqdar,
										products.satis,
										products.alis,
										products.ad AS mehsul,
										products.tarix FROM users,brands,products WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND products.id='".$id."'   ");
	$info = mysqli_fetch_array($sec);
	echo '<form method="post">
	<select name="brand_id" class="form-control">
		<option value="">'.$info['brend'].'</option>';

		$bsec = mysqli_query($con,"SELECT * FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND  ad!='".$info['brend']."' ORDER BY ad ASC");

		while($binfo = mysqli_fetch_array($bsec))

		{echo'<option value="'.$binfo['id'].'">'.$binfo['ad'].'</option>';}
	echo '	</select><br>
			<input type="text" class="form-control" name="redad" value="'.$info['mehsul'].'" autocomlete="off"><br><br>
			<input type="text" class="form-control" name="redalis" value="'.$info['alis'].'" autocomplete="off"><br><br>
			<input type="text" class="form-control" name="redsatis" value="'.$info['satis'].'" autocomplete="off"><br><br>
			<input type="text" class="form-control" name="redmiqdar" value="'.$info['miqdar'].'" autocomplete="off"><br><br>
			<input type="hidden" name="id" value="'.$info['ppid'].'" autocomplete="off">
			<input type="submit" name="update" class="btn btn-success btn-sm" value="Yenilə">
			<input type="submit" name="updates" class="btn btn-danger btn-sm" value="İmtina">
		</form><br>';

}


if (isset($_POST['update'])) {
	if (!empty($redad) && !empty($redalis) && !empty($redsatis) && !empty($redmiqdar)) {
			$yenile = mysqli_query($con, "UPDATE products SET brand_id='".$_POST['brand_id']."', ad='".$redad."' , alis='".$redalis."' , satis='".$redsatis."' , miqdar='".$redmiqdar."'  WHERE id='".$id."' ");
			if ($yenile == true) {
				echo '<div class="alert alert-success" role="alert"> Məhsul yeniləndi </div>';
			}
			else{
				echo '<div class="alert alert-danger" role="alert"> Məhsulu yeniləmək mümkün olmadı </div>'; }
			
	}
	else{
		echo '<div class="alert alert-info" role="alert"> Məlumatları tam doldurun</div>'; }
	
}
/*if (isset($_POST['sil'])) {
	$baza = mysqli_query($con,"SELECT products.id, products.ad FROM users,products WHERE products.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND products.id='".$_POST['id']."'");
 	$info = mysqli_fetch_array($baza);
	echo $info['ad'].' adlı məhsulu silmək istəyirsinizmi?';
	echo '<form method="post">
	<input type="submit" name="he" class="btn btn-success btn-sm" value="Hə">
	<input type="submit" name="yox" class="btn btn-danger btn-sm" value="Yox">
	<input type="hidden" name="id" value="'.$info['id'].'">
	</form>
	' ;
}*/
/*
if (isset($_POST['d'])) {

	if (!empty($ad) && !empty($alis) && !empty($satis) && !empty($miqdar)) {
			$daxil= mysqli_query($con, "INSERT INTO products (brand_id,ad,alis,satis,miqdar,tarix,user_id) VALUES ('".$_POST['brand_id']."','".$ad."','".$alis."','".$satis."','".$miqdar."','".$tarix."','".$_SESSION['user_id']."') " );
			if ($daxil==true) {
				echo '<div class="alert alert-success" role="alert"> Məhsul daxil edildi</div>'; }
			else{
				echo '<div class="alert alert-danger" role="alert"> Məhsul daxil etmek mümkün olmadı</div>'; }
	}
	else{
		echo '<div class="alert alert-info" role="alert"> Məlumatları tam doldurun</div>'; }
}
*/
echo'<div id="data"><img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"></div>';

echo '</div>';
		
?>


<script>
	$(document).ready(function(){
		$.ajax({
			type:'GET',
			url:'getProducts.php',
			dataType:'html',
			success: function(response){
				$('#data').html(response)
			}

		})
	})

	$(document).on('click','.sil',function(){
		let sil_id = $(this).attr('id')

		if(confirm('Silmək istədiyinizdən əminsinizmi?')){
			$('#data').html('<img class="rounded mx-auto d-block" style="width:95px; height:95px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif">')

			$.ajax({
				type:'POST',
				url:'getProducts.php',
				data:{silid:sil_id},
				success: function(response){
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
            url: "getProducts.php",
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
			url:'getProducts.php',
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
			url:'getProducts.php',
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
			url:'getProducts.php',
			data:{f3:f3_id},
			success: function(response){
				$('#data').html(response)
			}

		})
	})

	$(document).on('click','.f4',function(){
		let f4_id = $(this).attr('id')

		$.ajax({
			type:'POST',
			url:'getProducts.php',
			data:{f4:f4_id},
			success: function(response){
				$('#data').html(response)
			}

		})
	})

	$(document).on('click','.f5',function(){
		let f5_id = $(this).attr('id')

		$.ajax({
			type:'POST',
			url:'getProducts.php',
			data:{f5:f5_id},
			success: function(response){
				$('#data').html(response)
			}

		})
	})
</script>