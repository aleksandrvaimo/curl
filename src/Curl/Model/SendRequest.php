<?php

namespace Curl\Model;

use CurlHandle;
use json_decode;
use Curl\Api\CustomerDataInterface;
use Curl\Api\ErrorHandlerInterface;
use Curl\Api\SendRequestInterface;
use strlen;

class SendRequest implements SendRequestInterface
{
    private ErrorHandlerInterface $errorHandler;
    private CustomerDataInterface $customerData;
    private array $curlResponse = [];

    public function __construct(
        ErrorHandlerInterface $errorHandler,
        CustomerDataInterface $customerData
    ) {
        $this->errorHandler = $errorHandler;
        $this->customerData = $customerData;
    }

    public function sendCurlRequest(): void
    {
        // cURL initialization
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, $this->prepareCurlOptions());

        $this->executeCurl($curl);

        // Close cURL session
        curl_close($curl);
    }

    public function getCurlResponse(): array
    {
        return $this->curlResponse;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorHandler->getMessage();
    }

    private function prepareCurlOptions(): array
    {
        $jsonData = $this->customerData->getJsonData();

        return [
            CURLOPT_URL => self::API_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData)
            ]
        ];
    }

    private function executeCurl(CurlHandle $curl): void
    {
        // Execute cURL request
        $response = curl_exec($curl);
        // Check for errors
        if (curl_errno($curl)) {
            $error = curl_error($curl);
            // Handle error
            $this->errorHandler->setMessage($error);
        }
        $this->curlResponse = json_decode($response, true);
    }
}
