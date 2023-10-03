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
    <title>Zmień nazwę użytkownika</title>
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
        <p>Podaj nową nazwę użytkowika</p>
        <form method="post" action="../updates/update-username.php">
            <input type="text" name="username" placeholder="Nowa nazwa użytkownika">
            <div class="error">
                <?php
                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullUrl, "nicklength")==true){
                        echo "Nazwa użytkownika powinna mieć od 1 do 30 znaków.";
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
