<?php
include"header.php";

echo'<div class="container">';


echo'<div class="mesajbolum">';
$cekmesaj=mysqli_query($con,"SELECT * FROM users,mesaj WHERE mesaj.user_id=users.id AND users.id='".$_SESSION['user_id']."'");

while($infomesaj=mysqli_fetch_array($cekmesaj)){
	echo '<div class="mesaj" style="border: 1px solid gray;" >
			<div class="ad" style="background-color: #CBE0AB; padding:10px; ">
				<h3>'.$infomesaj['ad'].'</h3>
			</div>
			<p >'.$infomesaj['mesaj'].'</p>
	</div>';
}

echo'
</div>';
echo '<form method="post">
	<input type="email" class="form-control"  name="emaill"><br>
	<textarea rows="4" cols="50" class="form-control"  placeholder="Mesaj yazın..." name="mesaj"></textarea><br>
	<button name="d">Göndər</button>
</form>
';
if (isset($_POST['d'])) {
	if (!empty($_POST['emaill']) ) {
		$email = trim($_POST['emaill']);
    	$email = strip_tags($email);
    	$email = htmlspecialchars($email);
    	$email = mysqli_real_escape_string($con,$email);

    	$mesaj = trim($_POST['mesaj']);
    	$mesaj = strip_tags($mesaj);
    	$mesaj = htmlspecialchars($mesaj);
    	$mesaj = mysqli_real_escape_string($con,$mesaj);

    	$cekuser=mysqli_query($con,"SELECT * FROM users WHERE email='".$email."'");
    	$info=mysqli_fetch_array($cekuser);

    	if ($info['email']==$email ) {

    		$daxilmesaj = mysqli_query($con, "INSERT INTO mesaj(emaill,mesaj,user_id,tarix,guser_id) VALUES ('".$email."','".$mesaj."',
    			'".$_SESSION['user_id']."','".$tarix."','".$info['id']."') " );
    		if ($daxilmesaj==true) {
    			echo 'Mesajınız göndərildi';
    		}
    		else{
    			echo'Mesajınızı göndərmək mümkün olmadı';
    		}
    	}
    	else{
    		echo 'Bu istifadəçi mövcud deyil';
    	}

	}
}





echo '</div>';
?>
