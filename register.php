<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <!--Animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--Icone font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    <title>JobIT</title>
    <script>

        function animazione() {
            let bottoni = document.querySelector('#selezioneTipo');
            let form = document.querySelector('.registra_box');
            document.querySelector('#selezioneTipo').classList.add('animate__fadeOutLeft');
            bottoni.style.setProperty('--animate-duration', '0.5s');
            bottoni.addEventListener('animationend', () => {
                bottoni.style.display = "none";
                form.classList.add('animate__animated', 'animate__fadeInRight')
                form.style.setProperty('--animate-duration', '0.8s');
                form.style.display = "unset";
            });

        }
        function mostraAzienda() {
            animazione();
            document.querySelector('#formaziende').style.display = "unset";
            
        }
        function mostraCandidato() {
            animazione();
            document.querySelector('#formcandidato').style.display = "unset";
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#aziendabutton').onclick = mostraAzienda;
            document.querySelector('#candidatobutton').onclick = mostraCandidato;
        });
    </script>
</head>

<body>
    <header>
        <section id="navigazione">
            <nav>
                <img id="logo" src="images/logo.png" alt="logo">
                <a class="hvr-underline-from-center" href="index.php">HOME</a>
                <a class="hvr-underline-from-center" href="offerte.php">OFFERTE</a>
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
                <a class='hvr-underline-from-center' href='login.php'>ACCEDI</a>
                </nav>";
            }
            ?>
        </section>
    </header>
    <main class="centravert">
        <div class="logintext">
            <h1>Registrati e scopri tutte le funzionalità!</h1>
            <p>Che tu sia un azienda o un candidato, registrati e scopri tutte le funzionalità del nostro sistema di selezione!</p>
            <h3>Sei già registrato? <a href="login.php">Clicca qui!</a></h3>
        </div>
        <div id="selezioneTipo" class="animate__animated">
            <h2>Sei un:</h2>
            <button id="aziendabutton" class="hvr-grow hvr-icon-grow"><i class="far fa-building hvr-icon"></i><br>Azienda</button>
            <button id="candidatobutton" class="hvr-grow    hvr-icon-grow"><i class="fas fa-user-tie hvr-icon"></i><br>Candidato</button>
        </div>
        <div class="form_box registra_box">

            <h1>Registrati</h1>

            <!--Registrazione aziende-->
            <form id="formaziende" class="user_form registra" action="scripts/registra.php" method="post">
                <input style="display: none;" type="radio" name="tipo" id="azienda" value="azienda" checked>
                <fieldset>
                    <legend>Dati utente</legend>

                    <label for="email">E-Mail
                        <input type="email" name="email" id="email" required>
                    </label>
                    <label for="username">Nome Utente
                        <input type="text" name="username" id="username" required>
                    </label>
                    <br>
                    <label for="password">Password
                        <input type="password" name="password" id="password" required>
                    </label>
                    <label for="password">Conferma Password
                        <input type="password" name="confpassword" id="confpassword" required>
                    </label>
                </fieldset>

                <fieldset id="dati_profilo">
                    <legend>Dati Azienda</legend>

                    <label for="piva">P.IVA
                        <input type="text" name="piva" id="piva" required>
                    </label>

                    <label for="nome">Nome Azienda
                        <input type="text" name="nome" id="nome" required>
                    </label>
                    <br>

                    <label for="telefono">Telefono
                        <input type="text" name="telefono" id="telefono" required>
                    </label>

                </fieldset>

                <fieldset>
                    <legend>Indirizzo:</legend>

                    <label for="indirizzo">Via e numero civico
                    <input type="text" name="indirizzo" id="indirizzo" required></label>
                    
                    <label for="citta">Città
                    <input type="text" name="citta" id="citta" required></label>
                    <br>
                    <label for="cap">CAP
                    <input type="text" name="cap" id="cap" required></label>
                    
                    <label for="provincia">Provincia
                    <input type="text" name="provincia" id="provincia" required></label>
                </fieldset>
                
                <button type="submit">Registrati</button>
            </form>

            <!--Registrazione candidati-->
            <form id="formcandidato" class="user_form registra" action="scripts/registra.php" method="post">
                <!--serve per la lettura del tipo di utente dal php-->
                <input style="display: none;" type="radio" name="tipo" id="candidato" value="candidato" checked>
                <fieldset>
                    <legend>Dati utente</legend>

                    <label for="email">E-Mail
                        <input type="email" name="email" id="email" required>
                    </label>
                    <label for="username">Nome Utente
                        <input type="text" name="username" id="username" required>
                    </label>
                    <br>
                    <label for="password">Password
                        <input type="password" name="password" id="password" required>
                    </label>
                    <label for="password">Conferma Password
                        <input type="password" name="confpassword" id="confpassword" required>
                    </label>
                </fieldset>

                <fieldset id="dati_profilo">
                    <legend>Dati Personali</legend>

                    <label for="nome">Nome
                        <input type="text" name="nome" id="nome" required>
                    </label>
                    <label for="cognome">Cognome
                        <input type="text" name="cognome" id="cognome" required>
                    </label>
                    <br>

                    <label for="cf">Codice Fiscale
                        <input type="text" name="cf" id="cf">
                    </label>

                    <label for="datanascita">Data di nascita
                    <input type="date" name="datanascita" id="datanascita" required></label>
            
                    <br>
                    <label for="telefono">Telefono
                        <input type="text" name="telefono" id="telefono" required>
                    </label>

                </fieldset>

                <fieldset>
                    <legend>Indirizzo:</legend>

                    <label for="indirizzo">Via e numero civico
                    <input type="text" name="indirizzo" id="indirizzo" required></label>
                    
                    <label for="citta">Città
                    <input type="text" name="citta" id="citta" required></label>
                    <br>
                    <label for="cap">CAP
                    <input type="text" name="cap" id="cap" required></label>
                    
                    <label for="provincia">Provincia
                    <input type="text" name="provincia" id="provincia" required></label>
                </fieldset>
                
                <button type="submit">Registrati</button>
            </form>

        </div>
    </main>

</body>

</html>