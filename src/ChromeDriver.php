<?php

namespace Masga\ChromeDriver;

use Facebook\WebDriver\Chrome\ChromeDriver as Driver;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ChromeDriver
{
    /**
     * @var \Facebook\WebDriver\Remote\DesiredCapabilities
     */
    protected static $capabilities;

    /**
     * @var \Facebook\WebDriver\Chrome\ChromeDriver
     */
    protected static $driver;

    /**
     * @var \Facebook\WebDriver\Chrome\ChromeOptions
     */
    protected static $options;

    public function __construct()
    {
        self::$capabilities = DesiredCapabilities::chrome();
        self::$options = new ChromeOptions();
    }

    /**
     * @return \Facebook\WebDriver\Remote\DesiredCapabilities
     */
    public static function getCapabilities()
    {
        return self::$capabilities;
    }

    /**
     * @return \Facebook\WebDriver\Chrome\ChromeDriver
     */
    public static function getDriver()
    {
        return self::$driver;
    }

    /**
     * @return \Facebook\WebDriver\Chrome\ChromeOptions
     */
    public static function getOptions()
    {
        return self::$options;
    }

    /**
     * Start browser.
     *
     * @param  bool $w3c
     *
     * @return \Facebook\WebDriver\Chrome\ChromeDriver
     */
    public static function start(bool $w3c = true)
    {
        self::$capabilities->setCapability($w3c ? ChromeOptions::CAPABILITY_W3C : ChromeOptions::CAPABILITY, self::$options);
        self::$driver = Driver::start(self::$capabilities);

        return self::$driver;
    }

    /**
     * Close browser.
     *
     * @return void
     */
    public static function quit()
    {
        if (self::$driver instanceof \Facebook\WebDriver\Chrome\ChromeDriver) {
            self::$driver->quit();
        }
    }
}
