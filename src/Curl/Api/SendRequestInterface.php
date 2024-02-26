<?php

namespace Curl\Api;

interface SendRequestInterface
{
    public const API_URL = 'https://cv.microservices.credy.com/v1/';
    public const CURL_CONTENT_TYPE = 'Content-Type: application/json';
    public const CURL_CONTENT_LENGTH = 'Content-Length: ';

    public function sendCurlRequest(): void;

    public function getCurlResponse(): array;

    public function getErrorMessage(): ?string;
}
