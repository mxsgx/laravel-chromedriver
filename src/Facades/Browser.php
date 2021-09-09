<?php

namespace Masga\ChromeDriver\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Facebook\WebDriver\Remote\DesiredCapabilities getCapabilities()
 * @method static \Facebook\WebDriver\Chrome\ChromeDriver getDriver()
 * @method static \Facebook\WebDriver\Chrome\ChromeOptions getOptions()
 * @method static \Facebook\WebDriver\Chrome\ChromeDriver start()
 * @method static void quit()
 */
class Browser extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chromedriver';
    }
}
