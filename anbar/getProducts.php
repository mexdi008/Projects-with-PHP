<?php
session_start();
$con = mysqli_connect('localhost','ferid','12345','anbar');
$tarix = date('Y-m-d H:i:s'); 





$ad = trim($_POST['ad']);
	$ad = strip_tags($ad);
	$ad = htmlspecialchars($ad);
	$ad = mysqli_real_escape_string($con,$ad);

	$alis = trim($_POST['alis']);
	$alis = strip_tags($alis);
	$alis = htmlspecialchars($alis);
	$alis = mysqli_real_escape_string($con,$alis);

	$satis = trim($_POST['satis']);
	$satis = strip_tags($satis);
	$satis = htmlspecialchars($satis);
	$satis = mysqli_real_escape_string($con,$satis);

	$miqdar = trim($_POST['miqdar']);
	$miqdar = strip_tags($miqdar);
	$miqdar = htmlspecialchars($miqdar);
	$miqdar = mysqli_real_escape_string($con,$miqdar);
echo '<div class="alert alert-secondary" role="alert">';
if (!isset($_POST['edit'])) {
	echo '<form method="post" id="insertForm">
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
	<input type="hidden" name="d">	
	<button type="submit" name="d" class="btn btn-success btn-sm" id="daxilet">Daxil et</button>
	<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_products.php">Excel</a>
  	</form>';
}


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
echo '</div>';









if (isset($_POST['silid'])){
	$sil = mysqli_query($con,"DELETE FROM products WHERE id='".$_POST['silid']."' ");
	if ($sil == true) {
		echo '<div class="alert alert-success" role="alert"> Məhsul silindi</div>'; }
	else{
		echo '<div class="alert alert-danger" role="alert"> Məhsulu silmək mümkün olmadı</div>';	}
}






include"static.php";



if($_POST['f1']=='DESC')
	{
		$order = " ORDER BY mehsul DESC ";
		$f1 = '<span id="ASC" class="f1">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
				  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
				</svg>
		  </span>';
	}
	elseif($_POST['f1']=='ASC')
	{
		$order = " ORDER BY mehsul ASC ";
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
		$order = " ORDER BY products.alis DESC ";
		$f2 = '<span id="ASC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
			  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
			  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	elseif($_POST['f2']=='ASC')
	{
		$order = " ORDER BY products.alis ASC ";
		$f2 = '<span id="DESC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	else
	{
		$f2 = '<span id="ASC" class="f2">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}



	if($_POST['f3']=='DESC')
	{
		$order = " ORDER BY products.satis DESC ";
		$f3 = '<span id="ASC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
			  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
			  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	elseif($_POST['f3']=='ASC')
	{
		$order = " ORDER BY products.satis ASC ";
		$f3 = '<span id="DESC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	else
	{
		$f3 = '<span id="ASC" class="f3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}




if($_POST['f4']=='DESC')
	{
		$order = " ORDER BY products.miqdar DESC ";
		$f4 = '<span id="ASC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
			  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
			  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	elseif($_POST['f4']=='ASC')
	{
		$order = " ORDER BY products.miqdar ASC ";
		$f4 = '<span id="DESC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}
	else
	{
		$f4 = '<span id="ASC" class="f4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </span>';
	}



if($_POST['f5']=='DESC')
	{
		$order = " ORDER BY products.tarix DESC ";
		$f5 = '<span id="ASC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
			  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
			  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
	elseif($_POST['f5']=='ASC')
	{
		$order = " ORDER BY products.tarix ASC ";
		$f5 = '<span id="DESC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
	else
	{
		$f5 = '<span id="ASC" class="f5">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down-alt" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M11.36 7.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.836 1.973-1.836 1.09 0 2.063.637 2.063 2.688 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
			  <path d="M12.438 8.668V14H11.39V9.684h-.051l-1.211.859v-.969l1.262-.906h1.046zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
			</svg>
		  </a>';
	}
	if(!isset($_POST['f1']) && !isset($_POST['f2']) && !isset($_POST['f3']) && !isset($_POST['f4']) && !isset($_POST['f5']))
	{$order = " ORDER BY id DESC ";}

$baza= mysqli_query($con, "SELECT 
							brands.ad AS brend, 
							brands.foto,
							products.id, 
							products.ad AS mehsul,
							products.alis,
							products.satis,
							products.miqdar,
							products.tarix
							FROM users,brands, products 
							WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' 
							" .$order);

$say= mysqli_num_rows($baza);
echo'<div class="alert alert-info" role="alert">Bazada <b>'.$say.'</b> Məhsul var</div>';
$i=0;
if($say!=0){
echo '	<div class="cedvel">
		<table class="table">
		<thead class="thead-dark">
			<th>#</th>
			<th>Brend</th>
			<th>ad'.$f1.'</th>
			<th>alis'.$f2.'</th>
			<th>satis'.$f3.'</th>
			<th>miqdar'.$f4.'</th>
			<th>Tarix'.$f5.'</th>
			<th></th>
		</thead>
		<tbody>';
while ($info=mysqli_fetch_array($baza)) {
	$i++;
	echo '<tr>';
	echo '<td>'.$i.'</td>';
	echo '<td> <img style="width:35px; height:35px;" src="'.$info['foto'].'" > '.$info['brend'].'</td>';
	echo '<td>'.$info['mehsul'].'</td>'; 
	echo '<td>'.$info['alis'].' AZN'.'</td>';
	echo '<td>'.$info['satis'].' AZN'.'</td>';
	echo '<td>'.$info['miqdar'].'</td>';
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
	}

?>