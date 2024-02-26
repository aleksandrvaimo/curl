<?php

namespace Curl\Model;

use date;
use DateTime;
use json_encode;
use sha1;
use Curl\Api\CustomerDataInterface;

class CustomerData implements CustomerDataInterface
{
    public function getJsonData(): string
    {
        $timestamp = $this->getTimestamp();
        $customerData = self::DATA;
        $customerData[self::KEY_TIMESTAMP] = $timestamp;
        $customerData[self::KEY_SIGNATURE] = sha1($timestamp . self::SIGNATURE_CODE);

        return json_encode($customerData);
    }

    private function getTimestamp(): int
    {
        $date = date(self::TIME_FORMAT);
        $dateTime = new DateTime($date);

        return $dateTime->getTimestamp();
    }
}
