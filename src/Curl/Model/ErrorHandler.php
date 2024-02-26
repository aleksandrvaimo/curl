<?php

namespace Curl\Model;

use Curl\Api\ErrorHandlerInterface;

class ErrorHandler implements ErrorHandlerInterface
{
    private string $message = '';

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
