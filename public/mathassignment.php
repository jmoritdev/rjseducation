<?php
$table = 5;

$userAnswers = $_POST['answer'];
$correctAnswers = $_POST['correctAnswer'];
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
                <form action="mathassignment.php" method="POST">
                    <?php
                    for ($x = 1; $x < 11; $x++) {
                        echo $x . " x " . $table . " = ";
                        ?>
                        <input type="text" name="answer[]" value=""/>
                        <input type="hidden" name="correctAnswer[]" value="<?php echo $x * $table; ?>"/>
                        <?php
                        if ($userAnswers[$x - 1] != "") {
                            if ($userAnswers[$x - 1] == $correctAnswers[$x - 1]) {
                                echo "Correct!";
                            } else {
                                echo "Incorrect!";
                            }
                        }

                        echo "<br>";
                    }
                    ?>
                    <input class="btn btn-danger" type="submit" name="submitButton" value="Lever in"/>
                </form>
            </div>
        </div>
    </body>
</html>

