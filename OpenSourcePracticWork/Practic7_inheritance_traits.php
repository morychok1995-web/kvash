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
trait PriceUtilities {
    public function calculateTax(float $price): float {
        return $price * 0.2;
    }
}
class ShopProduct {
    use PriceUtilities;
    public function __construct(
        private string $title,
        private float $price
    ) {}
    public function getPrice(): float {
        return $this->price;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getPriceWithTax(): float {
        $tax = $this->calculateTax($this->price);
        return $this->price + $tax;
    }
    public function getProductInfo(): string {
        $priceWithTax = $this->getPriceWithTax();
        return "Товар: {$this->title}, Цена без налога: {$this->price} ₽, Цена с налогом: {$priceWithTax} ₽";
    }
}
echo "Задание №6 <br/>"
trait PriceUtilities {
    public function calculateTax(float $price): float {
        return $price * 0.2;
    }
}
trait IdentityTrait {
    public function generateId(): string {
        return uniqid();
    }
}
class ShopProduct {
    use PriceUtilities, IdentityTrait;
    private string $id;
    public function __construct(
        private string $title,
        private float $price
    ) {
        $this->id = $this->generateId();
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getId(): string {
        return $this->id;
    }
    public function getPriceWithTax(): float {
        return $this->price + $this->calculateTax($this->price);
    }
    public function getProductInfo(): string {
        $priceWithTax = $this->getPriceWithTax();
        return "ID: {$this->id}, Товар: {$this->title}, Цена с налогом: {$priceWithTax} ₽";
    }
}
echo "Задание №7 <br/>"
trait Printer {
    public function output(): void {
        echo "[Printer] Печать документа...<br>";
    }
    
    public function printPreview(): void {
        echo "[Printer] Предпросмотр документа...<br>";
    }
}
trait Logger {
    public function output(): void {
        echo "[Logger] Логирование операции...<br>";
    }
    
    public function logError(string $message): void {
        echo "[Logger] Ошибка: {$message}<br>";
    }
}
class Report {
    use Printer, Logger {
        Logger::output insteadof Printer;
        Printer::output as print;
        Logger::output as log;
    }
    private string $title;
    public function __construct(string $title) {
        $this->title = $title;
    }
    public function generate(): void {
        echo "Генерация отчета: {$this->title}<br>";
        $this->output();
        $this->print();
        $this->printPreview();
        $this->logError("Тестовая ошибка");
    }
    public function generateAndLog(): void {
        echo "<strong>Полный процесс генерации отчета:</strong><br>";
        $this->generate();
        $this->log();
    }
}
echo "Задание №8 <br/>"
trait Describable {
    public function describe(): string {
        return "Объект: {$this->name}";
    }
    public function describeWithDetails(): string {
        $description = "Объект: {$this->name}";
        if (method_exists($this, 'getType')) {
            $description .= ", Тип: {$this->getType()}";
        }
        if (property_exists($this, 'id')) {
            $description .= ", ID: {$this->id}";
        }
        return $description;
    }
}
class Item {
    use Describable;
    public function __construct(
        public string $name,
        private string $type = 'item',
        private ?int $id = null
    ) {}
    public function getType(): string {
        return $this->type;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getInfo(): string {
        return $this->describeWithDetails();
    }
}
class Product {
    use Describable;
    public function __construct(
        public string $name,
        public float $price
    ) {}
    public function getPriceInfo(): string {
        return "Цена: {$this->price} ₽";
    }
    public function getFullDescription(): string {
        return $this->describe() . ", " . $this->getPriceInfo();
    }
}
class SimpleObject {
    use Describable;
    
    public string $name = "Простой объект";
}

echo "Задание №9 <br/>"
trait Validatable {
    abstract public function getRules(): array;
    
    public function validate(): bool {
        return true;
    }
}
class UserForm {
    use Validatable;
    
    public function getRules(): array {
        return [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|min:8'
        ];
    }
}

echo "Задание №10 <br/>"
interface HasMedia {
    public function getMediaLength(): int;
}
trait TaxCalculation {
    public function getTax(): float {
        return $this->price * 0.2;
    }
}
class BookProduct implements HasMedia {
    use TaxCalculation;
    public function __construct(
        private string $title,
        private float $price
    ) {} 
    public function getMediaLength(): int {
        return 300;
    }
}
class CDProduct implements HasMedia {
    use TaxCalculation;
    public function __construct(
        private string $title,
        private float $price
    ) {}
    public function getMediaLength(): int {
        return 74;
    }
}

echo "Задание №11 <br/>"
abstract class Service {
    abstract public function getDuration(): int;
    abstract public function getDescription(): string;
}
interface Schedulable {
    public function schedule(): string;
}
trait Logger {
    public function log(string $msg): void {
        echo $msg . "<br>";
    }
}
class Consulting extends Service implements Schedulable {
    use Logger;   
    public function getDuration(): int {
        return 60;
    }   
    public function getDescription(): string {
        return "Консультация специалиста";
    }  
    public function schedule(): string {
        return "Консультация запланирована";
    }
}
class Training extends Service implements Schedulable {
    use Logger;   
    public function getDuration(): int {
        return 180;
    }   
    public function getDescription(): string {
        return "Обучающий тренинг";
    }
    public function schedule(): string {
        return "Тренинг запланирован";
    }
}
?>