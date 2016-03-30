<?php
session_start();

if (isset($_POST['username'])) {


    include_once("dbconnect.php");

    if ($dbCon->connect_errno) {
        echo("Connection with database failed");
    } else {
        echo("Successfully connected with database");
    }

    $usname = strip_tags($_POST['username']);
    $paswd = strip_tags($_POST['password']);

    $usname = mysqli_real_escape_string($dbCon, $usname);
    $paswd = mysqli_real_escape_string($dbCon, $paswd);

    $paswd = md5($paswd); // using md5 just for testing purposes


    $sql = "SELECT id, username, password FROM member WHERE username = '$usname'";
    $query = mysqli_query($dbCon, $sql);
    $row = mysqli_fetch_row($query);
    $uid = $row[0];
    $dbUsname = $row[1];
    $dbPassword = $row[2];

    if ($usname == $dbUsname && $paswd == $dbPassword) {

        $_SESSION['username'] = $usname;
        $_SESSION['id'] = $uid;

        header("Location: home.php");
    } else {
        echo "<h2>Oops that username or password combination was incorrect.
		<br /> Please try again.</h2>";
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <style type="text/css">
            html {
                font-family: Verdana, Geneva, sans-serif;
            }
            h1 {
                font-size: 24px;
                text-align: center;
            }
            #wrapper {
                position: absolute;
                width: 100%;
                top: 30%;
                margin-top: -50px;/* half of #content height*/
            }
            #form {
                margin: auto;
                width: 200px;
                height: 100px;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <h1>Basisschool de Ooievaar</h1>
            <form id="form" action="index.php" method="post" enctype="multipart/form-data">
                Gebruikersnaam: <input type="text" name="username" /> <br />
                Wachtwoord: <input type="password" name="password" /> <br />
                <input type="submit" value="Login" name="Submit" />
            </form>
    </body>

</html>