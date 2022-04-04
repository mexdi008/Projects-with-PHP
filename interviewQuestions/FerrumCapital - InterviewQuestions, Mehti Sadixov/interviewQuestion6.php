<?php

    function convertNullToBlank($array)
    {

        foreach ($array as $key => $value) 
        {

            if (is_null($value)) 
            {
       	        $array[$key] = "";
            }

        }

    return $array;

}

?>