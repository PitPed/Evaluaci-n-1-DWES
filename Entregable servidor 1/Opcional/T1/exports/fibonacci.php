<?php
        $till = isset($_GET["till"])?$_GET["till"]:100;
        function fibonacci($till){
            echo "1, 1";
            return fibonacciTill($till,1,1);
        }
        
        
        
        function fibonacciTill($till,$penultimate,$ultimate){
            $new = $penultimate+$ultimate;
            if ($new > $till) return;
            else{
                echo ", ".$new;
                fibonacciTill($till,$ultimate,$new);
            }
        }

        fibonacci($till);
?>