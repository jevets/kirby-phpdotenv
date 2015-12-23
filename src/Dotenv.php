<?php 

namespace Jevets\Kirby\Dotenv;

use Dotenv\Dotenv as PHPDotenv;

class Dotenv
{
    public function __construct($path, $file = '.env')
    {
        $dotenv = new PHPDotenv($path, $file);
        $dotenv->load();
    }
}