<?php

include_once 'Finder.php';

$mdb = new PDO('sqlite:mdb.db');
$statement = $mdb->query("SELECT * FROM tbl_mobile");
$mdbArray = $statement->fetchAll(PDO::FETCH_ASSOC);

$finder = new Finder($mdbArray);

if ($_POST['search'] != NULL) {
    echo $finder->findPerson($_POST['search']);
}

?>

<html>
<body>

<form action="/" method="post">
    Phone Number
    <input type="text" id="search" name="search"><br><br>
    <input type="submit" value="Search">
</form>

</body>
</html>
