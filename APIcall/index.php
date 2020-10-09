<?php

include_once 'agifyAPI.php';
include_once 'csvManager.php';

if ($_POST['fname'] != NULL) {
    $name = $_POST['fname'];

    $csvManager = new csvManager('./names.csv');
    $names = $csvManager->readCSVtoArray();
    $nameFound = false;

    foreach ($names as $personData) {
        if ($personData[0] == $name) {
            echo "$personData[0]/$personData[1]/$personData[2]\n";
            $nameFound = true;
        }
    }

    if ($nameFound == false) {
        $newData = agifyAPI::call($name);
        echo join('/', $newData);
        $csvManager->writeArraytoCSV($newData);
    }
} else {
    echo "no data";
}

?>

<html lang="eng">
<body>

<form action="/" method="post">
    <label for="fname">Enter name:</label><br>
    <input type="text" id="fname" name="fname"><br><br>
    <input type="submit" value="Submit">
</form>


</body>
</html>
