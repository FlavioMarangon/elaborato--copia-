</html>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>JobIT</title>
</head>
<body>
    <header>
    <section id="navigazione">
    <nav>
            <img id="logo" src="images/logo.png" alt="logo">
            <a class="hvr-underline-from-center" href="index.php">HOME</a>
            <a class="hvr-underline-from-center" href="#">OFFERTE</a>
            <a class="hvr-underline-from-center" href="#">CONTATTACI</a>
        </nav>
        <div id="whitespace"></div>
        <!-- da completare con PHP Session-->
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
                <a class='hvr-underline-from-center' href='register.php'>REGISTRATI</a>
            </nav>";
        }
        ?>
        
    </section>
    </header>
    <main class="centravert">
        <div class="logintext">
            <h1>Accedi e scopri tutti i vantaggi!</h1>
            <p>Effettua l'accesso e scopri tutte le funzionalità del nostro sistema di candidatura.</p>

            <h3>Non sei ancora registrato? <a href="">Clicca qui!</a></h3>
        </div>
        <div class="form_box login_box">
        <h1>Accesso</h1>
        <form class="user_form" action="login.php" method="post">
            <label for="username">Nome Utente</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <label for="ricorda">
                    <input class="checkbox" type="checkbox" name="ricorda" id="ricorda" value="ricorda">
                    Ricordami
                </label>
                <a href="recovery.php">Password dimenticata?</a>
                <button class="hvr-grow" type="submit">Accedi</button>
        </form>
    </div>
    </main>
    <footer>
        JobIT S.r.l, Via Dante 1, Molto molto lontano (ZZ) Tel. 1234 567890 e-mail: info@emaildiprova.com
    </footer>
    
</body>
</html>