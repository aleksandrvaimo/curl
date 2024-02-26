<?php

namespace Curl\Api;

interface ErrorHandlerInterface
{
    public function setMessage(string $message): void;
    public function getMessage(): string;
}
