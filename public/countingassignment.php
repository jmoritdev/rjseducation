<?php

function init() {
    $_SESSION['pic'] = array('100euro.png', '50euro.png', '20euro.png', '10euro.png', '5euro.png', '2euro.png', '1euro.png', '50cent.png', '20cent.png', '10cent.png', '5cent.png');
    $_SESSION['euro'] = array(100, 50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05);

    $_SESSION['nieuweVraag'] = true;
    $_SESSION['vraag'] = 1;
}

function checkAnswerButtonPressed() {
    if (isset($_POST['antwoord0'])) {
        $_SESSION['buttonGeklikt'] = 0;
    } else if (isset($_POST['antwoord1'])) {
        $_SESSION['buttonGeklikt'] = 1;
    } else if (isset($_POST['antwoord2'])) {
        $_SESSION['buttonGeklikt'] = 2;
    } else if (isset($_POST['antwoord3'])) {
        $_SESSION['buttonGeklikt'] = 3;
    }
}

function start() {
    session_start();

    checkAnswerButtonPressed();

    if (isset($_POST['next'])) {
        // next button geklikt
        $_SESSION['nieuweVraag'] = true;
        $_SESSION['vraag'] = $_SESSION['vraag'] + 1;
        unset($_SESSION['buttonGeklikt']);
    } else if (isset($_SESSION['buttonGeklikt'])) {
        // antwoord-button geklikt
        $_SESSION['nieuweVraag'] = false;
    } else {
        // geen button geklikt, eerste vraag
        init();
    }
}

function genereerGeldstukken() {
    $_SESSION['juisteAntwoord'] = 0.0;
    $_SESSION['aantalGeldStukken'] = rand(4, 6);      // random 4,5 of 6 geldstukken
    $_SESSION['randomGeldstukken'] = [];        // lege array van random geldstukken
    // loop waarin 4, 5 of 6 geldstukken willekeurig worden gekozen
    for ($i = 0; $i < $_SESSION['aantalGeldStukken']; $i++) {
        $j = array_rand($_SESSION['euro']);        // random positie van de array
        array_push($_SESSION['randomGeldstukken'], $j);    // positie toevoegen aan de array $randomGeldstukken
        $_SESSION['juisteAntwoord'] = $_SESSION['juisteAntwoord'] + $_SESSION['euro'][$j]; //tel de waarde op bij $juisteAntwoord  
    }
    sort($_SESSION['randomGeldstukken']);        //sorteer zodat de randomGeldstukken van hoge naar lage waarde op volgorde komen te staan
}

function toonGeldstukken() {
    for ($i = 0; $i < $_SESSION['aantalGeldStukken']; $i++) {   // 4, 5 of 6 keer loopen
        $geldstuk = $_SESSION['randomGeldstukken'][$i];    // $geldstuk = positie van de i-de random geldstuk
        echo "<li style=\"display: inline;\"> <img src=\" /Assets/images/" . $_SESSION['pic'][$geldstuk] . "\" width=\"250\" height=\"250\"> 
						</li>"; // print alle geldstukken op het scherm.
    }
}

function genereerAntwoorden() {
    $_SESSION['alleAntwoorden'] = [];          // lege array waarin antwoorden kunnen
    array_push($_SESSION['alleAntwoorden'], $_SESSION['juisteAntwoord']);   // juiste antwoord toevoegen aan $alleAntwoorden array

    while (count($_SESSION['alleAntwoorden']) < 4) {     //voeg 3 foute antwoorden toe. 
        $plusMin = rand(0, 1);        // random plus of min.
        $random = array_rand($_SESSION['euro']);      // random positie in de array
        $randomAntwoord = array_rand($_SESSION['alleAntwoorden']);   // willekeurig een antwoord kiezen die al gegenereerd is

        if ($plusMin == 0) {        // als $plusMin gelijk is aan 0 haalt hij een random geldstuk van het $juisteAntwoord af
            $foutAntwoord = $_SESSION['alleAntwoorden'][$randomAntwoord] - $_SESSION['euro'][$random];
        } else {            // anders: telt hij de waarde van een random geldstuk bij $juisteAntwoord op
            $foutAntwoord = $_SESSION['alleAntwoorden'][$randomAntwoord] + $_SESSION['euro'][$random];
        }
        if ($foutAntwoord > 0 && !in_array($foutAntwoord, $_SESSION['alleAntwoorden'])) { // $foutAntwoord moet een positief bedrag zijn en mag niet in de array voorkomen
            array_push($_SESSION['alleAntwoorden'], $foutAntwoord);      //$foutAntwoord toevoegen aan $alleAntwoorden array
        }
    }
    shuffle($_SESSION['alleAntwoorden']);        // alle antwoorden door elkaar husselen

    $_SESSION['correctButton'] = array_search($_SESSION['juisteAntwoord'], $_SESSION['alleAntwoorden']);
}

function echoButton($i) {
    echo "<input type=\"submit\" class=\"btn btn-default\" name=\"antwoord$i\" value=\"" . number_format($_SESSION['alleAntwoorden'][$i], 2) . "\"/>";
}

function echoColorButton($i, $color) {
    echo "<input type=\"submit\" class=\"btn btn-default\" name=\"antwoord$i\" value=\"" . number_format($_SESSION['alleAntwoorden'][$i], 2) . "\" style=\"border-color: $color\" />";
}

function toonButtons() {
    echo "<br>";
    // echo $_SESSION['juisteAntwoord']; 								// print het juiste antwoord
    echo "<br>";

    for ($i = 0; $i < 4; $i++) {         // loop print 4 buttons uit met de waardes uit $alleAntwoorden array op 2 decimalen.
        if (isset($_SESSION['buttonGeklikt']) && $_SESSION['buttonGeklikt'] == $i) {
            if ($_SESSION['correctButton'] == $i) {
                echoColorButton($i, '#00FF00');                    //groene button
            } else {
                echoColorButton($i, '#FF0000');      // rode button
            }
        } else {
            echoButton($i);             // anders blijft hij grijs.
        }
    }
}

function genereerVraag() {
    genereerGeldstukken();
    genereerAntwoorden();
}

function toonVraag() {
    echo "Vraag " . $_SESSION['vraag']."<br><br>";
    if ($_SESSION['nieuweVraag']) {                  // toon zelfde geldstukken of ga naar volgende vraag als juiste antwoord is gekozen
        genereerVraag();
    }
    toonGeldstukken();
}

start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "layout.php"; ?>
    </head>
    <body>
        <div class="container">
            <br><br><br>
            <div>
                <form action="countingassignment.php" method="post">
                    <ul>
                        <div class="page-header">
                            <h1><?php toonVraag() ?></h1>
                        </div>
                    </ul>
                    <p>
                    <div class="button-group" role="group">
                        <?php toonButtons() ?>
                    </div>
                    <p>
                        <input class="btn btn-success" type="submit" name="next" value="Next" />
                </form>
            </div>
        </div>
    </body>
</html>
