<?php

include_once 'CsvFileManager.php';
include_once 'ListManager.php';

$csv = new CsvFileManager('./list.txt');
$listManager = new ListManager($csv->readCSVtoArray());

if ($_POST['delete'] != NULL) {
    $listManager->delete($_POST['delete']);
}

if ($_POST['toDo'] != NULL || $_POST['toDo'] != "") {
    $listManager->add($_POST['toDo']);
}

$csv->deleteFile();
foreach ($listManager->getList() as $item) {
    $csv->writeArraytoCSV($item);
}

?>

<html>

<body>
<h1>
    This is my to do list!
</h1>


<form action="/" method="post">

    <?php foreach ($listManager->getList() as $item): ?>
        <div>
            <?php echo $item[1] ?>
            <button type="submit" name="delete" value="<?php echo $item[0] ?>">X</button>
        </div>
    <?php endforeach; ?>
</form>


<form action="/" method="post">
    <div>
        To Do: <input type="text" id="toDo" value="" name="toDo">
        <button type="submit">Add</button>
    </div>

</form>


</body>


</html>
