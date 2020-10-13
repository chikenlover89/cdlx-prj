<?php

include_once 'PinManager.php';

session_start();
$pinManager = new PinManager();
$pinManager->setPin('1234');

if (isset($_POST['pin'])) {
    $_SESSION['pin'] .= $_POST['pin'];
}

$pinManager->setTempPin(trim($_SESSION['pin']));

if (strlen($pinManager->getTempPin()) >= 4) {
    unset($_SESSION['pin']);
}

?>

<html>

<body>
<h1><?php echo $pinManager->checkPin()?></h1>
<h2><?php echo str_repeat('*', strlen($pinManager->getTempPin())) ?></h2>

<form action="/" method="post">
    <div class="inputButton">
        <div>
            <input type="submit" id="1" name="pin" value="1"/>
            <input type="submit" id="2" name="pin" value="2"/>
            <input type="submit" id="3" name="pin" value="3"/>
        </div>
        <div>
            <input type="submit" id="4" name="pin" value="4"/>
            <input type="submit" id="5" name="pin" value="5"/>
            <input type="submit" id="6" name="pin" value="6"/>
        </div>
        <div>
            <input type="submit" id="7" name="pin" value="7"/>
            <input type="submit" id="8" name="pin" value="8"/>
            <input type="submit" id="9" name="pin" value="9"/>
        </div>
    </div>


</form>

</body>


</html>
