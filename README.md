# Laravel Chromedriver

Control Chrome or Chromium easily.

## Requirements

- PHP 7.4 or latest
- Laravel 8.x
- Chrome or Chromium latest version

## Installation

You can install the package via composer:

```bash
composer require masga/laravel-chromedriver
```

## Usage

```php
use Facebook\WebDriver\WebDriverBy;
use Masga\ChromeDriver\Facades\Browser;

Route::get('/browser', function () {
    Browser::start();

    // Get driver
    $driver = Browser::getDriver();

    // Go to URL
    $driver->get('https://en.wikipedia.org/wiki/Selenium_(software)');

    // Find search element by its id, write 'PHP' inside and submit
    $driver->findElement(WebDriverBy::id('searchInput')) // find search input element
        ->sendKeys('PHP') // fill the search box
        ->submit(); // submit the whole form

    // Find element of 'History' item in menu by its css selector
    $historyButton = $driver->findElement(
        WebDriverBy::cssSelector('#ca-history a')
    );

    $btnText = $historyButton->getText();

    // Terminate browser quickly. (optional)
    // Browser::quit();

    return 'About to click to a button with text: ' . $btnText;
});
```

> Browser will quit automatically after the response is sent but you can quit quickly using `Browser::quit()`

## Configuration

You can publish the config file using this command:

```bash
php artisan vendor:publish --tag=chromedriver-config
```

## License

The MIT License. Please see [License File](LICENSE) for more information.
