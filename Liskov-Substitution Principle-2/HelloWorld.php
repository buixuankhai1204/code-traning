<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('Shoes.php');
    require('SportShoes.php');
    require('Heels.php');
    $item=[new SportShoes(),new Heels()];
    foreach($item as $item){
        echo( $item->BackStrap());

    }
    ?>
</body>
</html>