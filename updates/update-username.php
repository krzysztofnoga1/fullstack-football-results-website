<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();

    $user=$_POST['user'];
    $username=$_POST['username'];

    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else{
            if(isset($_SESSION['username'])){
                $user=$_SESSION['username'];
            }

            $res=$connection->query("SELECT UserID FROM Users WHERE Username='$user'");
            $res1=$res->fetch_array();
            $userid=intval($res1[0]);

            if((strlen($username)<1) || (strlen($username)>30)){
                header('Location: pages/change-username.php?nicklength');
                $connection->close();
                exit();
            }
            else{
                $connection->query("UPDATE Users SET Username='$username' WHERE UserID='$userid'");
                $_SESSION['username']=$username;
                header('Location: ../pages/profile-view.php');
                $connection->close();
                exit();
            }
        }
    }catch(Exception $e) {
        echo 'Błąd serwera:' . $e;
    }