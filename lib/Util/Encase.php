<?php

namespace ProcessStreet\Util;

class Encase {

    private function __construct() {
    }

    public static function separate($str) {
        static $separatorPattern = implode('|', [
            '\\s+', '_', '-',
            '(?<=[A-Z])(?=[A-Z][a-z])',
            '(?<=[^A-Z_-])(?=[A-Z])',
            '(?<=[A-Za-z])(?=[^A-Za-z])'
        ]);
        return preg_split($separatorPattern, $str);
    }

    public static function convert($headTransform, $tailTransform, $sep, $str) {
        $words = static::separate($str);
        if (count($words) === 1) {
            $convertedWords = [$headTransform($words[0])];
        } else {
            $convertedWords = array_merge(
                [$headTransform($words[0])],
                array_map($tailTransform, array_slice($words, 1))
            );
        }
        return implode($sep, $convertedWords);
    }

    private static function toTitleCase($str) {
        if (mb_strlen($str) === 0) return $str;
        return mb_strtoupper(mb_substr($str, 0, 1)) . mb_strtolower(mb_substr($str, 1));
    }

    public static function toLowerKebab($str) {
        return static::convert('mb_strtolower', 'mb_strtolower', '-', $str);
    }

    public static function toUpperKebab($str) {
        return static::convert('mb_strtoupper', 'mb_strtoupper', '-', $str);
    }

}