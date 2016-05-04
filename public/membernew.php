<?php
session_start();
if ($_SESSION["usertype"] != "ADMIN") {
    header("Location: home.php");
}

include_once("dbconnect.php");

$sql = "SELECT id, classcode FROM class";
$query = mysqli_query($dbCon, $sql);
$results = mysqli_fetch_all($query);

if ($_POST["username"] != "") {
    $username = strip_tags($_POST['username']);
    $password = md5(strip_tags($_POST["password"]));
    $usertype = strip_tags($_POST["usertype"]);
    $class = strip_tags($_POST["class"]);

    if ($class != "") {
        $sqlInsert = "INSERT INTO member (username, password, usertype, class_id) VALUES('$username', '$password', '$usertype', '$class')";
    } else {
        $sqlInsert = "INSERT INTO member (username, password, usertype) VALUES('$username', '$password', '$usertype')";
    }
    if (!mysqli_fetch_all(mysqli_query($dbCon, "SELECT username FROM member WHERE username = '" .$username. "'")) === "") {
        if ($dbCon->query($sqlInsert) === TRUE) {
            echo "Succesvol een nieuwe gebruiker aangemaakt!";
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $dbCon->error;
        }
    } else {
        echo "Deze gebruiker bestaat al!";
    }
}
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
                        <input class="form-control" id="username" type="text" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Tijdelijk wachtwoord</label>
                        <input class="form-control" id="password" type="password" name="password" required>
                    </div>

                    <?php if ($_SESSION["usertype"] == "ADMIN") { ?>
                        <div class="form-group">
                            <label>Gebruikerstype</label><br>
                            <div>
                                <input id="usertypeAdmin" type="radio" name="usertype" value="ADMIN">
                                <label for="usertypeAdmin">Admin</label>
                            </div>
                            <div>
                                <input id="usertypeTeacher" type="radio" name="usertype" value="TEACHER">
                                <label for="usertypeTeacher">Leraar</label>
                            </div>
                            <div>
                                <input id="usertypeStudent" type="radio" name="usertype" value="STUDENT" checked>
                                <label for="usertypeStudent">Leerling</label>
                            </div>
                        </div>    
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="classList">Klas</label>
                        <select class="form-control" name="class">
                            <option/>
                            <?php foreach ($results as $array) { ?>
                                <option value="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></option>    
                            <?php } ?>
                        </select> 
                    </div>  

                    <button type="submit" class="btn btn-success">Verzenden</button>

                </form>
            </div>
        </div>
    </body>
</html>


