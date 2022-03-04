<pre>
<?php
$con = mysqli_connect('localhost','htqkzciz_kinoadmin','mf2002_!@','htqkzciz_kino');

echo 'Connection error:<br>' . mysqli_connect_error();

$data0 = file_get_contents('https://api.themoviedb.org/3/discover/movie?primary_release_year=2021&sort_by=vote_average.desc&api_key=7a2bfe93697bd9d33cc1e3eb3e8b4b0b');
$data0 = json_decode($data0);
$pagelimit = $data0->total_pages;

//print_r($data);
//FOTO LINK
//https://www.themoviedb.org/t/p/w600_and_h900_bestv2/uNjnoT3RChs2r7O9pDyx7TNBvIj.jpg
//JANR
//https://api.themoviedb.org/3/genre/movie/list?api_key=7a2bfe93697bd9d33cc1e3eb3e8b4b0b&language=en-US

//https://api.themoviedb.org/3/movie/550/videos?api_key=7a2bfe93697bd9d33cc1e3eb3e8b4b0b

    

for($t=0;$t<$pagelimit;$t++){
    $data = file_get_contents('https://api.themoviedb.org/3/discover/movie?primary_release_year=2022&sort_by=vote_average.desc&page='.$t.'&api_key=7a2bfe93697bd9d33cc1e3eb3e8b4b0b');
$data = json_decode($data);
for($i=0;$i<count($data->results);$i++){
    
    $genr = $data->results[$i]->genre_ids[0];
        if($genr==28){$janr= 'Action';}
    if($genr==12){$janr= 'Macəra';}
    if($genr==16){$janr= 'Animasiya';}
    if($genr==35){$janr= 'Komediya';}
    if($genr==80){$janr= 'Cinayət';}
    if($genr==99){$janr= 'Sənədli film';}
    if($genr==18){$janr= 'Drama';}
    if($genr==10751){$janr= 'Ailə';}
    if($genr==14){$janr= 'Fantaziya';}
    if($genr==36){$janr= 'Tarixi';}
    if($genr==27){$janr= 'Qorxu';}
    if($genr==10402){$janr= 'Musiqi';}
    if($genr==9648){$janr= 'Əsrarəngiz';}
    if($genr==10749){$janr= 'Romantika';}
    if($genr==878){$janr= 'Elmi fantastika';}
    if($genr==10770){$janr= 'Televiziya filmi';}
    if($genr==53){$janr= 'Triller';}
    if($genr==10752){$janr= 'Müharibə';}
    if($genr==37){$janr= 'Qərb';}

    
    
    
$ad = $data->results[$i]->original_title;
   $ad = mysqli_real_escape_string($con,$ad);
$kinoid = $data->results[$i]->id;

$populyarliq= $data->results[$i]->popularity;

$posterlink = $data->results[$i]->poster_path;
$poster = 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2'.$posterlink;   



$haqqinda = $data->results[$i]->overview;
$haqqinda = mysqli_real_escape_string($con,$haqqinda);

$tarix = $data->results[$i]->release_date;

$dil = $data->results[$i]->original_language;



$vlink = 'https://api.themoviedb.org/3/movie/'.$kinoid.'/videos?api_key=7a2bfe93697bd9d33cc1e3eb3e8b4b0b';
    $vdata = file_get_contents($vlink);
    
    $vdata = json_decode($vdata);
    
    $videolink = $vdata->results[0]->key;
    
    echo $videolink; echo'<br><br>';
    
    
    
    if(empty($videolink))
    {
        echo $vlink='https://youtube.googleapis.com/youtube/v3/search?part=snippet&q='.urlencode($ad.' trailer').'&type=video&key=AIzaSyAjtB0EEaAdnwM6L2o54OJXtu4aThIepUo';
        
        $vdata = file_get_contents($vlink);
    
        $vdata = json_decode($vdata);
        
        echo 'Youtube: '; echo $videolink = $vdata->items[0]->id->videoId; echo'<br><br>';
        
        //print_r($vdata);
        
        
    }
    





    if(!empty($videolink))
{
$yoxla = mysqli_query($con,"SELECT * FROM kino WHERE ad='".$ad."'");
$say = mysqli_num_rows($yoxla);
if($say==0)
{
    $daxilet= mysqli_query($con,"INSERT INTO kino(kino_id,ad,populyarliq,poster,haqqinda,dil,tarix,janr,video) VALUES('".$kinoid."','".$ad."','".$populyarliq."','".$poster."','".$haqqinda."','".$dil."','".$tarix."','".$janr."','".$videolink."') ");
    echo "INSERT INTO kino(kino_id,ad,populyarliq,poster,haqqinda,dil,tarix,janr,video) VALUES('".$kinoid."','".$ad."','".$populyarliq."','".$poster."','".$haqqinda."','".$dil."','".$tarix."','".$janr."','".$videolink."') <br><br>";
    
    
    //echo 'Sehv: '.mysqli_error($con);
    if($daxilet==true){
        echo'bazaya ugurla otuzduruldu<br>';
    }
   else{
       echo'bazaya otuzdurula bilmedi<br>';
        echo 'Sehv: '.mysqli_error($con);
       
   }
}
else{echo'bu kino var <br>';}
}
}



/*
[id] => 864811
                    [original_language] => en
                    [original_title] => SWAT Mission Demo
                    [overview] => It started as a peaceful night. Then he heard the birds suddenly stop singing.
                    [popularity] => 1.55
                    [poster_path] => /nBEVcGyHNYCdkqel77P3Zpgk2lm.jpg
                    [release_date] => 2017-12-09
                    [title] => SWAT Mission Demo
                    [video] => 
                    [vote_average] => 10
                    [vote_count] => 1
*/
}
?>
</pre>

