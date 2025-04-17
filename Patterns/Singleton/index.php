<?php
namespace Patterns\Singleton;
class Db
{
    static protected array $drivers = [];
    static protected PDO|null $connection = null;

    static public function connect($driver = 'pdo'): PDO
    {
        if (empty(self::$drivers[$driver])) {
            self::$drivers[$driver] = new PDO("mysql:host=localhost;dbname=meest", "root", "");
        }

        return self::$drivers[$driver];
    }
}

Db::connect('pdo');
Db::connect('mongo');