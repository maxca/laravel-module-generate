<?php

namespace Samark\ModuleGenerate\Exceptions;

/**
 * Class InsertException
 * @package Samark\ModuleGenerate\Exceptions
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class InsertException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Fail to create resource';
}
