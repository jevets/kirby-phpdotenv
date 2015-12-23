<?php 

namespace Jevets\Kirby\Dotenv;

use Dotenv\Dotenv as PHPDotenv;

class Dotenv
{
    /**
     * Instantiate dotenv
     *
     * @param string $path
     * @param string $file
     * @return void
     */
    public function __construct($path, $file = '.env')
    {
        (new PHPDotenv($path, $file))
            ->load();
    }
}