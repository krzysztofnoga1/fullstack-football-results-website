<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();

    $user=$_POST['user'];
    $email=$_POST['email'];

    require_once "../connect.php";
    require_once "../registration_validations.php";

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

            $result=$connection->query("SELECT UserID from users WHERE `E-mail`='$email'");
            $email_number=$result->num_rows;
            if($email_number>0){
                header('Location: ../pages/change-email.php?emailexists');
                $connection->close();
                exit();
            }

            if(!check_email($email)){
                header('Location: ../pages/change-email.php?bademail');
                $connection->close();
                exit();
            }
            else{
                $connection->query("UPDATE Users SET `E-mail`='$email' WHERE UserID='$userid'");
                header('Location: ../pages/profile-view.php');
                $connection->close();
                exit();
            }
        }
    }catch(Exception $e) {
        echo 'Błąd serwera:' . $e;
    }
