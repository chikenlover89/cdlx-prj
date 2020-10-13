<?php

include_once 'CsvManager.php';
include_once 'ImageManager.php';

$csv = new CsvManager('./images.txt');
$img = new ImageManager($csv->readCSVtoArray());


if ($_POST['Like'] != NULL) {

$img->updateLikes($_POST['Like']);

}

$csv->deleteFile();
foreach ($img->getImages() as $items) {
    $csv->writeArraytoCSV($items);
}


?>


<html>
<style>
.images{
    margin: auto;
    width: 50%;
    padding: 20px;
}
h1{
    text-align:center
}

.likes{
    padding: 10px;
}
</style>


<body>

<h1>TOP FOODS</h1>

<?php foreach ($img->getImages() as $item): ?>
    <div class="images">
        <img src="<?php echo $item[2] ?>" alt="image" width="200">
        <div class="likes"><img src="https://www.vectorico.com/wp-content/uploads/2018/02/Like-Icon-300x289.png"
                  width="15"><?php echo $item[1] ?></div>
        <form action="/" method="post">
            <button type="submit" name="Like" value="<?php echo $item[0] ?>">Like</button>
            <button type="submit" name="Like" value="-<?php echo $item[0] ?>">Dislike</button>
        </form>
    </div>
<?php endforeach; ?>

</body>

</html>
