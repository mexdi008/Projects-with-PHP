<?php
/*
In August 2019, it was replaced by PSR-12 that became a new standard. But both are pretty similar, PSR-12 is kind of an extended PSR-2, adapted to modern PHP syntax. So you may find PSR-2 in older articles, and PSR-12 in newer ones. Also, PSR-12 is expanding on a Basic Coding Standard called PSR-1.


FOR EXAMPLE :

    class ChangePasswordController extends Controller {

        public function edit() {
            return view('profile.password.edit');
        }

    }

and 

    class ChangePasswordController extends Controller 
    {
        public function edit() 
        {
            return view('profile.password.edit');
        }
    }

    if we follow currently PHP standards PSR-2/PSR-12, the second code is the correct one. it should be new lines.

*/


?>