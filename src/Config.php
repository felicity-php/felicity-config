<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace felicity\config;

/**
 * Class Config
 */
class Config
{
    /** @var Config $instance */
    public static $instance;

    /** @var array $configItems */
    private $configItems = [];

    /**
     * Private constructor prevents the creation of this class outside of itself
     */
    private function __construct()
    {
    }

    /**
     * Gets the config class instance
     * @return Config Singleton
     */
    public static function getInstance() : Config
    {
        if (! self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Sets config item
     * @param string $key
     * @param mixed $val
     * @return Config
     */
    public static function set(string $key, $val) : Config
    {
        return self::getInstance()->setItem($key, $val);
    }

    /**
     * Sets config item
     * @param string $key
     * @param mixed $val
     * @return Config
     */
    public function setItem(string $key, $val) : Config
    {
        $this->setArrayDot($this->configItems, $key, $val);
        return $this;
    }

    /**
     * Gets a config item
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return self::getInstance()->getItem($key, $default);
    }

    /**
     * Gets a config item
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getItem(string $key, $default = null)
    {
        return $this->getArrayDot($this->configItems, $key) ?: $default;
    }

    /**
     * Sets an array with dot syntax
     * @param array $arr
     * @param string $path
     * @param mixed $val
     */
    private function setArrayDot(array &$arr, string $path, $val)
    {
        $loc = &$arr;

        foreach (explode('.', $path) as $step) {
            $loc = &$loc[$step];
        }

        $loc = $val;
    }

    /**
     * Gets an array item from dot syntax
     * @param array $arr
     * @param string $path
     * @return mixed
     */
    private function getArrayDot(array $arr, string $path)
    {
        $val = $arr;

        foreach (explode('.', $path) as $step) {
            if (! isset($val[$step])) {
                return null;
            }

            $val = $val[$step];
        }

        return $val;
    }
}
