<?php
require "./_php_exports/cookiesCheck.php";

/*checkUser();*/
/*checkRoom();*/
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicTacToe</title>
    <style>
        #board {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*
            background-color: black;
            width: 100%;*/
            max-height: 100%;
            grid-area: board;

            aspect-ratio: 1/1;

            display: grid;
            grid-template-columns: auto auto auto;
            column-gap: 2%;
            row-gap: 2%;
        }

        #board>button {
            font-family: Arial, Helvetica, sans-serif;
            font-size: xx-large;
            font-weight: 1000;
            border-radius: 0;
            background-color: white;
        }


        #board>button:enabled:hover {
            background-color: #EEEEEE;
        }

        #endRectangle {
            width: 500px;
            height: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: whitesmoke;
            border: 2px solid black;
            border-radius: 5px;
        }

        .user_rectangle {
            width: 100%;
            height: 100%;

            max-width: 400px;
            max-height: 100px;

            border-radius: 10px;
            background-color: #DDDDDD;
            display: grid;
            grid-template-columns: 30% auto;
            align-items: center;
        }

        .host {
            left: 20px;
            grid-area: host;
        }

        .guest {
            right: 20px;
            grid-area: guest;
        }

        .username {
            background-color: rgba(255, 255, 255, 1);
            width: 250px;
            height: 35px;
            grid-column: 2;
            border-radius: 10px;
            text-align: center;
        }

        .profile {
            grid-column: 1;
            border-radius: 10px;
            width: 80px;
            height: 80px;
        }


        body {
            display: grid;
            grid-template:
                "host .  guest" 120px
                ". board ." 80vh / 400px auto 400px
            ;
            max-width: 100vw;
            max-height: 100vh;
            margin: 10px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div id="board">

    </div>
    <script src="./_js_exports/main.js"></script>
</body>

</html>