<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 
echo $_POST['update'];
if (isset($_POST['update'])) {
		$sec = mysqli_query($con, " SELECT brands.user_id,brands.foto,brands.ad,brands.id AS bid,users.id FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND  brands.id='".$_POST['update']."' ");
		$info = mysqli_fetch_array($sec);
		echo '<form method="post" enctype="multipart/form-data" id="updateForm">
				<input type="text" class="form-control" name="redad" value="'.$info['ad'].'"><br>
				Loqo:<br>
				<input type="file" name="foto" class="form-control"><img style="width:65px; height:52px;" src="'.$info['foto'].'"><br>
				<input type="hidden" name="id" value="'.$info['bid'].'">
				<input type="hidden" name="yenile">
				<button type="submit" class="btn btn-success btn-sm" name="yenile" id="yenile">Yenilə</button>
				<button type="submit" class="btn btn-danger btn-sm" name="imtina">İmtina</button>
				<button type="submit" class="btn btn-danger btn-sm" name="ssil">Şəkli sil</button>
			</form>';

	}



	if (isset($_POST['yenile'])) {
		$redad = trim($_POST['redad']);
		$redad = strip_tags($redad);
		$redad = htmlspecialchars($redad);
		$redad = mysqli_real_escape_string($con,$redad);
		$sec = mysqli_query($con, " SELECT users.id,brands.id AS bid,brands.ad,brands.foto,brands.user_id FROM users,brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND brands.id='".$_POST['id']."' ");

		
		$info = mysqli_fetch_array($sec);
		if (!empty($redad) ) {
		include "upload.php"; 	
		if ($unvan=='foto/') {
			$unvan=$info['foto'];
		}
			if (!isset($error)) {

					$yenile = mysqli_query($con, "UPDATE brands SET ad='".$redad."', foto='".$unvan."' WHERE brands.id='".$_POST['id']."' ");


				if ($yenile == true) {
					echo '<div class="alert alert-success" role="alert">Brend yeniləndi</div>';
				}
				else{
					echo '<div class="alert alert-danger" role="alert">Brendi yeniləmək mümkün olmadı</div>'; }
				}
				
			}
			
		else{
			echo '<div class="alert alert-info" role="alert">Məlumatları tam doldurun</div>'; }
		
	}



if (isset($_POST['silid'])){
		$sil = mysqli_query($con,"DELETE FROM brands WHERE id= '".$_POST['silid']."' ");
		if ($sil == true) {
			echo '<div class="alert alert-success" role="alert">Brend silindi</div>'; }
		else{
			echo '<div class="alert alert-danger" role="alert">brendi silmək mümkün olmadı</div>';	}
	}




		if (!isset($_POST['update'])) {


			echo '
			<div class="alert alert-dark" role="alert">
			<form method="post" enctype="multipart/form-data" id="insertForm">
			<input type="text" name="ad" class="form-control" placeholder="Brend daxil edin" autocomplete="off">
			Loqo:<br>
			<div class="loqo">
			<input type="file" name="foto" class="sekil" style="color: transparent"  >
			</div><br>
			<input type="hidden" name="d">
			<button type="button" class="btn btn-success btn-sm daxil" id="daxilet">Daxil et</button>
			<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_brands.php" >Excel</a>
			</form>
			</div>';
		}


if (isset($_POST['d'])) {

		$ad = trim($_POST['ad']);
		$ad = strip_tags($ad);
		$ad = htmlspecialchars($ad);
		$ad = mysqli_real_escape_string($con,$ad);
		$id = (int)$_POST['id'];

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

					$daxil= mysqli_query($con, "INSERT INTO brands(ad,foto,tarix,user_id) VALUES ('".$ad."','".$unvan."','".$tarix."','".$_SESSION['user_id']."') " );
						if ($daxil==true) {
							echo '<div class="alert alert-success" role="alert">Brend daxil edildi'.'</div>'; }
						else{
							echo '<div class="alert alert-danger" role="alert">Brend daxil etmek mümkün olmadı</div>'; }
					
				}
			}
			if ($sayi==1)
				{ echo '<div class="alert alert-light" role="alert"> Bu brend artıq mövcuddur</div>'; }

		}
		else{
				echo '<div class="alert alert-warning" role="alert">Məlumatları tam doldurun</div>'; }
	}












	include"static.php";
//FILTER START

	if($_POST['f1']=='DESC')
	{
		$order = " ORDER BY brands.ad DESC ";
		$f1 = '<a href="#" id="ASC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </a>';
	}
	elseif($_POST['f1']=='ASC')
	{
		$order = " ORDER BY brands.ad ASC ";
		$f1 = '<a href="#" id="DESC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </a>';
	}
	else
	{
		$f1 = '<a href="#"  id="ASC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </a>';
	}

	if(!isset($_POST['f1']) && !isset($_GET['f2']))
	{$order = " ORDER BY brands.id DESC ";}

//FILTER END

if($_GET['f2']=='DESC')
	{
		$order = " ORDER BY brands.tarix DESC ";
		$f2 = '<a href="?f2=ASC">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
			  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
			  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
	elseif($_GET['f2']=='ASC')
	{
		$order = " ORDER BY brands.tarix ASC ";
		$f2 = '<a href="?f2=DESC">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
	else
	{
		$f2 = '<a href="?f2=ASC">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
$baza= mysqli_query($con, "SELECT * FROM users, brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."' ".$axtar.$order );
	$say = mysqli_num_rows($baza);

	echo'<div class="alert alert-info" role="alert">Bazada <b>'.$say.'</b> brend var</div>';

	if($say>0)
	{
		$i=0;

			echo'<div class="cedvel">
				<table class="table">
					<thead class="thead-dark">
						<th>#</th>
						<th>Loqo</th>
						<th>Brend '.$f1.'</th>
						<th>Tarix'.$f2.'</th>
						<th></th>
					</thead>

					<tbody>';

						while ($info=mysqli_fetch_array($baza)) { 
							$i++;
							echo'<tr>';
							echo'<td>'.$i.'</td>';
							echo'<td><img style="width:65px; height:52px;" src="'.$info['foto'].'"></td>';
							echo'<td>'.$info['ad'].'</td>';
							echo'<td>'.$info['tarix'].' </td>';
							echo '<td>
							<form method="post">
									<input type="hidden" name="id" value="'.$info['id'].'">

									<button type="submit" class="btn btn-dark btn-sm edit" id="'.$info['id'].'" name="edit">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
									  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
									  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
									</button>

									<button type="submit" id="'.$info['id'].'" class="btn btn-dark btn-sm sil" name="sil">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
									  <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
									</svg>
									</button>

								</form>
								</td>';
							echo'</tr>';
						}

			echo'
					</tbody>
			</table>
			</div>';
	}
	else
	{echo'<div class="alert alert-warning" role="alert">Axtardiğınız sorğu üzrə heç bir məlumat tapılmadı</div>';}
echo'</div>';

?>