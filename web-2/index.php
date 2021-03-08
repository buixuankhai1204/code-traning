<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        p{
            display: inline-block;
            padding: 5px;
            background-color: orange;
        }
    </style>
<?php
    

?>
    <form action="http://localhost/code-traning/web-2/" method="POST">
        <input type="text" name="text" value="<?php if(isset($_POST['text'])) echo $_POST['text'] ?>">
        <button type="submit" name="submit">ket qua</button>
    </form>
   
</body>

</html>