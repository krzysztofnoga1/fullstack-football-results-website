<?php
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
        $_SESSION['logged']=false;
        session_destroy();
    }

    header('Location: ../pages/index.php');

