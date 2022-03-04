<nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.php">Əsas Səhifə</a></li>
                                <li><a href="./categories.html">Kateqoriyalar <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <?php
                                        
                                        $sec = mysqli_query($con,"SELECT janr FROM kino GROUP BY janr");
                                        while($info=mysqli_fetch_array($sec))
                                        {echo'<li><a href="cat.php?x='.$info['janr'].'">'.$info['janr'].'</a></li>';}
                                        
                                        ?>
                                        
                                        
                                        
                                    </ul>
                                </li>
                                <li><a href="./blog.html">Our Blog</a></li>
                                <li><a href="./contacts.html">Contacts</a></li>
                            </ul>
                        </nav>