<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>JobIT</title>
</head>
<body>
    <header class="sfondo">
    <section id="navigazione">
    <nav>
            <img id="logo" src="images/logo.png" alt="logo">
            <a class="hvr-underline-from-center" href="#">HOME</a>
            <a class="hvr-underline-from-center" href="#">OFFERTE</a>
            <a class="hvr-underline-from-center" href="#">CONTATTACI</a>
        </nav>
        <div id="whitespace"></div>
        <!--PHP Session-->
        <?php
        session_start();
        if(!empty($_SESSION["isLogin"]) && $_SESSION["isLogin"]) {
            echo "<nav id='usersection'>
            <p>Benvenuto Lorem</p>
            <a class='hvr-underline-from-center' href='user.php'>AREA RISERVATA</a>
            <a class='hvr-underline-from-center' href='user.php'>LOGOUT</a>
            </nav>";
        } else {
            echo "<nav id='usersection'>
            <a class='hvr-underline-from-center' href='login.php'>ACCEDI o REGISTRATI</a>
            </nav>";
        }
        ?>
        
    </section>
    <section id="titolo">
        <h1>Il lavoro del futuro è qui!<br>Non fartelo sfuggire!</h1>
        <h2>JobIT nasce con l'obiettivo di fornire un serivizio mirato di ricerca e selezione di personale IT destinato sia ad aziende che ai candidati.</h2>
        <h3>Cosa aspetti! Clicca qui sotto per iniziare</h3>
        <a class="hvr-grow" href="">Per Aziende</a>
        <a class="hvr-grow" href="">Per Candidati</a>
    </section>    

    </header>
    <main>
        <h2>Motivi per cui scegliere JobIT</h2>
        <div id="carosello">
            <div id="griglia1">
                <p>Facile</p>
            </div>
            <div id="griglia2">
                <p>Facile</p>
            </div>
            <div id="griglia3">
                <p>Facile</p>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget turpis ipsum. Aenean bibendum sed orci et pulvinar. Praesent a diam a mi eleifend faucibus nec vel ex. Mauris in augue viverra, molestie urna feugiat, commodo orci. Maecenas scelerisque sollicitudin imperdiet. Duis sed dapibus enim. Nullam ipsum massa, fermentum consectetur risus sed, imperdiet semper nisl. </p>
    </main>
    <footer>
        JobIT S.r.l, Via Dante 1, Molto molto lontano (ZZ) Tel. 1234 567890 e-mail: info@emaildiprova.com
    </footer>
    
</body>
</html>