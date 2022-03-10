<?php
session_start();

	$musteri= mysqli_query($con, "SELECT clients.ad,clients.soyad,clients.shirket,clients.tel,clients.id,clients.foto FROM users, clients WHERE clients.user_id=users.id AND users.id='".$_SESSION['user_id']."' ");
	$saymusteri=mysqli_num_rows($musteri);

	$brend= mysqli_query($con, "SELECT * FROM users, brands WHERE brands.user_id=users.id AND users.id='".$_SESSION['user_id']."'");
	$saybrend = mysqli_num_rows($brend);

	$cesid= mysqli_query($con, "SELECT 
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
							");
	$saycesid = mysqli_num_rows($cesid);

	$me=0;
	$mehsul= mysqli_query($con, "SELECT miqdar FROM users, products , brands WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' " );
	while($saymehsul = mysqli_fetch_array($mehsul)){
		$me = $me + $saymehsul['miqdar'];

	}

	$als=0;
	$alis= mysqli_query($con, "SELECT alis, miqdar FROM users, products , brands WHERE products.brand_id=brands.id  AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."'" );
	while($sayalis = mysqli_fetch_array($alis)){
		$als = $als + ($sayalis['miqdar']*$sayalis['alis']) ;
	}

	$sts=0;
	$satis= mysqli_query($con, "SELECT satis, miqdar FROM users,products , brands WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."'" );
	while($saysatis = mysqli_fetch_array($satis)){
		$sts = $sts + ($saysatis['miqdar']*$saysatis['satis']) ;
	}

	$mb=0;
	$mebleg= mysqli_query($con, "SELECT mebleg FROM users,xerc WHERE xerc.user_id=users.id AND users.id='".$_SESSION['user_id']."'" );
	while($saymebleg = mysqli_fetch_array($mebleg)){
		$mb = $mb + $saymebleg['mebleg'] ;
	}

	$gqz=0;
	$gqazan= mysqli_query($con, "SELECT alis, miqdar,satis FROM users,products , brands WHERE products.brand_id=brands.id AND products.user_id=users.id AND users.id='".$_SESSION['user_id']."' " );
	while($saygqazan = mysqli_fetch_array($gqazan)){
		$gqz = $gqz + ( ($saygqazan['satis']-$saygqazan['alis'])*$saygqazan['miqdar'] ) ;
	}

	
	$sifaris= mysqli_query($con, "SELECT  miqdar FROM users,orders WHERE orders.user_id=users.id AND users.id='".$_SESSION['user_id']."' " );
	$sif= mysqli_num_rows($sifaris);

	$qzn=0;
	$ts= mysqli_query($con, "SELECT orders.id ,tesdiq, orders.miqdar, alis, satis FROM users, orders, products, brands WHERE orders.product_id=products.id AND products.brand_id=brands.id AND orders.user_id=users.id AND users.id='".$_SESSION['user_id']."' ");
	while($infots=mysqli_fetch_array($ts)){
		if ($infots['tesdiq']==1) {
			$qzn= $qzn + ( ( $infots['satis']-$infots['alis'] ) * $infots['miqdar'] );
		}
	}

	echo'
<div class="alert alert-info" role="alert">

	<b>Müştəri: </b> '.$saymusteri.' | 
	<b>Brend: </b> '.$saybrend.' |
	<b>Çeşid: </b> '.$saycesid.' |
	<b>Məhsul: </b> '.$me.' |
	<b>Alış: </b> '.$als.' |
	<b>Satış: </b> '.$sts.' |
	<b>Xərc: </b> '.$mb.' |
	<b>Gözlənilən qazanc: </b> '.$gqz.' |
	<b>Sifariş: </b> '.$sif.' |
	<b>Qazanc: </b> '.$qzn.'
</div>';
?>