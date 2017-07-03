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
     * @param boolean $overload
     * @return void
     */
    public function __construct($path, $file = '.env', $overload = false)
    {
      $dotEnv = new PHPDotenv($path, $file);

      if ($overload) {
        $dotEnv->overload();
      } else {
        $dotEnv->load();
      }
    }
}