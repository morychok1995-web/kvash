<?php
echo "Задание №1 <br/>"
class Product {
    protected string $title;
    protected float $price;
    public function __construct(string $title, float $price) {
        $this->title = $title;
        $this->price = $price;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getInfo(): string {
        return "Продукт: {$this->title}, Цена: {$this->price} ₽";
    }
}
class Book extends Product {
    private string $author;
    public function __construct(string $title, float $price, string $author) {
        parent::__construct($title, $price);
        $this->author = $author;
    }
    public function getAuthor(): string {
        return $this->author;
    }
    public function getInfo(): string {
        $parentInfo = parent::getInfo();
        return $parentInfo . ", Автор: {$this->author}";
    }
    public function getBookDescription(): string {
        return "Книга '{$this->title}' авторства {$this->author}. Цена: {$this->getPrice()} ₽";
    }
}

echo "Задание №2 <br/>"

abstract class Lesson {
    abstract public function cost(): int;
    abstract public function chargeType(): string;
    public function getLessonInfo(): string {
        return "Тип оплаты: {$this->chargeType()}, Стоимость: {$this->cost()} ₽";
    }
}
class Lecture extends Lesson {
    public function cost(): int {
        return 2000;
    }
    public function chargeType(): string {
        return "Фиксированная ставка";
    }
    public function getLectureDuration(): string {
        return "Длительность лекции: 90 минут";
    }
}
class Seminar extends Lesson {
    public function cost(): int {
        return 1500;
    }
    public function chargeType(): string {
        return "Почасовая оплата";
    }
    public function getParticipantsInfo(): string {
        return "Максимальное количество участников: 30 человек";
    }
}
class Workshop extends Lesson {
    private int $participantCount;
    public function __construct(int $participantCount = 10) {
        $this->participantCount = $participantCount;
    }
    public function cost(): int {
        return $this->participantCount * 100;
    }
    public function chargeType(): string {
        return "За участника";
    }
}

echo "Задание №3 <br/>"
interface Bookable {
    public function book(): void;
}
interface Chargeable {
    public function calculateFee(): float;
}
class Workshop implements Bookable, Chargeable {
    private string $title;
    private int $duration;
    private bool $isBooked = false;
    private float $hourlyRate = 1500.0;
    
    public function __construct(string $title, int $duration) {
        $this->title = $title;
        $this->duration = $duration;
    }
    public function book(): void {
        if (!$this->isBooked) {
            $this->isBooked = true;
            echo "Мастер-класс '{$this->title}' успешно забронирован!<br>";
        } else {
            echo "Мастер-класс '{$this->title}' уже забронирован!<br>";
        }
    }
    public function calculateFee(): float {
        $baseFee = $this->hourlyRate * $this->duration;
        $totalFee = $baseFee * 1.2;
        
        echo "Расчет стоимости мастер-класса '{$this->title}'...<br>";
        echo "Длительность: {$this->duration} часов<br>";
        echo "Ставка в час: {$this->hourlyRate} ₽<br>";
        echo "Итого с налогом: {$totalFee} ₽<br>";
        
        return $totalFee;
    }
    public function getTitle(): string {
        return $this->title;
    }
    
    public function getStatus(): string {
        return $this->isBooked ? "Забронирован" : "Доступен для бронирования";
    }
    
    public function cancelBooking(): void {
        if ($this->isBooked) {
            $this->isBooked = false;
            echo "Бронь мастер-класса '{$this->title}' отменена.<br>";
        } else {
            echo "Мастер-класс '{$this->title}' не был забронирован.<br>";
        }
    }
}
echo "Задание №4 <br/>"
interface Bookable {
    public function book(): void;
}
class Workshop implements Bookable {
    public function __construct(private string $title) {}
    
    public function book(): void {
        echo "Мастер-класс '{$this->title}' забронирован.<br>";
    }
}
class Consultation implements Bookable {
    public function __construct(private string $consultant) {}
    
    public function book(): void {
        echo "Консультация у '{$this->consultant}' забронирована.<br>";
    }
}
function processBooking(Bookable $item): void {
    $item->book();
}

echo "Задание №5 <br/>"

?>