<?php

namespace ProcessStreet;

class TestCase extends \PHPUnit_Framework_TestCase {

    protected function setUp() {

    }

    protected function createTestChecklist(array $attributes = []) {

        return Checklist::create(
            $attributes + [
                'name' => 'Test Checklist',
            ]
        );

    }

}