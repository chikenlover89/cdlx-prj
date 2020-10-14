<?php
session_start();
include_once 'Finder.php';

$pdb = new PDO('sqlite:pin.db');
$statement = $pdb->query("SELECT * FROM tbl_pin");
$pdbArray = $statement->fetchAll(PDO::FETCH_ASSOC);


$finder = new Finder($pdbArray);

if ($_POST['pin'] != NULL) {
    $_SESSION['authorized'] = $finder->findPerson($_POST['pin']);
}

//var_dump($_SESSION);

?>

<html>
<body>

<form action="/" method="post">
    Enter PIN
    <input type="text" id="search" name="pin"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
