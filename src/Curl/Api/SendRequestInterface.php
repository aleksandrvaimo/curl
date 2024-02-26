<?php

namespace Curl\Api;

interface SendRequestInterface
{
    public const API_URL = 'https://cv.microservices.credy.com/v1/';

    public function sendCurlRequest(): void;

    public function getCurlResponse(): array;

    public function getErrorMessage(): ?string;
}
