<?php

namespace Samark\ModuleGenerate\Exceptions;

use Illuminate\Contracts\Support\MessageBag;

/**
 * Class ValidationException
 * @package Samark\ModuleGenerate\Exceptions
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class ValidationException extends \Exception
{
    /**
     * @var array
     */
    private $messages;

    /**
     * ValidationException constructor.
     * @param \Illuminate\Contracts\Support\MessageBag $messageBag
     */
    public function __construct(MessageBag $messageBag)
    {
        $this->messages = $messageBag->toArray();
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->messages;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return 422;
    }
}
