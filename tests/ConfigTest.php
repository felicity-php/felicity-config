<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace tests;

use felicity\config\Config;
use PHPUnit\Framework\TestCase;

/**
 * Class EventManagerTest
 */
class ConfigTest extends TestCase
{
    /**
     * Tests the event manager
     */
    public function testConfig()
    {
        Config::set('testing', 'whatever')
            ->setItem('thing.stuff.test1', 'asdf')
            ->setItem('thing.stuff.test2', 'qwerty')
            ->setItem('thing.stuff.test2', 'new test')
            ->setItem('thing.stuff.test3', [
                'arrayTest' => true,
            ]);

        self::assertNull(Config::get('stuff'));

        self::assertInternalType('array', Config::get('thing.stuff'));

        self::assertEquals(Config::get('thing.stuff.test1'), 'asdf');

        self::assertEquals(Config::get('thing.stuff.test2'), 'new test');

        self::assertEquals(
            [
                'arrayTest' => true,
            ],
            Config::get('thing.stuff.test3')
        );
    }
}
