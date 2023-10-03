<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="../css/login-style.css">
</head>
<body>
<div class="background">
    <div class="navbar">
        <img src="../icons/eklapalogo.png">
        <ul >
            <li><a href="index.php">STRONA GŁÓWNA</a></li>
            <li><a href="schedule.php">TERMINARZ</a></li>
            <li><a href="table-view.php">TABELA</a></li>
            <li><a href="login1.php">ZALOGUJ SIĘ</a></li>
        </ul>
    </div>

    <div class="loginbox">
        <img src="../icons/avatar.png" class="avatar">
        <h1>Zaloguj się</h1>
        <form action="../login-register/login.php" method="post">
            <p>Nazwa użytkownika</p>
            <input type="text" name="username" placeholder="Nazwa użytkownika">
            <p>Hasło</p>
            <input type="password" name="password" placeholder="Hasło">
            <div class="error">
                <?php
                $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "login=failed")==true){
                    echo "Nazwa użytkownka lub hasło są niepoprawne.";
                }
                ?>
            </div>
            <input type="submit" value="Zaloguj">
            <a href="register.php">Zarejestruj się</a>
        </form>
    </div>


</div>
</body>
</html>
