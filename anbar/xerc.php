<?php
include"header.php";

echo '<div class="container">' ;
    $teyinat = trim($_POST['teyinat']);
	$teyinat = strip_tags($teyinat);
	$teyinat = htmlspecialchars($teyinat);
	$teyinat = mysqli_real_escape_string($con,$teyinat);

	$mebleg = trim($_POST['mebleg']);
	$mebleg = strip_tags($mebleg);
	$mebleg = htmlspecialchars($mebleg);
	$mebleg = mysqli_real_escape_string($con,$mebleg);

	$redteyinat = trim($_POST['redteyinat']);
	$redteyinat = strip_tags($redteyinat);
	$redteyinat = htmlspecialchars($redteyinat);
	$redteyinat = mysqli_real_escape_string($con,$redteyinat);

	$redmebleg = trim($_POST['redmebleg']);
	$redmebleg = strip_tags($redmebleg);
	$redmebleg = htmlspecialchars($redmebleg);
	$redmebleg = mysqli_real_escape_string($con,$redmebleg);

	$id = (int)$_POST['id'];

echo '<div class="alert alert-secondary" role="alert">';
if (isset($_POST['edit'])) {
	$sec = mysqli_query($con, " SELECT xerc.id,teyinat,mebleg FROM xerc,users WHERE  xerc.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND xerc.id='".$id."' ");
	$info = mysqli_fetch_array($sec);
	echo '<form method="post">
			Brendin adi:<br>
			<input type="text" class="form-control" name="redteyinat" value="'.$info['teyinat'].'" autocomplete="off"><br>
			<input type="text" class="form-control" name="redmebleg" value="'.$info['mebleg'].'" autocomplete="off"><br>
			<input type="hidden" name="id" value="'.$info['id'].'"><br>
			<input type="submit" name="update" class="btn btn-success btn-sm" value="Yenilə">
			<input type="submit" name="updates" class="btn btn-danger btn-sm" value="İmtina">
		</form><br>';

}
if (!isset($_POST['edit'])) {
	echo '<form method="post">
	<input type="text" class="form-control"  name="teyinat" placeholder="Təyinati yazın" autocomplete="off"><br>
	<input type="text" class="form-control"  name="mebleg" placeholder="Xərci yazın" autocomplete="off"><br>
	<button type="submit" class="btn btn-success btn-sm" name="d">Daxil et</button>
	<a class="btn btn-success btn-sm" href="http://localhost/anbar/excel/Examples/anbar_xerc.php">Excel</a>
</form>';
}
echo '</div>';

if (isset($_POST['update'])) {

	if (!empty($redteyinat) && !empty($redmebleg)) {
		$yenile = mysqli_query($con, "UPDATE xerc SET teyinat='".$redteyinat."' , mebleg='".$redmebleg."'  WHERE id='".$id."' ");
		if ($yenile == true) {
			echo '<div class="alert alert-success" role="alert">Xərc yeniləndı</div>';
		}
		else{
			echo '<div class="alert alert-danger" role="alert">Xərc yeniləmək mümkün olmadı</div>'; }
		
	}
	else{
		echo '<div class="alert alert-info" role="alert">Məlumatları tam doldurun</div>'; }
	
}
if (isset($_POST['sil'])) {
	$baza = mysqli_query($con,"SELECT xerc.id, FROM xerc,users  WHERE xerc.user_id=users.id AND users.id='".$_SESSION['user_id']."' AND id='".$_POST['id']."'");
 	$info = mysqli_fetch_array($baza);
	echo'Təyinatı silmek isteyirsinizmi?<br>';
	echo '<form method="post">
	<input type="submit" class="btn btn-success btn-sm" name="he" value="Hə">
	<input type="submit" class="btn btn-danger btn-sm" name="yox" value="Yox">
	<input type="hidden" name="id" value="'.$info['id'].'">
	</form>
	' ;
}
if (isset($_POST['he'])){
	$sil = mysqli_query($con,"DELETE FROM xerc WHERE id= '".$id."' ");
	if ($sil == true) {
		echo '<div class="alert alert-success" role="alert">Xərc silindi</div>'; }
	else{
		echo '<div class="alert alert-danger" role="alert">Xərci silmək mümkün olmadı</div>';	}
}
if (isset($_POST['d'])) {

	if (!empty($teyinat) && !empty($mebleg)) {
		$daxil= mysqli_query($con, "INSERT INTO xerc (teyinat,mebleg,tarix) VALUES ('".$teyinat."','".$mebleg."','".$tarix."') " );
		if ($daxil==true) {
			echo '<div class="alert alert-success" role="alert">Xərc daxil edildi</div>';
		}
		else{
			echo '<div class="alert alert-danger" role="alert">Xərc daxil etmək mümkün olmadı</div>';
		}
	}
	else{
		echo '<div class="alert alert-info" role="alert">Məlumatları tam doldurun</div>';
	}
}
include"static.php";



$baza= mysqli_query($con, "SELECT xerc.id,xerc.tarix,mebleg,teyinat FROM xerc,users WHERE xerc.user_id=users.id AND users.id='".$_SESSION['user_id']."'  " );
$say= mysqli_num_rows($baza);

echo'<div class="alert alert-info" role="alert">Bazada <b>'.$say.'</b> Təyinat var</div>';
$i=0;
echo '<div class="cedvel">
<table class="table">
<thead class="thead-dark">
<th>#</th>
<th>Təyinat</th>
<th>Məbləğ</th>
<th>Tarix</th>
<th></th>
</thead>
<tbody>';
while ($info=mysqli_fetch_array($baza)) {
	$i++;
	echo '<tr>';
	echo '<td>'.$i.'</td>';
	echo '<td>'.$info['teyinat'].'</td>';
	echo '<td>'.$info['mebleg'].'</td>';
	echo '<td>'.$info['tarix'].'</td>';
	echo '<td><form method="post">
			<input type="hidden" name="id" value="'.$info['id'].'">
			<input type="submit" class="btn btn-success btn-sm" name="edit" value="Redaktə">
			<input type="submit" class="btn btn-danger btn-sm" name="sil" value="Sil">
		</form></td>';
}
echo '
</tr>
</thead>
</table>
</div>
</div>';
?>