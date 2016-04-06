<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">  </script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">  </script>
      <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
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
            "Hij zou dat wel even doen."
            );
    
    $_SESSION['pvraag']=$pvvraag;

?>



  <form action="nederlandsResultaat.php" method="POST">
     <?php for($pvi = 0; $pvi < 6; $pvi++){?> 
            <label> <?=$pvvraag[$pvi]?> </label> <input type="text" 
            name="<?="pvvraag{$pvi}"?>" value="" autocomplete="off"> <br>
     <?php } ?>
        
        <br><input type="submit" name="button" value="Invullen">
    </form>      
   
   
    
</body>
</html>