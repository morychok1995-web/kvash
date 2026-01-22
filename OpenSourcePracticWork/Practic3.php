<?php 
    echo "Задание №1 <br/>";
    $n = 11;
    function isPrime(int $n): bool {
        if ($n <= 1) {
        return false;
        }
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }        
        return true;
        }  
        if (isPrime($n)) {
            echo "true<br/>";
        }
        else {
            echo "false<br/>";
        }
    
    echo "<br/> Задание №2 <br/>";
        $n = 12;
        function fibonacci(int $n): int
            {
                if ($n === 0) {
                    return 0;
                }
                elseif ($n === 1) {
                    return 1;
                } else {
                    return fibonacci($n - 1) + fibonacci($n - 2);
                }                
            }
        echo fibonacci($n) . "<br/>";

    echo "<br/> Задание №3 <br/>";
    $phone = "89194097747";
    function formatPhone(string $phone): string {
        $str_length = strlen($phone);
        if ($str_length == 11) {  
            $phone_arr = str_split($phone,1);
            $phone_arr[0] = "+7";
            $phone_arr[1] = " (" . $phone_arr[1];
            $phone_arr[3] = $phone_arr[3] . ") ";
            $phone_arr[6] = $phone_arr[6] . "-";
            $phone_arr[8] = $phone_arr[8] . "-";
            $phone = implode($phone_arr);
            return $phone;
        }
        else {
            return "Ошибка длины номера";
        }
        return formatPhone($phone);
    }
    echo formatPhone($phone) . "<br/>";

    echo "<br/> Задание №4 <br/>";
    $int_arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $even_arr = array_filter($int_arr, function($num) {
        return $num % 2 == 0;
    });
    echo "Четные числа:<br>";
    print_r($even_arr);
    echo "<br>";


    echo "<br/> Задание №5 <br/>";
    $n = 11;
    function memoizedFactorial(int $n): int {
    if ($n < 0) {
        echo "Факториал определен только для неотрицательных чисел";
    } else {
                static $cache = [];
                if (isset($cache[$n])) {
                    return $cache[$n];
                }
                if ($n == 0 || $n == 1) {
                    $result = 1;
                } else {
                    $result = $n * memoizedFactorial($n - 1);
                }
                $cache[$n] = $result;
            }    
            return $result;
    }
    echo "Факториал $n! = " . memoizedFactorial($n) . "<br>";

    echo "<br/> Задание №6 <br/>";
    function createUser(string $name, string $email, int $age, bool $isActive = true): array {
        return [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'isActive' => $isActive,
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
    $user = createUser(
    isActive: true,// Передается первым, хотя в сигнатуре последний
    name: "Алексей Сидоров", 
    email: "alex@example.com", 
    age: 28
    );
    print_r($user);
    echo "<br>";
    
    echo "<br> Задание №7 <br>";
    function makeCounter(): callable
    {
        $count = 0;        
        return function() use (&$count): int {
            return ++$count;
        };
    }
    // Тестирование
    $counter1 = makeCounter();
    echo $counter1() . "<br>";
    echo $counter1() . "<br>";

    $counter2 = makeCounter();
    echo $counter2() . "<br>";
    echo $counter1() . "<br>";
?>