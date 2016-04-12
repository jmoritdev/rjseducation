<?php
session_start();

$pvvraag = array(
    "Door de storm waaiden de pannen van het dak.",
    "Ik sloeg de spijker op de kop",
    "Na de voorstelling bleven we nog even hangen.",
    "September was dit jaar erg nat.",
    "De leraar heeft het proefwerk nagekeken.",
    "Hij zou dat wel even doen."
);

$pvresultaat = array(
    $_POST["pvvraag0"],
    $_POST["pvvraag1"],
    $_POST["pvvraag2"],
    $_POST["pvvraag3"],
    $_POST["pvvraag4"],
    $_POST["pvvraag5"]
);

if($_POST["pvvraag0"] != "" && $_POST["pvvraag1"] != "" && $_POST["pvvraag2"] != "" &&
$_POST["pvvraag3"] != "" && $_POST["pvvraag3"] != "" && $_POST["pvvraag4"] != "" && $_POST["pvvraag5"] != "") {
    
    $pvantwoord = array(
        "waaiden",
        "sloeg",
        "bleven",
        "was",
        "heeft",
        "zou"
    );


    for ($pva = 0; $pva < 6; $pva++) {
        if ($pvresultaat[$pva] == $pvantwoord[$pva]) {
            $pveindantwoord[$pva] = $pvantwoord[$pva];
            $pveindbericht[$pva] = "Correct!"."<br>";
        } else {
            $pveindantwoord[$pva] = "";
            $pveindbericht[$pva] = "Helaas, probeer het nog een keer."."<br>";
        }
    }
    
} else {
    echo "Vul alle vragen in!";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nederlands Opdracht</title>
        <?php include "layout.php"; ?>
    </head>
    <body>
        <div class="container">
            <br><br><br>
            <div>
                <h3><b>Nederlands</b></h3><br>
                <h4><b>Beantwoord de volgende persoonsvorm vragen</b></h4><br>
                <form action="dutchassignment.php" method="POST">
                    <?php for ($pvi = 0; $pvi < 6; $pvi++) { ?> 
                    
                        <label> <?= $pvvraag[$pvi] ?> </label> 
                        <input class="form-control" type="text" name="<?= "pvvraag{$pvi}" ?>" value="" autocomplete="off"/>
                        <?= $pveindbericht[$pvi] ?><br>
                        
                    <?php } ?>
                    <br><input class="btn btn-success" type="submit" name="button" value="Invullen"/>
                </form>  
            </div>
        </div>
    </body>
</html>