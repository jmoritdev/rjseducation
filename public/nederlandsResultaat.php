<!DOCTYPE html>
<html>
<head>
  <title>Biologie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body> 
<h3><b>Nederlands</b></h3><br>
<h4><b>Beantwoord de volgende persoonsvorm vragen</b></h4><br>
<?php 
   $pvvraag = array(
            "Door de storm waaiden de pannen van het dak.",
            "Ik sloeg de spijker op de kop",
            "Na de voorstelling bleven we nog even hangen.",
            "September was dit jaar erg nat.",
            "De leraar heeft het proefwerk nagekeken.",
            "Hij zou dat wel even doen.",
            
        );
        
       $pvresultaat = array(
                    $_POST["pvvraag0"],
                    $_POST["pvvraag1"],
                    $_POST["pvvraag2"],
                    $_POST["pvvraag3"],
                    $_POST["pvvraag4"],
                    $_POST["pvvraag5"]
                   
       );
        
   $pvantwoord = array(
             "waaiden",
             "sloeg",
             "bleven",
             "was",
             "heeft",
             "zou",    
        );
    
    
        for($pva = 0; $pva<6; $pva++){
            if($pvresultaat[$pva] == $pvantwoord[$pva]){
                $pveindantwoord[$pva] = $pvantwoord[$pva];
                $pveindbericht[$pva] = "Goed gedaan!";
            } 
                else{
                    $pveindantwoord[$pva] = "";
                    $pveindbericht[$pva] = "Helaas, probeer het nog een keer.";
                    }      
        }
?>
<form action="nederlandsResultaat.php" method="POST">
     <?php for($pvi = 0; $pvi<6; $pvi++){?> 
            <label> <?=$pvvraag[$pvi]?> </label> <input type="text" name="<?="pvvraag{$pvi}"?>" value="<?=$pveindantwoord[$pvi]?>" autocomplete="off"> <?=$pveindbericht[$pvi]?><br>
<?php } ?>
        
        <br><input type="submit" name="button" value="Invullen">
    </form>      
</body>
</html>
