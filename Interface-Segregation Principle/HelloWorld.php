<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('Worker.php');
    require('Coder.php');
    require('ClientFacer.php');
    require('Developer.php');
    require('Manager.php');
    $item=new Developer();
    $item1=new Manager();
    echo $item->timeGetPaid();
    ?>
</body>
</html>