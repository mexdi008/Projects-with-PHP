<?php

$sentData = array("name"=>"mehdi", "content"=>"sadixov","author"=>"salam");
 
// if(isset($_POST['enter']))
// {
    // $name = mysqli_real_escape_string($_POST['name']);
    // $content = mysqli_real_escape_string($_POST['content']);
    // $author = mysqli_real_escape_string($_POST['author']);
    $str = http_build_query($sentData);
    
    // if(!empty($_POST['name']) && !empty($_POST['content']) && !empty($_POST['author']))
    // {
        // array_push($sentData,$_POST['name']);
        // array_push($sentData,$_POST['content']);
        // array_push($sentData,$_POST['author']);
        
        $ch = curl_init("http://localhost/test.php");

        
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($sentData));
        $data = curl_exec($ch);
        curl_close($ch);
        
        
//     }
// }

 
?>

<form method="post">
 
    Please enter the name of blog:<br>
    <input type = "text" name = "name"><br><br>
    Please enter the content of blog:<br>
    <input type = "text" name = "content"><br><br>
    Please enter the Author of blog:<br>
    <input type = "text" name = "author"><br><br>
    <button type = "submit" name = "enter">Enter</button>
 
</form>