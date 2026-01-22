<?php 
    $age = 25;
    function classifyAge(int $age): string {
        if ($age < 12) {
        return "Ребенок";
        } elseif ($age <= 17){
        return "Подросток";
        } else {
        return "Взрослый";
        }
    }  
    echo classifyAge($age);
?>