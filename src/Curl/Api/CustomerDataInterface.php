<?php

namespace Curl\Api;

interface CustomerDataInterface
{
    public const TIME_FORMAT = 'Y-m-d H:i:s';
    public const SIGNATURE_CODE = 'credy';
    public const KEY_TIMESTAMP = 'timestamp';
    public const KEY_SIGNATURE = 'signature';

    public const DATA = [
        "first_name" => "Aleksandr",
        "last_name" => "Ivanushkin",
        "email" => "aleksandr.ivanushkin@gmail.com",
        "bio" => "A couple of words about me: loyal, fast learner, hard-working, flexible, adaptable, someone on who you can rely that job will be done on time and i do like puzzles :)",
        "technologies" => [
            "PHP",
            "MySQL",
            "HTML",
            "CSS",
            "Docker",
            "..."
        ],
        "timestamp" => '',
        "signature" => '',
        "vcs_uri" => "https://github.com/aleksandrvaimo/curl"
    ];

    public function getJsonData(): string;
}
