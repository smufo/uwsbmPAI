<?php
    function show(){
        echo "<p>Funckja w php</p>";
    }

    function showMessage($msg){
        echo "<p>".$msg."</p>";
    }

    function sum($x, $y){
        return $x + $y;
    }

    function generateList($array){
        echo "<ul>";
        foreach($array as $fruit){
            echo "<li>".$fruit."</li>";
        }
        echo "</ul>";
    }

    function sortArray($array, $order){
        echo "<ul>";
        if ($order == "asc"){
            sort($array);
            foreach($array as $item){
                echo "<li>".$item."</li>";
            }
        } else if ($order == "desc"){
            rsort($array);
            foreach($array as $item){
                echo "<li>".$item."</li>";
            }
        }
        echo "</ul>";
    }
?>