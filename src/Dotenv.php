<?php 

namespace Jevets\Kirby\Dotenv;

use Dotenv\Dotenv as PHPDotenv;

class Dotenv
{
    public function __construct($kirby, $path = '', $file = '.env')
    {
        if (!$path)
            $path = $kirby->roots()->site() . DS . '..';

        $dotenv = new PHPDotenv($path, $file);
        
        $dotenv->load();
    }
}