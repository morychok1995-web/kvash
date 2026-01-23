<?php
echo "Задание №1 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943]
];
function getBookTitles(array $books): array
{
    $titles = [];    
    foreach ($books as $book) {
        $titles[] = $book['title'];
    }    
    return $titles;
}
$bookTitles = getBookTitles($books);
print_r($bookTitles);

echo "<br>Задание №2 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943]
];
$author = "Михаил булгаков";

function hasBookByAuthor(array $books, string $author): bool
{
    foreach ($books as $book) {
        if (isset($book['author']) && strcasecmp($book['author'], $author) === 0) {
            return true;
        }
    }
    return false;
}
echo hasBookByAuthor($books, $author) ? 'True' : 'False';

echo "<br>Задание №3 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943],
    ['title' => 'Сто лет одиночества', 'author' => 'Габриэль Гарсиа Маркес'],
    ['title' => 'Три товарища', 'author' => 'Эрих Мария Ремарк'],
    ['title' => 'Властелин колец', 'author' => 'Джон Р. Р. Толкин']
];

function addDefaultYear(array $books, int $defaultYear = 2025): array {
    $result = $books;
    foreach ($result as &$book) {
        if (!isset($book['year'])) {
            $book['year'] = $defaultYear;
        }
    }
    return $result;
}
$updatedBooks = addDefaultYear($books);
print_r($updatedBooks);

echo "<br>Задание №4 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943],
    ['title' => 'Сто лет одиночества', 'author' => 'Габриэль Гарсиа Маркес', 'year' => 2025],
    ['title' => 'Три товарища', 'author' => 'Эрих Мария Ремарк', 'year' => 2025],
    ['title' => 'Властелин колец', 'author' => 'Джон Р. Р. Толкин', 'year' => 2025]
];
$minYear = 2000;
function filterBooksByYear(array $books, int $minYear): array
{
    $filteredBooks = [];
    foreach ($books as $book) {
        if (isset($book['year']) && $book['year'] > $minYear) {
            $filteredBooks[] = $book;
        }
    }
    return $filteredBooks;
}
$YearBooks = filterBooksByYear($books, $minYear);
echo "Книги, изданные после $minYear года:<br>";
print_r($YearBooks);

echo "<br>Задание №5 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943],
    ['title' => 'Сто лет одиночества', 'author' => 'Габриэль Гарсиа Маркес', 'year' => 2025],
    ['title' => 'Три товарища', 'author' => 'Эрих Мария Ремарк', 'year' => 2025],
    ['title' => 'Властелин колец', 'author' => 'Джон Р. Р. Толкин', 'year' => 2025],
    ['title' => 'Будущее', 'author' => 'Дмитрий Глуховский']
];
function mapBooksToPairs(array $books): array
{
    $result = [];
    foreach ($books as $book) {
        $year = isset($book['year']) ? $book['year'] : 'неизвестен';
        $result[] = "{$book['title']} ({$book['author']}, {$year})";
    }
    return $result;
}
$mapBooks = mapBooksToPairs($books);
print_r($mapBooks);

echo "<br>Задание №6 <br>";
$books = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943],
    ['title' => 'Сто лет одиночества', 'author' => 'Габриэль Гарсиа Маркес', 'year' => 2025],
    ['title' => 'Три товарища', 'author' => 'Эрих Мария Ремарк', 'year' => 2025],
    ['title' => 'Властелин колец', 'author' => 'Джон Р. Р. Толкин', 'year' => 2025],
    ['title' => 'Будущее', 'author' => 'Дмитрий Глуховский', 'year' => 2001]
];
function sortBooks(array $books): array {
    $sortedBooks = $books;
    usort($sortedBooks, function($a, $b) {
        $yearA = $a['year'] ?? PHP_INT_MAX;
        $yearB = $b['year'] ?? PHP_INT_MAX;
        if ($yearA !== $yearB) {
            return $yearA <=> $yearB;
        }
        $titleA = $a['title'] ?? '';
        $titleB = $b['title'] ?? '';
        return strcmp($titleA, $titleB);
    });
    return $sortedBooks;
}
$sortedBook = sortBooks($books);
print_r($sortedBook);

echo "<br>Задание №7 <br>";
$items = [
    [
        'key' => 1,
        'name' => 'Ноутбук Lenovo',
        'category' => 'Электроника',
        'price' => 45000,
        'brand' => 'Lenovo',
        'year' => 2023
    ],
    [
        'key' => 1,
        'name' => 'Смартфон Samsung',
        'category' => 'Электроника',
        'price' => 35000,
        'brand' => 'Samsung',
        'year' => 2024
    ],
    [
        'name' => 'Футболка хлопковая', // пропущен key
        'category' => 'Одежда',
        'price' => 1500,
        'brand' => 'Uniqlo',
        'year' => 2024
    ],
    [
        'key' => 2,
        'name' => 'Джинсы',
        'category' => 'Одежда',
        'price' => 3000,
        'brand' => 'Levi\'s',
        'year' => 2023
    ],
    [
        'name' => 'Книга "PHP для начинающих"', // пропущен key
        'category' => 'Книги',
        'price' => 1200,
        'brand' => 'Питер',
        'year' => 2022
    ],
    [
        'key' => 1,
        'name' => 'Наушники беспроводные',
        'category' => 'Электроника',
        'price' => 5000,
        'brand' => 'Xiaomi',
        'year' => 2024
    ],
    [
        'key' => 2,
        'name' => 'Куртка зимняя',
        'category' => 'Одежда',
        'price' => 2500,
        'brand' => 'Zara',
        'year' => 2024
    ],
    [
        'key' => 1,
        'name' => 'Кофеварка',
        'category' => 'Бытовая техника',
        'price' => 8000,
        'brand' => 'Bosch',
        'year' => 2023
    ],
    [
        'key' => 1,
        'name' => 'Мышь компьютерная',
        'category' => 'Электроника',
        'price' => 1200,
        'brand' => 'Logitech',
        'year' => 2024
    ],
    [
        'key' => 3,
        'name' => 'Роман "Мастер и Маргарита"',
        'category' => 'Книги',
        'price' => 800,
        'brand' => 'АСТ',
        'year' => 2021
    ]
];
function groupBy(array $items, string $key): array {
    $result = [];
    foreach ($items as $item) {
        if (isset($item[$key])) {
            $groupValue = $item[$key];
            if (!isset($result[$groupValue])) {
                $result[$groupValue] = [];
            }
            $result[$groupValue][] = $item;
        }
    }
    return $result;
}
$groupedByKey = groupBy($items, 'key');
print_r($groupedByKey);

echo "<br>Задание №8 <br>";
$items = [
    [
        'key' => 1,
        'name' => 'Ноутбук Lenovo',
        'category' => 'Электроника',
        'price' => 45000,
        'brand' => 'Lenovo',
        'year' => 2023
    ],
    [
        'key' => 1,
        'name' => 'Смартфон Samsung',
        'category' => 'Электроника',
        'price' => 35000,
        'brand' => 'Samsung',
        'year' => 2024
    ],
    [
        'name' => 'Футболка хлопковая', // пропущен key
        'category' => 'Одежда',
        'price' => 1500,
        'brand' => 'Uniqlo',
        'year' => 2024
    ],
    [
        'key' => 2,
        'name' => 'Джинсы',
        'category' => 'Одежда',
        'price' => 3000,
        'brand' => 'Levi\'s',
        'year' => 2023
    ],
    [
        'name' => 'Книга "PHP для начинающих"', // пропущен key
        'category' => 'Книги',
        'price' => 1200,
        'brand' => 'Питер',
        'year' => 2022
    ],
    [
        'key' => 1,
        'name' => 'Наушники беспроводные',
        'category' => 'Электроника',
        'price' => 5000,
        'brand' => 'Xiaomi',
        'year' => 2024
    ],
    [
        'key' => 2,
        'name' => 'Куртка зимняя',
        'category' => 'Одежда',
        'price' => 2500,
        'brand' => 'Zara',
        'year' => 2024
    ],
    [
        'key' => 1,
        'name' => 'Кофеварка',
        'category' => 'Бытовая техника',
        'price' => 8000,
        'brand' => 'Bosch',
        'year' => 2023
    ],
    [
        'key' => 1,
        'name' => 'Мышь компьютерная',
        'category' => 'Электроника',
        'price' => 1200,
        'brand' => 'Logitech',
        'year' => 2024
    ],
    [
        'key' => 3,
        'name' => 'Роман "Мастер и Маргарита"',
        'category' => 'Книги',
        'price' => 800,
        'brand' => 'АСТ',
        'year' => 2021
    ]
];
function groupBy(array $items, string $key): array {
    $result = [];
    foreach ($items as $item) {
        if (isset($item[$key])) {
            $groupValue = $item[$key];
            if (!isset($result[$groupValue])) {
                $result[$groupValue] = [];
            }
            $result[$groupValue][] = $item;
        }
    }
    return $result;
}
$groupedByKey = groupBy($items, 'key');
print_r($groupedByKey);

echo "<br>Задание №9 <br>";
function queueEnqueue(array &$queue, mixed $value): void
    {
        $queue[] = $value;
    }
function queueDequeue(array &$queue): mixed
    {
        if (empty($queue)) {
            return null;
        }
        return array_shift($queue);
    }
$queue = [];
    queueEnqueue($queue, "элемент 1");
    queueEnqueue($queue, "элемент 2");
    queueEnqueue($queue, "лемент 3");
if (queueDequeue($queue) == null) {
    $result = "null";
    echo $result;
}

echo "<br>Задание №10 <br>";
function safeGet(array $array, string|int $key, mixed $default = null): mixed
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return $default;
}
$testArray1 = [
    'name' => 'Алексей',
    'age' => 25,
    'email' => 'alex@example.com',
    'active' => true,
    'score' => null,
    'tags' => ['php', 'js', 'html'],
    0 => 'нулевой элемент',
    5 => 'пятый элемент',
    'address' => [
        'city' => 'Москва',
        'street' => 'Ленина'
    ]
];
$testArray2 = [
    '' => 'пустой ключ',
    0 => 'число ноль',
    '0' => 'строка ноль',
    false => 'false как ключ',
    null => 'null как ключ',
    'empty_string' => '',
    'zero_value' => 0,
    'null_value' => null,
    'false_value' => false
];
$testArray3 = [
    'user' => [
        'profile' => [
            'name' => 'Мария',
            'contacts' => [
                'email' => 'maria@example.com',
                'phone' => null
            ]
        ]
    ],
    'config' => [
        'debug' => true,
        'version' => '1.0'
    ]
];
$testArray4 = [
    10 => 'десять',
    20 => 'двадцать',
    30 => 'тридцать'
];
$testArray5 = [
    'string' => 'Текст',
    'integer' => 100,
    'float' => 3.14,
    'boolean_true' => true,
    'boolean_false' => false,
    'array' => [1, 2, 3],
    'null' => null
];
//Не до конца понял, правильно ли отрабатывает функция.

echo "<br>Задание №11 <br>";
function isAssociative(array $array): bool
{
    foreach ($array as $key => $value) {
        if (!is_int($key)) {
            return true;
        }
    }
    $keys = array_keys($array);
    sort($keys);
    $expectedKeys = range(0, count($array) - 1);
    return $keys !== $expectedKeys;
}
$arrays = [
    'indexed_sequential' => ['яблоко', 'банан', 'апельсин', 'киви'],
    'indexed_from_zero' => [0 => 'красный', 1 => 'зеленый', 2 => 'синий'],
    'associative_string_keys' => [
        'name' => 'Анна',
        'age' => 28,
        'city' => 'Москва',
        'email' => 'anna@example.com'
    ],
    'numeric_not_from_zero' => [1 => 'понедельник', 2 => 'вторник', 3 => 'среда'],
    'gapped_numeric' => [0 => 'январь', 2 => 'февраль', 3 => 'март', 5 => 'апрель'],
    'mixed_keys' => [
        0 => 'элемент 0',
        'name' => 'Иван',
        2 => 'элемент 2',
        'age' => 30,
        4 => 'элемент 4'
    ]
];
foreach ($arrays as $name => $array) {
    if (isAssociative($array) == true) {
        $result = "true";
    } else {
        $result = "false";
    }
    echo "Массив '$name': $result<br>";
}
?>