<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/Patterns/FabricMethod/index.php';
echo "<br>";

$dsn = 'mysql:host=database;database=php_advanced';

try {
    $pdo = new PDO($dsn, 'root', 'secret');
//    dd($pdo);
} catch (PDOException $e) {
//    dd($e);
}


use App\Controllers\Api\UsersController;
use MyLib\LibraryClass;

$controller = new UsersController();
$lib = new LibraryClass();

sayHello();

// создание класса в php8.0
/*class Human
{

}

class Student extends Human
{
    public function __construct(
        public string $name,
        public int    $groupId,
        public string $type
    )
    {

    }

}

$student = new Student('Oleg', 15, 'PHP');

echo $student->name;*/


// статический метод: обращение к свойствам класса не создавая объектов
/*class DB
{
    static protected PDO|null $pdo;
    static public string $test = "test";

    static public function getInstance(): PDO|null
    {
        if (is_null( self::$pdo) ) {
            self::$pdo = new PDO("", "", "");
        }
        return self::$pdo;
    }
}

echo DB::$test;*/


//
class ShopProduct implements Chargeable// отвечает за хранение данных
{
    // свойства
    public function __construct(
        public string   $title,
        public string   $producerMainName = "",
        public string   $producerFirstName = "",
        protected float $price,
        public float    $discount = 0,
    )
    {
    }

// Методы класса
    public function getProducer(): string
    {
        return $this->producerMainName . "  " . $this->producerFirstName;
    }

    public function getSummaryLine(): string
    {
        $base = "{$this->title}({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName}  )";
        return $base;
    }

    public function setDiscount(int $num): void
    {
        $this->discount = $num;
    }

    public function getPrice(): int|float
    {
        return $this->price - $this->discount;
    }
}

class CDProduct extends ShopProduct // отвечает за хранение данных
{
// Методы
    public float $playLength;

    public function __construct(
        public string $title,
        public string $producerMainName = "",
        public string $producerFirstName = "",
        public float  $price = 0,

    )
    {
        parent::__construct($title, $producerMainName, $producerFirstName, $price);
        $playLength = 0;
        $this->playLength = $playLength;
    }

    public function getPlayLength(): float
    {
        return $this->playLength;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": Время звучания - {$this->playLength}";
        return $base;
    }

    public
    function getProducer(): string
    {
        return $this->producerMainName . "  " . $this->producerFirstName;
    }
}

class BookProduct extends ShopProduct // отвечает за хранение данных
{
// Методы класса
    public int $numPages;

    public function __construct(
        public string $title,
        public string $producerMainName = "",
        public string $producerFirstName = "",
        public float  $price = 0,
    )
    {
        parent::__construct($title, $producerMainName, $producerFirstName, $price);
        $numPages = 0;
        $this->numPages = $numPages;
    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    public
    function getProducer(): string
    {
        return $this->producerMainName . "  " . $this->producerFirstName;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": {$this->numPages} стр.";
        return $base;
    }

    public function getPrice(): int|float
    {
        return $this->price;
    }

    use PriceUtilities;
}

// Принцип разделения ответственности
class ShopProductWriter // отвечает за вывод данных
{
    private array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    public function write(): void
    {
        $str = "";
        foreach ($this->products as $shopProduct) {
            $str = $shopProduct->title . ": "
                . $shopProduct->getProducer()
                . " {" . $shopProduct->price . "} \n";
        }
        print $str;
    }
}

interface Chargeable
{
    public function getPrice(): int|float;
}

trait PriceUtilities
{
    // налог с продаж
    private int $taxrate = 20;
    public function calculateTax(float $price): float
    {
        return (($this->taxrate /100) * $price);
    }
}

/*$product = new ShopProduct(
    title: "Собачье сердце",
    producerFirstName: "Михаил",
    price: 5.99);*/
$product = new ShopProduct(
    "Собачье сердце",
    "Михаил",
    "Булгаков",
    5.99
);

$product2 = new CDProduct(
    "Классическая музыка. Лучшее",
    "Антонио",
    "Вивальди",
    60,
    0,
    10.99
);

$writer = new ShopProductWriter();
$writer->write($product);

echo "<pre>";
var_dump($product);
echo "<br>";


echo "<br>";
print "Автор: " . $product->getProducer() . "\n";
print "Автор: " . $product2->getProducer() . "\n";


//
echo "<br>";






echo "Статические методы:";
echo "<br>";
// Статические методы и свойства
class StaticExample
{
    public static int $aNum = 0;

    public static function sayHello(): void
    {
        self::$aNum++;
        echo "Hello world! {" . self::$aNum . "}\n";
    }
}

print StaticExample::$aNum;
echo "<br>";
StaticExample::sayHello();


