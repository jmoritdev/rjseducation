<?php 
    session_start();
    if($_SESSION["usertype"] != "ADMIN"){
        header("Location: home.php");
    }
    
    include_once("dbconnect.php");
    
    $sql = "SELECT classcode FROM class ORDER BY classcode";
    $query = mysqli_query($dbCon, $sql);
    $results = mysqli_fetch_all($query);
    
    
    $username = strip_tags($_POST["username"]);
    $password = md5(strip_tags($_POST["password"]));
    $usertype = strip_tags($_POST["usertype"]);
    $class =  $_POST["class"];
    
    
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
                <form action="membernew.php" method="post">
                    
                    <div class="form-group">
                        <label for="username">Gebruikersnaam (Voorletter(s) + achternaam)</label>
                        <input class="form-control" id="username" type="text" name="username">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Tijdelijk wachtwoord</label>
                        <input class="form-control" id="password" type="password" name="password">
                    </div>
                    
                    <?php if($_SESSION["usertype"] == "ADMIN"){ ?>
                    <div class="form-group">
                        <label>Gebruikerstype</label><br>
                        <div class="checkbox">
                            <input class="form-control" id="usertypeAdmin" type="radio" name="usertype" value="ADMIN">
                            <label for="usertypeAdmin">Admin</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-control" id="usertypeTeacher" type="radio" name="usertype" value="TEACHER">
                            <label for="usertypeTeacher">Leraar</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-control" id="usertypeStudent" type="radio" name="usertype" value="STUDENT">
                            <label for="usertypeStudent">Leerling</label>
                        </div>
                    </div>    
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="classList">Klas</label>
                        <select class="form-control" name="class">
                            <?php foreach ($results as $value) { ?>
                            <option value="<?php $value ?>"><?php $value ?></option>    
                            <?php } ?>
                        </select> 
                    </div>  
                    
                    <button type="submit" class="btn btn-success">Verzenden</button>
                    
                </form>
            </div>
        </div>
    </body>
</html>


