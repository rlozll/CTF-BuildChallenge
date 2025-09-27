<?php

ini_set("error_reporting", 0);

if(isset($_GET['source'])) {
    highlight_file(__FILE__);
    exit();
}

include "flag.php";

$MAX_NUMS = 5;

if(isset($_POST['numbers']) && is_array($_POST['numbers'])) {

    $numbers = array();
    
    for($i = 0; $i < $MAX_NUMS; $i++) {
        if(!isset($_POST['numbers'][$i]) || strlen($_POST['numbers'][$i]) > 4 || !is_numeric($_POST['numbers'][$i])) {
            continue;
        }
        
        $the_number = intval($_POST['numbers'][$i]);
        
        if($the_number < 0) {
            continue;
        }

        $numbers[] = $the_number;
    }

    $sum = intval(array_sum($numbers));

    if($sum < 0) {
        echo "You win a flag: $FLAG";
    } else {
        echo "You win nothing with number $sum ! :-(";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Numberizer</title>
    </head>
    <body>
        <h1>Numberizer</h1>
        <form action="/" method="post">
            <label for="numbers">Give me at most 5 numbers to sum!</label><br><br>
            <?php
            for($i = 0; $i < $MAX_NUMS; $i++) {
                echo '<input type="text" name="numbers[]" style="margin-bottom: 5px;"><br>';
            }
            ?>
            <button type="submit">Submit</button>
        </form>
        <hr>
        <p>To view the source code, <a href="/?source=1">click here.</a></p>
    </body>
</html>