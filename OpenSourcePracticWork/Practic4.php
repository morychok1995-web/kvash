<?php
function generateEmailTemplate(string $name, string $product): string {
    $safeName = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $safeProduct = htmlspecialchars($product, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $htmlTemplate = <<<HTML
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Специальное предложение для {$safeName}</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            line-height: 1.6; 
            color: #333; 
            margin: 0; 
            padding: 0; 
            background-color: #f4f4f4;
        }
        .email-container { 
            max-width: 600px; 
            margin: 20px auto; 
            background-color: #ffffff; 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; 
            padding: 30px 20px; 
            text-align: center;
        }
        .header h1 { 
            margin: 0; 
            font-size: 28px; 
            font-weight: 600;
        }
        .content { 
            padding: 40px 30px;
        }
        .greeting { 
            font-size: 20px; 
            margin-bottom: 25px; 
            color: #2c3e50;
        }
        .product-highlight { 
            background-color: #f8f9fa; 
            border-left: 4px solid #667eea; 
            padding: 20px; 
            margin: 25px 0; 
            border-radius: 0 8px 8px 0;
        }
        .product-name { 
            color: #667eea; 
            font-weight: 700; 
            font-size: 22px;
        }
        .cta-button { 
            display: inline-block; 
            padding: 15px 35px; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; 
            text-decoration: none; 
            border-radius: 50px; 
            font-weight: 600; 
            font-size: 16px; 
            margin: 30px 0; 
            text-align: center; 
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .cta-button:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        .features { 
            margin: 30px 0; 
            padding-left: 20px;
        }
        .features li { 
            margin-bottom: 12px; 
            padding-left: 10px;
        }
        .footer { 
            background-color: #f8f9fa; 
            padding: 25px; 
            text-align: center; 
            color: #6c757d; 
            font-size: 14px; 
            border-top: 1px solid #e9ecef;
        }
        .footer a { 
            color: #667eea; 
            text-decoration: none;
        }
        .footer a:hover { 
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Эксклюзивное Предложение</h1>
            <p>Только для избранных клиентов</p>
        </div>
        
        <div class="content">
            <div class="greeting">
                <strong>Добрый день, {$safeName}!</strong>
            </div>
            
            <p>Мы ценим Ваше доверие и подготовили специальное предложение, доступное ограниченное время.</p>
            
            <div class="product-highlight">
                <h2>Специально для Вас:</h2>
                <div class="product-name">{$safeProduct}</div>
                <p>Этот продукт идеально подходит для Ваших потребностей!</p>
            </div>
            
            <h3>Ваши преимущества:</h3>
            <ul class="features">
                <li><strong>Скидка 25%</strong> — эксклюзивно для Вас</li>
                <li><strong>Бесплатная доставка</strong> по всей стране</li>
                <li><strong>Гарантия 2 года</strong> — уверенность в качестве</li>
                <li><strong>Приоритетная поддержка</strong> 24/7</li>
            </ul>
            
            <div style="text-align: center;">
                <a href="https://example.com/offer/{$safeProduct}/{$safeName}" class="cta-button">
                    Получить предложение
                </a>
            </div>
            
            <p>Если у Вас возникли вопросы, наша команда поддержки всегда готова помочь!</p>
            
            <p>С уважением,<br>
            <strong>Команда ExampleStore</strong></p>
        </div>
        
        <div class="footer">
            <p>© 2024 ExampleStore. Все права защищены.</p>
            <p>
                <a href="https://example.com/unsubscribe/{$safeName}">Отписаться от рассылки</a> | 
                <a href="https://example.com/preferences">Настройки подписки</a>
            </p>
        </div>
    </div>
</body>
</html>
HTML;
    
    return $htmlTemplate;
}

function showTemplateExample(): string {
    $codeExample = <<<'NOWDOC'
    <?php
    $template = <<<'TEMPLATE'
    <!DOCTYPE html>
    <html>
    <head>
        <title>Шаблон письма</title>
    </head>
    <body>
        <h1>Здравствуйте, {$clientName}!</h1>
        
        <p>Для Вас специальное предложение на товар: 
        <strong>{$productName}</strong>
        </p>
    </body>
    </html>
    ?>
    NOWDOC;
    return $codeExample;
}
function validateInput(string $name, string $product): bool {
    if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ\s]{2,50}$/u', $name)) {
        return false;
    }
    if (mb_strlen($product) < 2 || mb_strlen($product) > 100) {
        return false;
    }
    return true;
}

echo "<h1>Демонстрация работы с Heredoc и Nowdoc</h1>";

echo "<h2>1. Валидация входных данных:</h2>";

$testName = "Анна Петрова";
$testProduct = "Смартфон Samsung Galaxy S24 Ultra";

if (validateInput($testName, $testProduct)) {
    echo "<p style='color: green;'>✓ Данные прошли валидацию</p>";
    echo "<p><strong>Имя:</strong> " . htmlspecialchars($testName) . "</p>";
    echo "<p><strong>Товар:</strong> " . htmlspecialchars($testProduct) . "</p>";
} else {
    echo "<p style='color: red;'>✗ Ошибка валидации данных</p>";
}
echo "<hr><h2>2. Генерация HTML-шаблона (heredoc с интерполяцией):</h2>";
$emailHTML = generateEmailTemplate($testName, $testProduct);
echo "<div style='border: 2px solid #4CAF50; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h3>HTML-шаблон (первые 1000 символов):</h3>";
echo "<textarea style='width: 100%; height: 300px; font-family: monospace;'>";
echo htmlspecialchars(substr($emailHTML, 0, 1000)) . "...";
echo "</textarea>";
echo "</div>";
echo "<h3>Визуализация письма:</h3>";
echo "<iframe srcdoc='" . htmlspecialchars($emailHTML) . "' width='100%' height='600' style='border: 1px solid #ccc;'></iframe>";
echo "<hr><h2>3. Пример использования Nowdoc (без интерполяции):</h2>";
$nowdocExample = showTemplateExample();
echo "<div style='background-color: #f8f9fa; padding: 20px; border-radius: 5px; border-left: 4px solid #2196F3;'>";
echo "<h3>Пример кода с nowdoc:</h3>";
echo "<pre style='background-color: #282c34; color: #abb2bf; padding: 20px; border-radius: 5px; overflow-x: auto;'>";
echo htmlspecialchars($nowdocExample);
echo "</pre>";
echo "</div>";

echo "<br> Задание №2 <br>";
$str = "Привет 👋 и пока ✨";
function getFirstAndLastChar(string $str): array {
    if (mb_strlen($str) === 0) {
        return ['first' => '', 'last' => ''];
    }
    $firstChar = mb_substr($str, 0, 1);
    $lastChar = mb_substr($str, -1, 1);
    return [
        'first' => $firstChar,
        'last' => $lastChar
    ];
}
print_r(getFirstAndLastChar($str)) ;

echo "<br> Задание №3 <br>";
$firstName = "Сергей ";
$lastName = " Квашнин ";
function buildFullName(string $firstName, string $lastName): string {
    $cleanFirst = trim($firstName);
    $cleanLast = trim($lastName);
    return $cleanFirst . " " . $cleanLast;
}
$result = buildFullName($firstName, $lastName);
echo $result . "<br>";

echo "<br> Задание №4 <br>";
$phrase = "Очень обильный материал, из-за задержки на установку сервера очень тяжело так быстро выполнять практические. Если бы нейронка не генерировала html письмо, я бы кукукнулся!";
function toTitleCase(string $phrase): string {
    $words = explode(' ', $phrase);
    $titleWords = [];
    foreach ($words as $word) {
        if (mb_strlen($word) === 0) {
            $titleWords[] = '';
            continue;
        }
        $firstChar = mb_substr($word, 0, 1);
        $restOfWord = mb_substr($word, 1);
        $firstCharUpper = mb_strtoupper($firstChar);
        $titleWords[] = $firstCharUpper . $restOfWord;
    }
    return implode(' ', $titleWords);
}
echo toTitleCase($phrase);

echo "<br> Задание №5 <br>";
$path = "/var/www/index.php";
function extractFileName(string $path): string {
    $lastSlashPos = strrpos($path, '/');
    $lastBackslashPos = strrpos($path, '\\');
    $lastSeparatorPos = max($lastSlashPos, $lastBackslashPos);
    if ($lastSeparatorPos === false) {
        return $path;
    }
    $fileName = substr($path, $lastSeparatorPos + 1);
    return $fileName;
}
echo extractFileName($path) . "<br>";

echo "<br> Задание №6 <br>";
$tags = ["php", "regex", "web"];
function tagListToCSV(array $tags): string {
    $cleanTags = array_map('trim', $tags);
    return implode(', ', $cleanTags);
}
$csv = "php, regex, web";
function csvToTagList(string $csv): array {
    $tags = explode(',', $csv);
    $cleanTags = [];
    foreach ($tags as $tag) {
        $cleanTag = trim($tag);
        if ($cleanTag !== '') {
            $cleanTags[] = $cleanTag;
        }
    }
    return $cleanTags;
}
echo tagListToCSV($tags) . "<br>";
print_r(csvToTagList($csv));

echo "<br> Задание №7 <br>";
$Input = "Целых 11 заданий в 3 практической работе???";
function safeEcho(string $Input): string {
    return htmlspecialchars($Input, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
echo safeEcho($Input) . "<br>";

echo "<br> Задание №8 <br>";
$query = "google";
function buildSearchUrl(string $query): string {
    $baseUrl = 'https://example.com/search';
    $encodedQuery = rawurlencode($query);
    return $baseUrl . '?q=' . $encodedQuery;
}
echo buildSearchUrl($query) . "<br>";

echo "<br> Задание №9 <br>";
$pass = "!FastPassword1";
function validatePassword(string $pass): bool {
    $pattern = '/^(?=.*[A-Z])(?=.*\d).{8,}$/';
    return preg_match($pattern, $pass) === 1;
}
$Valid = validatePassword($pass);
if ($Valid) {
    $validPass = "true";
} else {
    $validPass = "false";
}
echo $validPass . "<br>";

echo "<br> Задание №10 <br>";
$text = "Привет! Мой email: test.user123@example.com. Для связи: support@domain.co.uk. Пишите также на backup-mail@server.org. Удачи!";
function extractEmails(string $text): array {
    $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/i';
    preg_match_all($pattern, $text, $matches);
    return $matches[0];
}
print_r(extractEmails($text));

echo "<br> Задание №11 <br>";
$text = "Сумма: 25.5 рублей. Куплено 7 кг. Цена 10.99 за штуку. Итог: 3 товара.";
function highlightNumbers(string $text): string {
    $pattern = '/\b\d+(?:\.\d+)?\b/u';
    $replacement = '<span class="number"><b>$0</b></span>';
    return preg_replace($pattern, $replacement, $text);
}
$result = highlightNumbers($text);
echo $result;
?>