<?php

namespace ProcessStreet;

class ProcessStreet {

    private static $apiKey;

    public static $apiBase = 'https://api.process.st';

    const VERSION = '0.1.0';

    /**
     * @return string The API key used in requests.
     */
    public static function getApiKey() {
        return self::$apiKey;
    }

    /**
     * @param string $apiKey The API key to be used in requests.
     */
    public static function setApiKey($apiKey) {
        self::$apiKey = $apiKey;
    }

}