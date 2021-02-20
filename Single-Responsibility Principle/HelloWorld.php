<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('Circle.php');
    require('Square.php');
    require('AreaCalculator.php');
    require('SumCalculatorOutputter.php');
    $shapes = [
        new Circle(2),
        new Square(5),
        new Square(6),
      ];
      $areas = new AreaCalculator($shapes);
      $output = new SumCalculatorOutputter($areas);
      print_r($areas);
      print_r($output);
      echo $output->JSON();
      echo $output->HTML();
    ?>
</body>
</html>