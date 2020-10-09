<?php

include_once './ElementInterface.php';
include_once './AbstractElement.php';
include_once './Rock.php';
include_once './Paper.php';
include_once './Scissors.php';
include_once './Spock.php';
include_once './Lizard.php';
include_once './Result.php';
include_once './TieResult.php';
include_once './WinResult.php';
include_once './LooseResult.php';


$playTem = [new Rock(), new Scissors(), new Paper(), new Lizard(), new Spock()];

$bufferOK = false;
$playersChoice = explode("_", array_keys($_POST)[0])[0];
foreach ($playTem as $class) {
    if (get_class($class) == $playersChoice) {
        $bufferOK = true;
    }
}

if (!$bufferOK) {
    $playersChoice = 'Rock';
}

$playerClass = new $playersChoice();


$pcChoice = $playTem[rand(0, count($playTem) - 1)];


$result = $playerClass->beats($pcChoice);

$whoWon = $result->getMessage();
$yourImage = $playerClass->returnImageName();
$pcImage = $pcChoice->returnImageName();

?>

<html lang="eng">
<head>
    <style>

        .heading1 {
            text-align: center;
            font-size: 40px;
        }

        .column1 {
            text-align: center;
            float: left;
            width: <?php echo 100/count($playTem)?>%;
        }

        .column2 {
            text-align: center;
            float: left;
            width: 33%;
        }

        .vs {
            font-size: 50px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .blank {
            height: 50px;
        }

        body {
            background-image: url('images/chiken.jpeg');
        }
    </style>
</head>

<body>

<div class="heading1">
    <h1><?php echo $whoWon ?></h1>
</div>

<div class="row">
    <div class="column2">
        <img src="images/<?php echo $yourImage ?>" alt="ROCK" width="192" height="192">
        <p>YOU</p>
    </div>

    <div class="column2">
        <div class="vs">
            <p><b>VS</b></p>
        </div>
    </div>

    <div class="column2">
        <img src="images/<?php echo $pcImage ?>" alt="ROCK" width="192" height="192">
        <p>PC</p>
    </div>
</div>

<div class="blank">

</div>

<form action="/" method="post">
    <div class="row">

        <?php foreach($playTem as $class): ?>
        <div class="column1">
            <input type="image" src="images/<?php echo $class->returnImageName()?>" alt="<?php echo get_class($class)?>" id="<?php echo get_class($class)?>"  name="<?php echo get_class($class)?>" width="96" height="96"/>
            <p><?php echo strtoupper(get_class($class))?></p>
        </div>
        <?php endforeach; ?>

    </div>

</form>
</body>
</html>
