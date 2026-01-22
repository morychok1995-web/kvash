<?php 
    echo "Задание №1 <br/>";
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
    echo classifyAge($age) . "<br/>";
    
    echo "<br/> Задание №2 <br/>";
    $city = ["Челябинск", "Екатеринбург", "Чита", "Учалы", "Тамбов"];
    foreach ($city as $city) {
        $city = htmlspecialchars($city, ENT_QUOTES); 
        echo $city . "</br>";
    }

    echo "<br/> Задание №3 <br/>";
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz" . "," . "<br/>";
        } elseif ( $i % 3 == 0) {
            echo "Fizz" . ",";
        } elseif ($i % 5 == 0) {
            echo "Buzz" . "<br/>";
        } else {
            echo $i . ",";
        }
    }

    echo "<br/> Задание №4 <br/>";
    $celsius = 100;
    function convertCelsiusToFahrenheit(float $celsius): float {
        $fahrenheit = ($celsius * 9/5) + 32;
        return $fahrenheit;
    }
    echo convertCelsiusToFahrenheit($celsius) . "<br/>";

    echo "<br/> Задание №5 <br/>";
    $id = "guest";
    function getUserName(int|string $id): string|false {
        if ($id === intval($id) && $id = 1) {
            return "Администратор";
        }
        elseif ($id === strval($id) && $id == "guest") {
            return "Гость";
        }
        else {
            return "false";
        }
        return $id;
    }
    echo getUserName($id) . "<br/>";

    echo "<br/> Задание №6 <br/>";
    $age = 11;
    $result = match(true) {
        $age < 12 => 'Ребенок',
        $age <= 17 => 'Подросток',
        default => 'Взрослый'
    };
    echo $result . "<br/>";
?>