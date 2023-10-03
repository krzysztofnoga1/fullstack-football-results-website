<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();

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

            $email=$connection->query("SELECT `E-mail` AS mail FROM Users WHERE Username='$user'");

            $connection->close();
        }
    }catch(Exception $e){
        echo 'Błąd serwera:'.$e;
}
?>

<script src="../js/goto.js"></script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Mój profil</title>
    <link rel="stylesheet" href="../css/index-style.css">
    <link rel="stylesheet" href="../css/profile-style.css">
</head>
<body>
<div class="background">
    <div class="navbar">
        <img src="../icons/eklapalogo.png">
        <ul>
            <li><a href="index.php">STRONA GŁÓWNA</a> </li>
            <li><a href="schedule.php">TERMINARZ</a></li>
            <li><a href="table-view.php">TABELA</a></li>
            <li><a href="profile-view.php">MOJE KONTO</a></li>
        </ul>
    </div>

    <div class="box">
        <div class="sidebar">
            <img src="../icons/avatar.png" class="profile-avatar">
            <h1><?php echo $_SESSION['username'];?></h1>
            <?php
            if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']==true){
                ?>
                <a href="admin-panel.php">Panel administratora</a>
                <?php
            }
            ?>
            <a href="../login-register/logout.php">Wyloguj się</a>
        </div>

        <div class="options">
            <div class="option-div">
                <p><?php echo 'Nazwa użytkownika: '.$_SESSION['username'];?></p>
                <button onclick="redirect1()">ZMIEŃ</button>
            </div>

            <div class="option-div">
                <?php
                    $rows=$email->fetch_assoc();
                    $res=$rows['mail'];
                    $email->data_seek(0);
                ?>
                <p><?php echo 'Adres e-mail: '.$res;?></p>
                <button onclick="redirect2()">ZMIEŃ</button>
            </div>

            <button class="password-button" onclick="redirect3()">ZMIEŃ HASŁO</button>
        </div>
    </div>
</div>
</body>
</html>
