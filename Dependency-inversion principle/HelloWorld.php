<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('Report.php');
    require('JsonReportFormatter.php');
    $item= new Report("buixuankhai","12-04-2001");
    $item1= new JsonReportFormatter($item);
    print_r($item1);
    echo $item1->format();
    ?>
</body>
</html>