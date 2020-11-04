<?php
session_start();
include_once 'PinManager.php';
include_once 'ChatManager.php';

$pinMng = new PinManager(new PDO('sqlite:pin.db'));
$pinMng->readDatabase();

$chtMng = new ChatManager(new PDO('sqlite:chat.db'));

if ($_POST['pin'] != NULL) {
    $_SESSION['authorized'] = $pinMng->findPerson($_POST['pin']);
}


if ($_POST['msg'] != NULL) {
    $chtMng->writeDatabase($_SESSION['authorized'], $_POST['msg']);
}

if ($_POST['logout'] != NULL) {
    $_SESSION['authorized'] = 'anon';
}

if ($_POST['delete'] != NULL) {
    $chtMng->deleteDatabase();
}


?>

<html>

<head>
    <style>

        .fline {
            height: 60px;
        }
        .chat{
            outline: 5px dotted black;
            margin: 10px;
            margin-inside: 10px;
        }
        h3{
            text-align: center;
        }

    </style>

</head>


<body>

<div class="fline">
    <form action="/" method="post">
        Logged in as <b><?php echo $_SESSION['authorized'];if($_SESSION['authorized']=='anon'){echo " (default)";} ?></b>
        <input type="submit" name="logout" value="Logout">
    </form>
</div>

<div>
    <form action="/" method="post">
        Login with PIN:
        <input type="text" id="search" name="pin">
        <input type="submit" value="Log in">
    </form>
</div>

<div>
    <form action="/" method="post">
        Enter message:
        <input type="text" id="msg" name="msg">
        <input type="submit" value="Submit">
    </form>
</div>

<h3>CHAT</h3>
<div class="chat">
    <?php
    echo $chtMng->readDatabase();
    ?>
</div>
<form action="/" method="post">
    <input type="submit" name="delete" value="Delete all">
</form>

</body>
</html>
