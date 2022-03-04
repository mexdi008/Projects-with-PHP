<pre>
<?php

$con = mysqli_connect('localhost','htqkzciz_newsadmin','mf2002_!@','htqkzciz_azenews');

$menbe = 'report.az';
$created = date('Y-m-d H:i:s');

$data = file_get_contents('https://report.az/');

//echo $data;

preg_match('/<div class="main-news-container mb-15">(.*)<\/section>/siU',$data,$list);
unset($list[0]);

//print_r($list[1]);

preg_match_all('/<a href="(.*)" class="ga-event-link" .*>/siU',$list[1],$links);
unset($links[0]);

//print_r($links[1]);


for($i=0; $i<count($links[1]); $i++)
{
    $link = 'https://report.az'.$links[1][$i];
    echo'LINK: '.$link.'<br>';
    
    $infodata = file_get_contents($link);
   /* preg_match('/<meta property="og:title" content="(.*)" \/>.*<meta property="article:section" content="(.*)" \/><meta property="article:published_time" content="(.*)" \/>.*<meta property="twitter:image" content="(.*)" \/>.*<p><\/p>.*<p>(.*)<\/article>/siU',$infodata,$info);
   */
   preg_match('/<h1 class="news-title">(.*)<\/h1>.*<a class="news-category" href=".*">(.*)<\/a>.*<i class="icon-calendar">(.*)<\/div>.*<img src="(.*)".*<\/div>.*<p>(.*)<\/div>/siU',$infodata,$info);
    unset($info[0]);
    
    print_r($info);
    //break;
    $title = trim($info[1]);
    $title = strip_tags($title);
    //$title = htmlspecialchars($title);
    $title = mysqli_real_escape_string($con,$title);
    
    $cat = trim($info[2]);
    $cat = strip_tags($cat);
    //$cat = htmlspecialchars($cat);
    $cat = mysqli_real_escape_string($con,$cat);
    
    $tarix = trim($info[3]);
    $tarix = strip_tags($tarix);
    $tarix = str_replace(',','',$tarix);
    $tarix = str_replace('  ',' ',$tarix);
    $tarix = str_replace("\n"," ",$tarix);
    $tarix = explode(' ',$tarix);
    //print_r($tarix);
    
    if($tarix[1]=='Yanvar'){$tarix[1]='01';}
    if($tarix[1]=='Fevral'){$tarix[1]='02';}
    if($tarix[1]=='Noyabr'){$tarix[1]='11';}
    if($tarix[1]=='Dekabr'){$tarix[1]='12';}
    
    
    $tarix = $tarix[2].'-'.$tarix[1].'-'.$tarix[0].' '.$tarix[3].':00';
    //echo $tarix;
    $tarix = mysqli_real_escape_string($con,$tarix);

    $foto = $info[4];
    
    $text = trim($info[5]);
    $text = strip_tags($text,'<img><iframe>');
    //$text = htmlspecialchars($text);
    $text = mysqli_real_escape_string($con,$text);
    
    
    
 
    

    if(!empty($title) && !empty($text) && !empty($foto))
    {
        $yoxla = mysqli_query($con,"SELECT link FROM news WHERE link='".$link."'");
        
        if(mysqli_num_rows($yoxla)==0)
        { 
            $daxilet = mysqli_query($con,"INSERT INTO 
            news(title,cat,tarix,foto,link,menbe,text,created)
            VALUES('".$title."','".$cat."','".$tarix."','".$foto."','".$link."','".$menbe."','".$text."','".$created."')");
            
           // echo mysqli_error($con);
            
            echo"INSERT INTO 
            news(title,metn,foto,cat,link,menbe,tarix,created)
            VALUES('".$title."','".$text."','".$foto."','".$cat."','".$link."','".$menbe."','".$tarix."','".$created."')<br>";
            
            if($daxilet==true)
            {echo'Xeber ugurla elave edildi<br>';}
            else
            {echo'Xeberi elave etmek mumkun olmadi<br>';}
        }
        else
        {echo'Bu xeber artiq bazada movcuddur<br>';}
        
     
       
    }

}

?>
</pre>








