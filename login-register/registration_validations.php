<?php
    function check_uppercase($text){
        if(ctype_lower($text)){
            return false;
        }
        else{
            return true;
        }
    }

    function check_email($text){
        $new_email=filter_var($text, FILTER_SANITIZE_EMAIL);

        if(!filter_var($new_email, FILTER_VALIDATE_EMAIL) || ($new_email!=$text)){
            return false;
        }
        return true;
    }

