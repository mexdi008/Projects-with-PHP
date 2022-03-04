<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="https://azenews.tk/"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
            <?php
            $sec = mysqli_query($con,"SELECT * FROM news WHERE cat NOT IN('İnfrastruktur','Ask','Biznes','Milli məclis','Sosial müdafiə','Energetika','Mədəniyyət siyasəti','Daxili siyasət','Xarici siyasət','Hərbi','Elm və təhsil','Sənaye','Qarabağ','Komanda','Ədəbiyyat','Fərdi','Diaspor','Analitika','Digər ölkələr','Ekologiya','İncəsənət') GROUP BY cat");
                
                while($info=mysqli_fetch_array($sec))
                {
                 echo' 
          <li><a href="#" style="font-family:Tahoma;">'.$info['cat'].'</a></li>';
                }
                ?>
          
        </ul>
      </div>
    </nav>
  </section>