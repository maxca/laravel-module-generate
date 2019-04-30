<?php
if (!function_exists('scopeExists')) {
    /**
     * @param $class
     * @param $scopeName
     * @return bool
     */
    function scopeExists($class, $scopeName)
    {
        return method_exists($class, 'scope' . ucfirst($scopeName));
    }
}

if (!function_exists('arrayConcat')) {
    /**
     * @param array $values
     * @return string
     */
    function arrayConcat($array = array(), $glue = ',')
    {
        $result = '';
        $count  = 0;
        foreach ($array as $value) {
            $result .= "'$value'";
            if ($count != count($array) - 1) {
                $result .= "$glue";
            }
            $count++;
        }
        return $result;
    }
}