<?php

//foto/ferid.jpg

$unvan = 'foto/'.basename($_FILES['foto']['name']);
if ($unvan!= 'foto/') {
	$tip = strtolower(pathinfo($unvan,PATHINFO_EXTENSION));

	if($tip!='jpg' && $tip!='jpeg' && $tip!='png' && $tip!='gif' && $tip!='svg'  )
	{$error = 1; echo'<div class="alert alert-warning" role="alert">Yalnız <b>jpg, jpeg, png, gif, svg</b> fayl formatları dəstəklənir</div>';}


	if($_FILES['foto']['size']>10485760)
	{$error = 1; echo'<div class="alert alert-warning" role="alert">Fayl həcmi maksimum <b>10 Mb</b> dəstəklənir</div>';}


	if(!isset($error))
	{
		$unvan = 'foto/'.time().'.'.$tip;
		move_uploaded_file($_FILES['foto']['tmp_name'], $unvan);
	}
}

?>