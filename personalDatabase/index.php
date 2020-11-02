<?php

include_once 'Person.php';
include_once 'Database.php';

$database = new Database('./database.csv');

if ($_POST['fname'] != NULL && $_POST['sname'] != NULL && $_POST['pcode'] != NULL && $_POST['adress'] != NULL) {

    $newPerson = new Person($_POST['fname'], $_POST['sname'], $_POST['pcode'], $_POST['adress']);
    $database->getDatabase();
    if ($database->searchForPerson($newPerson->getPcode()) == '') {
        $database->setPerson($newPerson);
        echo "person data submitted";
    } else {
        echo "person already in database";
    }

}

if ($_POST['search'] != NULL) {

    $database->getDatabase();
    if ($database->searchForPerson($_POST['search']) != '') {
        echo $database->searchForPerson($_POST['search']);
    } else {
        echo 'not found';
    }

}


?>


<html lang="eng">
<head>
    <style>
        .empty {
            height: 30px;
        }
    </style>
</head>
<body>
<div class="empty">

</div>

<form action="/" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" value="Janis" name="fname"><br><br>
    <label for="sname">Surname name:</label><br>
    <input type="text" id="sname" value="Kalnins" name="sname"><br><br>
    <label for="pcode">Personal code:</label><br>
    <input type="text" id="pcode" value="123456-654321" name="pcode"><br><br>
    <label for="adress">Adress:</label><br>
    <input type="text" id="adress" value="Klava str. 3" name="adress"><br><br>
    <input type="submit" value="Submit">
</form>

<div class="empty">

</div>

<form action="/" method="post">
    <label for="search">Personal code:</label><br>
    <input type="text" id="search" name="search"><br><br>
    <input type="submit" value="Search">
</form>


</body>
</html>
