<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 





$ad = trim($_POST['ad']);
	$ad = strip_tags($ad);
	$ad = htmlspecialchars($ad);
	$ad = mysqli_real_escape_string($con,$ad);

	$soyad = trim($_POST['soyad']);
	$soyad = strip_tags($soyad);
	$soyad = htmlspecialchars($soyad);
	$soyad = mysqli_real_escape_string($con,$soyad);

	$shirket = trim($_POST['shirket']);
	$shirket = strip_tags($shirket);
	$shirket = htmlspecialchars($shirket);
	$shirket = mysqli_real_escape_string($con,$shirket);

	$tel = trim($_POST['tel']);
	$tel = strip_tags($tel);
	$tel = htmlspecialchars($tel);
	$tel = mysqli_real_escape_string($con,$tel);

echo '<div class="alert alert-secondary" role="alert">';
if (!isset($_POST['edit'])) {
	echo '<form method="post" enctype="multipart/form-data" id="insertForm">
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
	<input type="hidden" name="d">	
	<button type="submit" name="d" class="btn btn-success btn-sm" id="daxilet">Daxil et</button>
	<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_clients.php">Excel</a>
  	</form>';
}
echo '</div>';
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














if (isset($_POST['silid'])){
	$sil = mysqli_query($con,"DELETE FROM clients WHERE id= '".$_POST['silid']."' ");
	if ($sil == true) {
		echo '<div class="alert alert-success" role="alert"> Müştəri silindi</div>'; }
	else{
		echo '<div class="alert alert-danger" role="alert"> Müştərini silmək mümkün olmadı</div>';	}
}










include"static.php";

if($_POST['f1']=='DESC')
	{
		$order = " ORDER BY clients.ad DESC ";
		$f1 = '<span id="ASC" class="f1" style="cursor:pointer;">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alphaj-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f1']=='ASC')
	{
		$order = " ORDER BY clients.ad ASC ";
		$f1 = '<span id="DESC" class="f1" style="cursor:pointer;">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f1 = '<span id="ASC" class="f1" style="cursor:pointer;">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

	


if($_POST['f2']=='DESC')
	{
		$order = " ORDER BY clients.shirket DESC ";
		$f2 = '<span id="ASC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f2']=='ASC')
	{
		$order = " ORDER BY clients.shirket ASC ";
		$f2 = '<span id="DESC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f2 = '<span id="ASC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}




	if($_POST['f3']=='DESC')
	{
		$order = " ORDER BY clients.tarix DESC ";
		$f3 = '<span id="ASC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		 </span>';
	}
	elseif($_POST['f3']=='ASC')
	{
		$order = " ORDER BY clients.tarix ASC ";
		$f3 = '<span id="DESC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f3 = '<span id="ASC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

	if(!isset($_POST['f1']) && !isset($_POST['f2']) && !isset($_POST['f3']))
	{$order = " ORDER BY clients.id DESC ";}

$baza= mysqli_query($con, "SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto,clients.tarix FROM users, clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ".$order );
$say= mysqli_num_rows($baza);
echo'<div class="alert alert-info" role="alert">Bazada <b>'.$say.'</b> müştəri var</div>';
$i=0;
echo '	<div class="cedvel">
		<table class="table">
		<thead class="thead-dark">
			<th>#</th>
			<th>Profil</th>
			<th>Müştəri'.$f1.'</th>
			<th>Şirkət'.$f2.'</th>
			<th>Əlaqə nömrəsi</th>
			<th>Tarix'.$f3.'</th>
			<th></th>
		</thead>
		<tbody>';
while ($info=mysqli_fetch_array($baza)) {
	$i++;
	echo '<tr>';
	echo '<td>'.$i.'</td>';
	echo '<td><img style="width:65px; height:52px;" src="'.$info['foto'].'"></td>';
	echo '<td>'.$info['ad'].' '.$info['soyad'].'</td>';
	echo '<td>'.$info['shirket'].'</td>';
	echo '<td>'.$info['tel'].'</td>';
	echo '<td>'.$info['tarix'].'</td>';

	echo '<td> <form method="post">
			<input type="hidden" name="id" value="'.$info['id'].'">
			<input type="submit" name="edit" class="btn btn-success btn-sm"  value="Redaktə">
			<input type="submit" name="sil" class="btn btn-danger btn-sm sil" id="'.$info['id'].'" value="Sil">
		</form><br> </td>';
}
echo '  </tr>
		</tbody>
		</table>
		</div>';

?>