<?php
    session_start();
    $_SESSION['logged']=false;
    $_SESSION['isadmin']=false;

    require_once "registration_validations.php";
    require_once "../connect.php";

    if(isset($_POST['password2'])){
        $registration_successful=true;

        $nick=$_POST['nick'];
        $email=$_POST['email'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];

        $nick=htmlspecialchars($nick, ENT_QUOTES, "UTF-8");
        $email=htmlspecialchars($email, ENT_QUOTES, "UTF-8");
        $password1=htmlspecialchars($password1, ENT_QUOTES, "UTF-8");
        $password2=htmlspecialchars($password2, ENT_QUOTES, "UTF-8");
        $nick=htmlentities($nick, ENT_QUOTES, "UTF-8");
        $email=htmlentities($email, ENT_QUOTES, "UTF-8");
        $password1=htmlentities($password1, ENT_QUOTES, "UTF-8");
        $password2=htmlentities($password2, ENT_QUOTES, "UTF-8");

        if((strlen($nick)<1) || (strlen($nick)>30)){
            $registration_successful=false;
            header('Location: ../pages/register.php?nicklength');
            exit();
        }

        if(!check_email($email)){
            $registration_successful=false;
            header('Location: ../pages/register.php?bademail');
            exit();
        }

        if(strlen($password1)<8){
            $registration_successful=false;
            header('Location: ../pages/register.php?shortpassword');
            exit();
        }

        if(!check_uppercase($password1)){
            $registration_successful=false;
            header('Location: ../pages/register.php?nouppercase');
            exit();
        }

        if(strcmp($password2, $password1)!=0){
            $registration_successful=false;
            header('Location: ../pages/register.php?differentpasswords');
            exit();
        }

        if(!isset($_POST['accept_rules'])){
            $registration_successful=false;
            header('Location: ../pages/register.php?rules');
            exit();
        }

        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if($connection->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                $result=$connection->query("SELECT UserID from users WHERE `E-mail`='$email'");
                if(!$result){
                    throw new Exception($connection->error);
                }
                $email_number=$result->num_rows;
                if($email_number>0){
                    $registration_successful=false;
                    header('Location: ../pages/register.php?emailexists');
                    exit();
                }

                $result=$connection->query("SELECT UserID from users WHERE Username='$nick'");
                if(!$result){
                    throw new Exception($connection->error);
                }
                $nick_number=$result->num_rows;
                if($nick_number>0){
                    $registration_successful=false;
                    header('Location: ../pages/register.php?nickexists');
                    exit();
                }

                if($registration_successful){
                    $hashed_password=password_hash($password1, PASSWORD_DEFAULT);
                    if($connection->query("INSERT INTO users(Username, Password, `E-mail`) VALUES('$nick', '$hashed_password', '$email')")){
                        $_SESSION['successful_registration']=true;
                        $_SESSION['logged']=true;
                        $_SESSION['isadmin']=false;
                        $_SESSION['username']=$nick;
                        header('Location: ../pages/index.php');
                    }else{
                        throw new Exception($connection->error);
                    }
                }
                $connection->close();
            }
        }catch(Exception $e){
            echo 'Błąd serwera.'.$e;
        }
    }
?>
