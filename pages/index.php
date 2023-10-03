<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona główna</title>
    <link rel="stylesheet" href="../css/index-style.css">
</head>

<script type="text/javascript" src="../js/sliderjs.js"></script>
<script type="text/javascript" src="../js/indexjs.js"></script>

<body>
    <div class="background">
        <div class="navbar">
            <img src="../icons/eklapalogo.png">
            <ul>
                <li><a href="index.php">STRONA GŁÓWNA</a></li>
                <li><a href="schedule.php">TERMINARZ</a></li>
                <li><a href="table-view.php">TABELA</a></li>
                <li>
                    <?php
                        if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                            ?>
                            <a href="profile-view.php">MOJE KONTO</a>
                        <?php
                        }
                        else{
                            ?>
                            <a href="login1.php">ZALOGUJ SIĘ</a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
        </div>

        <h1>WYNIKI OSTATNIEJ KOLEJKI</h1>

        <div class="carouselbox">
            <div id="myCarousel" class="carousel">
                <div class="slider" id="slider">
                </div>
                <div class="controls">
                    <button class="arrow left" onclick="slide_right()"><</button>
                    <button class="arrow right" onclick="slide_left()">></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
