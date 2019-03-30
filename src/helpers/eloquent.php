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