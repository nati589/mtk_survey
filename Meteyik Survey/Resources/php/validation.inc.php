<?php

    function setup_input($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        if(empty($input)){
            $err = "this field can't be left empty";
        }
        
        return $input;
    }
