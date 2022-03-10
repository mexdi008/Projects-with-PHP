<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 







$miqdar = trim($_POST['miqdar']);
		$miqdar = strip_tags($miqdar);
		$miqdar = htmlspecialchars($miqdar);
		$miqdar = mysqli_real_escape_string($con,$miqdar);


echo '<div class="alert alert-dark" role="alert">';
	if (!isset($_POST['edit'])) {
		echo'<form method="POST" id="insertForm">
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
		<input type="hidden" name="d">
		<button type="submit" class="btn btn-success btn-sm" id="daxilet" name="d">Daxil et</button>
		
		
	</form>';
	}


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
echo '</div>';







if (isset($_POST['silid'])){
		$sil = mysqli_query($con,"DELETE FROM orders WHERE id= '".$_POST['silid']."' ");
		if ($sil == true) {
			echo '<div class="alert alert-success" role="alert">Sifariş silindi</div>'; }
		else{
			echo '<div class="alert alert-danger" role="alert">Sifarişi silmək mümkün olmadı</div>';	}
	}


include"static.php";



	if($_POST['f1']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f1 = '<span id="ASC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f1']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f1 = '<span id="DESC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f1 = '<span id="ASC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}


	if($_POST['f2']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f2 = '<span id="ASC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f2']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
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
		$order = " ORDER BY ad DESC ";
		$f3 = '<span id="ASC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f3']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
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


	if($_POST['f4']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f4 = '<span id="ASC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f4']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f4 = '<span id="DESC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f4 = '<span id="ASC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}


	if($_POST['f5']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f5 = '<span id="ASC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f5']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f5 = '<span id="DESC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f5 = '<span id="ASC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}


	if($_POST['f6']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f6 = '<span id="ASC" class="f6">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f6']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f6 = '<span id="DESC" class="f6">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f6 = '<span id="ASC" class="f6">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

	if($_POST['f7']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f7 = '<span id="ASC" class="f7">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f7']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f7 = '<span id="DESC" class="f7">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f7 = '<span id="ASC" class="f7">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

	if($_POST['f8']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f8 = '<span id="ASC" class="f8">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f8']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f8 = '<span id="DESC" class="f8">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f8 = '<span id="ASC" class="f8">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

	if($_POST['f9']=='DESC')
	{
		$order = " ORDER BY ad DESC ";
		$f9 = '<span id="ASC" class="f9">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f9']=='ASC')
	{
		$order = " ORDER BY ad ASC ";
		$f9 = '<span id="DESC" class="f9">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
				  <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z"/>
				  <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z"/>
				  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	else
	{
		$f9 = '<span id="ASC" class="f9">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}

if(!isset($_POST['f1']) && !isset($_POST['f2']) && !isset($_POST['f3']) && !isset($_POST['f4']) && !isset($_POST['f5']) && !isset($_POST['f6']) && !isset($_POST['f7']) && !isset($_POST['f8']) && !isset($_POST['f9']) )
	{$order = " ORDER BY id DESC ";}

	$cek = mysqli_query($con, "SELECT 
								orders.id,
								orders.tesdiq,
								brands.foto AS bf,
								clients.foto AS cf,
								products.id AS pid,
								products.ad AS mehsul,
								brands.ad AS brend,
								products.alis,
								products.satis,
								products.miqdar, 
								clients.ad AS ad,
								clients.soyad,
								orders.miqdar AS sifaris,
								orders.tarix
								FROM users,orders, products, clients, brands WHERE orders.product_id=products.id AND orders.client_id=clients.id AND products.brand_id=brands.id AND orders.user_id=users.id AND users.id='".$_SESSION['user_id']."' ".$order);

	echo '<div class="cedvel">
	<table class="table">
	<thead class="thead-dark">
		<th>Musteri'.$f1.'</th>
		<th>Brend'.$f2.'</th>
		<th>Mehsul'.$f3.'</th>
		<th>Alis</th>
		<th>Satis</th>
		<th>Miqdar'.$f6.'</th>
		<th>Sifaris'.$f7.'</th>
		<th>Qazanc'.$f8.'</th>
		<th>Tarix'.$f9.'</th>
		<th></th>
	</thead>
	<tbody>';
	while($ceinfo = mysqli_fetch_array($cek)){
	$qazanc = ($ceinfo['satis'] - $ceinfo['alis'])*$ceinfo['sifaris'];
	echo '<tr>';
	echo '<td><img style=" width:30px; height:30px;" src="'.$ceinfo['cf'].'"> '.$ceinfo['ad'].' '.$ceinfo['soyad'].'</td>';
	echo '<td> <img style=" width:30px; height:30px;" src="'.$ceinfo['bf'].'"> '.$ceinfo['brend'].'</td>';
	echo '<td>'.$ceinfo['mehsul'].'</td>';
	echo '<td>'.$ceinfo['alis'].'</td>';
	echo '<td>'.$ceinfo['satis'].'</td>';
	echo '<td>'.$ceinfo['miqdar'].'</td>';
	echo '<td>'.$ceinfo['sifaris'].'</td>';
	echo '<td>'.$qazanc.'</td>';
	echo '<td>'.$ceinfo['tarix'].'</td>';
	echo '<td>	<form method="POST">
			<input type="hidden" name="id" value="'.$ceinfo['id'].'">
			<input type="hidden" name="pid" value="'.$ceinfo['pid'].'">
			<input type="hidden" name="smiq" value="'.$ceinfo['sifaris'].'">
			<input type="hidden" name="pmiq" value="'.$ceinfo['miqdar'].'">';

			if($ceinfo['tesdiq']==0)
			{
				echo'
				<input type="submit" name="edit" class="btn btn-success btn-sm"  value="Redaktə">
				<input type="submit" name="sil" class="btn btn-danger btn-sm sil" id="'.$ceinfo['id'].'" value="Sil">
				<button type="submit" name="tesdiq" class="btn btn-success btn-sm" title="Təsdiq et"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
				  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
				</svg>
				</button>';
			}
			else
			{
				echo'
				<button type="submit" name="inkar" class="btn btn-danger btn-sm" title="Ləğv et">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
				  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
				</svg>
				</button>';
			}

				echo'
			</form>
			</td>';
	}
	echo '</tr>
	</tbody>
	</table>
	</div>';
?>