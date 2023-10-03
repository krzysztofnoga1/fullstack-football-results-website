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
    <title>Zmień hasło</title>
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

    <div class="edit-password">
        <form method="post" action="../updates/update-password.php">
            <p>Podaj stare hasło</p>
            <input type="password" name="oldpassword" placeholder="Poprzednie hasło">
            <p>Podaj nowe hasło</p>
            <input type="password" name="newpassword1" placeholder="Nowe hasło">
            <p>Powtórz nowe hasło</p>
            <input type="password" name="newpassword2" placeholder="Powtórz nowe hasło">
            <div class="error">
                <?php
                $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "shortpassword")==true){
                echo "Podane hasło jest zbyt krótkie.";
                }
                if(strpos($fullUrl, "nouppercase")==true){
                echo "Hasło powinno zawierać co najmniej 1 dużą literę.";
                }
                if(strpos($fullUrl, "differentpasswords")==true){
                echo "Podane hasła się różnią.";
                }
                if(strpos($fullUrl, "badpassword")==true){
                    echo "Podano nieprawidłowe hasło.";
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
