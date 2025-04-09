<?php

namespace MyLib;

class LibraryClass
{
    public function __construct()
    {
        var_dump(self::class);
        echo "<br>";
    }
}