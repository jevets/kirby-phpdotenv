<?php 

namespace Jevets\Kirby\Dotenv;

use Dotenv\Dotenv as PHPDotenv;

class Dotenv
{
    public function __construct($path = __DIR__ . DS . '..' . DS, $file = '.env')
    {
        $dotenv new PHPDotenv($path, $file);
        $dotenv->load();
    }
}