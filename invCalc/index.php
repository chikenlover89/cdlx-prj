<?php

include_once 'Calculator.php';



if($_POST['money'] != NULL){

    echo "RETURN INVESTMENT: ".Calculator::investment((float)$_POST['money'],(int)$_POST['years'],(float)$_POST['percent'])."\n";

}

?>


<html lang="eng">

<body>
<h1>Investment calculator</h1>
<form action="/" method="post">
    <label for="money">Amount of money:</label><br>
    <input type="number" id="money" name="money" min="0" step="0.01">><br><br>
    <label for="years">Investment time in years:</label><br>
    <input type="number" id="years" name="years" min="0"><br><br>
    <label for="percent">Annual percentage rate:</label><br>
    <input type="number" id="percent" name="percent" min="0" step="0.01">> <br><br>
    <input type="submit" value="Submit">
</form>


</body>
</html>
