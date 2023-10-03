<?php
    require_once "../connect.php";

    session_start();
    $_SESSION['logged']=false;
    $_SESSION['isadmin']=false;
    $_SESSION['username']="";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else{
            $username=$_POST['username'];
            $password=$_POST['password'];

            $username=htmlspecialchars($username, ENT_QUOTES, "UTF-8");
            $password=htmlspecialchars($password, ENT_QUOTES, "UTF-8");
            $username=htmlentities($username,ENT_QUOTES,"UTF-8");
            $password=htmlentities($password,ENT_QUOTES,"UTF-8");

            $result=$connection->query(sprintf("SELECT * FROM Users WHERE Username='%s'",
            mysqli_real_escape_string($connection,$username))); 
            if(!$result){
                throw new Exception($connection->error);
            }

            $users_number=$result->num_rows;
            $user_data=$result->fetch_assoc();

            if(($users_number==1) && password_verify($password, $user_data['Password'])){
                $result->close();
                $_SESSION['logged']=true;
                $_SESSION['username']=$username;
                if($user_data['IsAdmin']==1){
                    $_SESSION['isadmin']=true;
                }
                header('Location: ../pages/index.php');
            }else{
                header('Location: ../pages/login1.php?login=failed');
            }

            $connection->close();
        }
    }catch(Exception $e){
        echo 'Błąd serwera:'.$e;
    }

