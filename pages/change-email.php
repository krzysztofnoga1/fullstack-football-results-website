<?php
if(session_status()===PHP_SESSION_NONE)
    session_start();

if(isset($_SESSION['username']))
    $user=$_SESSION['username'];
?>

<script src="../js/goto.js"></script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zmień adres e-mail</title>
    <link rel="stylesheet" href="../css/style1.css">
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

    <div class="edit-box">
        <p>Podaj nowy adres e-mail</p>
        <form method="post" action="../updates/update-email.php">
            <input type="text" name="email" placeholder="Nowy adres e-mail">
            <div class="error">
                <?php
                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullUrl, "bademail")==true){
                        echo "Podany adres e-mail jest niepoprawny.";
                    }
                    if(strpos($fullUrl, "emailexists")==true){
                        echo "Istnieje już konto przypisane do tego adresu e-mail.";
                    }
                ?>
            </div>
            <input type="hidden" name="user" value="<?php echo $user;?>">
            <button type="submit">ZMIEŃ</button>
            <button type="button" onclick="redirect4()">ANULUJ</button>
        </form>

    </div>
</div>
</body>
