<?php
echo "<br> Задание №1 <br>";
class Person {
    public string $name = '';
    public int $age = 0;
}

echo "<br> Задания №2 <br>";
class Product {
    public string $title;
    protected int $stock = 0;
    private float $price = 0.0;
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function getPrice(): float {
        return $this->price;
    }
}

echo "<br> Задание №3 <br>";
class Greeter {
    private string $greeting;
    public function __construct(string $greeting) {
        $this->greeting = $greeting;
    }
    public function greet(string $name): string {
        return "{$this->greeting}, {$name}!";
    }
}

echo "<br> Задание №4 <br>";
class Book {
    public function __construct(
        private string $title,
        private string $author,
        private int $year
    ) {}
    
    public function getInfo(): string {
        return "«{$this->title}» ({$this->author}, {$this->year})";
    }
}
$booksData = [
    ['title' => '1984', 'author' => 'Джордж Оруэлл', 'year' => 1949],
    ['title' => 'Мастер и Маргарита', 'author' => 'Михаил Булгаков', 'year' => 1967],
    ['title' => 'Преступление и наказание', 'author' => 'Фёдор Достоевский', 'year' => 1866],
    ['title' => 'Гарри Поттер и философский камень', 'author' => 'Джоан Роулинг', 'year' => 1997],
    ['title' => 'Маленький принц', 'author' => 'Антуан де Сент-Экзюпери', 'year' => 1943]
];
$books = [];
foreach ($booksData as $bookData) {
    $books[] = new Book(
        $bookData['title'],
        $bookData['author'],
        $bookData['year']
    );
}

echo "<br> Задание №5 <br>";
class BankAccount {
    private float $balance = 0.0;
    public function deposit(float $amount): void {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Счёт пополнен на {$amount} ₽\n";
        } else {
            echo "Ошибка: сумма для пополнения должна быть положительной\n";
        }
    }
    public function withdraw(float $amount): bool {
        if ($amount <= 0) {
            echo "Ошибка: сумма для снятия должна быть положительной\n";
            return false;
        }
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Со счёта снято {$amount} ₽\n";
            return true;
        } else {
            echo "Ошибка: недостаточно средств на счёте\n";
            return false;
        }
    }
    public function getBalance(): float {
        return $this->balance;
    }
}

echo "<br>Задание №6<br>";
class ShopProduct {
    public function __construct(
        private string $title,
        private string $producer,
        private float $price
    ) {}
    
    public function getSummaryLine(): string {
        return "{$this->title} ({$this->producer}) — {$this->price} ₽";
    }
}
    $book1 = new ShopProduct("1984","Дж.Оруэл", 599.99);
    $book2 = new ShopProduct("Будущее","Д.Глуховский", 312.66);

    echo $book1->getSummaryLine() . "<br>";
    echo $book2->getSummaryLine();

echo "<br>Задание №7<br>";
class Counter {
    private static int $count = 0;
    public function __construct() {
        self::$count++;
        echo "Создан объект. Всего объектов: " . self::$count . "<br>";
    }
    public static function getCount(): int {
        return self::$count;
    }
    public function showCurrentCount(): void {
        echo "Текущий счетчик из метода объекта: " . self::$count . "<br>";
    }
}
    $counter1 = new Counter();
    $counter2 = new Counter();
    $counter3 = new Counter();
        echo "Всего создано объектов (через статический метод): " . Counter::getCount() . "<br>";
    $counter1->showCurrentCount();
    $counter2->showCurrentCount();
        echo "Проверка через counter1::getCount(): " . Counter::getCount() . "<br>";
        echo "Проверка через counter2::getCount(): " . Counter::getCount() . "<br>";
    $counter4 = new Counter();  
        echo "Финальное значение счетчика: " . Counter::getCount() . "<br>";

echo "<br>Задание №8<br>";
class User {
    public function __construct(
        private string $email,
        private string $name,
        private ?\DateTimeImmutable $createdAt = null
    ) {
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTimeImmutable();
        }
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    public function getInfo(): string {
        $formattedDate = $this->createdAt->format('Y-m-d');
        return "{$this->name} ({$this->email}), зарегистрирован: {$formattedDate}";
    }
}
?>