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