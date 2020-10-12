<?php
include_once "PinFileManager.php";

$value = join("",$_POST);

$pinFileManager = new PinFileManager('./pinCode.txt');
$inputPin = $pinFileManager->readPin();
$pinFileManager->writePin($value);
$inputPin = $pinFileManager->readPin();
$safelyStoredPin = '1234';
$stars = '';

if(strlen($inputPin) >= 4){
    if($inputPin == $safelyStoredPin){
        echo "PIN OK";
    }else{
        echo "WRONG PIN";
    }
    $value = '';
    $pinFileManager->deleteFile();

}else{
    for($i = 0;$i<strlen($inputPin);$i++){
        $stars .= '*';
    }
}


?>

<html>

<body>

<h1><?php echo $stars ?></h1>

<form action="/" method="post">
    <div class="inputButton">
    <div>
        <input type="submit" id="1" name="1" value="1"/>
        <input type="submit" id="2" name="2" value="2"/>
        <input type="submit" id="3" name="3" value="3"/>
    </div>
    <div>
        <input type="submit" id="4" name="4" value="4"/>
        <input type="submit" id="5" name="5" value="5"/>
        <input type="submit" id="6" name="6" value="6"/>
    </div>
    <div>
        <input type="submit" id="7" name="7" value="7"/>
        <input type="submit" id="8" name="8" value="8"/>
        <input type="submit" id="9" name="9" value="9"/>
    </div>
    </div>


</form>

</body>



</html>
