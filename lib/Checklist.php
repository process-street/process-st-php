<?php

namespace ProcessStreet;

class Checklist extends ApiResource {

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Checklist The created checklist.
     */
    public static function create($params = null, $opts = null) {
        return self::_create($params, $opts);
    }

}