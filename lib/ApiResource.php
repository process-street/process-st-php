<?php

namespace ProcessStreet;

use ProcessStreet\Util\Encase;

class ApiResource extends ProcessStreetObject {

    public static function baseUrl() {
        return ProcessStreet::$apiBase;
    }

    protected static function _create($params = null, $options = null) {

        self::_validateParams($params);
        $base = static::baseUrl();
        $url = static::classUrl();

        // TODO Create on Process Street

    }

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl() {
        $class = get_called_class();
        if ($postfixNamespaces = strrchr($class, '\\')) {
            $class = substr($postfixNamespaces, 1);
        }
        $base = Encase::toLowerKebab($class);
        return "/1/${base}s";
    }

    private static function _validateParams($params = null) {
        if ($params && !is_array($params)) {
            $message = 'You must pass an array as the first argument to the Process Street API';
            throw new Error\Api($message);
        }
    }

}