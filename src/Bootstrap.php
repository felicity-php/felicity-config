<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace felicity\config;

/**
 * Class Bootstrap
 */
class Bootstrap
{
    public function run()
    {
        if (! class_exists('\felicity\twig\Twig')) {
            return;
        }

        \felicity\twig\Twig::get()->addGlobal(
            'FelicityConfig',
            Config::getInstance()
        );
    }
}
