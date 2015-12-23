<?php 

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

        if ($value === false) {
            return $default;
        }

        return $value;
    }
}