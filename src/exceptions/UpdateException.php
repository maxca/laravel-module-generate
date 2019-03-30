<?php

namespace Samark\ModuleGenerate\Exceptions;

/**
 * Class UpdateException
 * @package Samark\ModuleGenerate\Exceptions
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class UpdateException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Fail to update resource';
}
