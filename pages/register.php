<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="../css/register-style.css">
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

    <div class="registerbox">
        <form method="post" action="../login-register/registration.php">
            <h1>Zarejestruj się</h1>
            <p>Nazwa użytkownika</p>
            <input type="text" name="nick" placeholder="Nazwa użytkownika">
            <p>Adres e-mail</p>
            <input type="text" name="email" placeholder="Adres e-mail">
            <p>Hasło</p>
            <input type="password" name="password1" placeholder="Hasło">
            <p>Powtórz hasło</p>
            <input type="password" name="password2" placeholder="Powtórz hasło">
            <label class="container">Akceptuję regulamin
                <input type="checkbox" name="accept_rules">
                <span class="checkmark"></span>
            </label>
            <div class="error">
                <?php
                $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "nicklength")==true){
                    echo "Nazwa użytkownika powinna mieć od 1 do 30 znaków.";
                }
                if(strpos($fullUrl, "bademail")==true){
                    echo "Podany adres e-mail jest niepoprawny.";
                }
                if(strpos($fullUrl, "shortpassword")==true){
                    echo "Podane hasło jest zbyt krótkie.";
                }
                if(strpos($fullUrl, "nouppercase")==true){
                    echo "Hasło powinno zawierać co najmniej 1 dużą literę.";
                }
                if(strpos($fullUrl, "differentpasswords")==true){
                    echo "Podane hasła się różnią.";
                }
                if(strpos($fullUrl, "rules")==true){
                    echo "Zaakceptuj regulamin.";
                }
                if(strpos($fullUrl, "emailexists")==true){
                    echo "Istnieje już konto przypisane do tego adresu e-mail.";
                }
                if(strpos($fullUrl, "nickexists")==true){
                    echo "Istnieje już konto o takiej nazwie.";
                }
                ?>
            </div>
            <input type="submit" value="Zarejestruj się">
        </form>
    </div>
</div>
</body>
</html>
