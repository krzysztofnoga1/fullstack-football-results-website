<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();

    $user=$_POST['user'];
    $oldpassword=$_POST['oldpassword'];
    $password1=$_POST['newpassword1'];
    $password2=$_POST['newpassword2'];

    $oldpassword=htmlentities($oldpassword, ENT_QUOTES, "UTF-8");
    $oldpassword=htmlspecialchars($oldpassword, ENT_QUOTES, "UTF-8");
    $password1=htmlentities($password1, ENT_QUOTES, "UTF-8");
    $password1=htmlspecialchars($password1, ENT_QUOTES, "UTF-8");
    $password2=htmlentities($password2, ENT_QUOTES, "UTF-8");
    $password2=htmlspecialchars($password2, ENT_QUOTES, "UTF-8");

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

            if(strlen($password1)<8){
                header('Location: ../pages/change-password.php?shortpassword');
                exit();
            }

            if(!check_uppercase($password1)){
                header('Location: ../pages/change-password.php?nouppercase');
                exit();
            }

            if(strcmp($password2, $password1)!=0){
                header('Location: ../pages/change-password.php?differentpasswords');
                exit();
            }

            $pas=$connection->query("SELECT * FROM Users WHERE UserID='$userid'");
            $data=$pas->fetch_assoc();

            if(password_verify($oldpassword, $data['Password'])){
                $hashed_password=password_hash($password1, PASSWORD_DEFAULT);
                $a=$connection->query("UPDATE Users SET Password='$hashed_password' WHERE UserID='$userid'");
                header('Location: ../pages/profile-view.php');
            }else{
                header('Location: ../pages/change-password.php?badpassword');
            }
        }
    }catch(Exception $e) {
        echo 'Błąd serwera:' . $e;
    }

