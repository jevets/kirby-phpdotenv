<?php 

use \str as String;

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = '')
    {
        $value = getenv($key);

        if (!!!$value) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        if (strlen($value) > 1 && String::startsWith($value, '"') && String::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}