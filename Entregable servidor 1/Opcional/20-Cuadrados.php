<style>
    .square{
        width: 50px;
        height: 50px;
    }
</style>
<?php
    function renderRandomSquare(){
        return "<div class ='square' style='background-color: rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).");position: absolute; top:".rand(0,100)."%;  left:".rand(0,100)."%;')></div>";
    }

    for ($i=0;$i<2000;$i++){
        echo renderRandomSquare();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>