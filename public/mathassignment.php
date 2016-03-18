<?php
$table = 5;

$userAnswers = $_POST['answer'];
$correctAnswers = $_POST['correctAnswer'];

?>
<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<form action="mathassignment.php" method="POST">
    <?php
    for ($x = 1; $x < 11; $x++) {
        echo $x . " x " . $table . " = ";
        ?>
        <input type="text" name="answer[]" value=""/>
        <input type="hidden" name="correctAnswer[]" value="<?php echo $x * $table; ?>"/>
        <?php
        
        if ($userAnswers[$x - 1] != "") {
            if($userAnswers[$x - 1] == $correctAnswers[$x - 1]){
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

