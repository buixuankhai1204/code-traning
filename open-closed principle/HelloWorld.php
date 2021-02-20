<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('Pay.php');
    require('MomoPay.php');
    require('ZaloPay.php');
    
    $item= new Pay(1000000,'zalo',10000);
    
    $item->check_type();
    ?>
</body>
</html>