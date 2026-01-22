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

    echo "<br/> Задание №5 <br/>";

    echo "<br/> Задание №6 <br/>";
    
?>