<?php

if (!function_exists('buttonActive')) {
    /**
     * @param $status
     * @param $message
     * @return string
     */
    function buttonActive($status, $message)
    {
        switch ($status) {
            case 'active' :
                return "'<span class=\"badge badge-success\">$message</span>";
                break;
            case 'inactive' :
                return "'<span class=\"badge badge-danger\">$message</span>";
                break;
        }
    }
}

if (!function_exists('getRulesValue')) {
    /**
     * @param $values
     * @return array
     */
    function getRulesValue($values)
    {
        $item = [];
        foreach (explode(",", $values) as $key => $value) {
            $item[$value] = $value;
        }
        return $item;
    }
}

if (!function_exists('genLabel')) {
    /**
     * @param $label
     * @return mixed
     */
    function genLabel($label)
    {
        return str_replace(
            config(CONFIG_NAME . '.label.search'),
            config(CONFIG_NAME . '.label.replace'),
            $label
        );
    }
}

if (!function_exists('cvCamel')) {
    /**
     * @param $string
     * @return string
     */
    function cvCamel($string)
    {
        return ucfirst(\Illuminate\Support\Str::camel($string));
    }
}

if (!function_exists('cvModuleName')) {
    /**
     * @param string $string
     * @return string
     */
    function cvModuleName($string = '')
    {
        return \Illuminate\Support\Str::ucfirst(str_replace('_', ' ', $string));
    }
}

if (!function_exists('cdn')) {
    /**
     * @param $path
     * @return string
     */
    function cdn($path)
    {
        if (in_array(env('APP_ENV'), config(CONFIG_NAME.'.use_cdn'))) {
            return env('CDN_URL') . $path;
        }
        return asset($path);
    }
}

