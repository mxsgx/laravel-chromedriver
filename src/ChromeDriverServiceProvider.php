<?php

namespace Masga\ChromeDriver;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Masga\ChromeDriver\Facades\Browser;
use Masga\ChromeDriver\Http\Middleware\TerminateBrowser;

class ChromeDriverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/chromedriver.php',
            'chromedriver'
        );

        $this->app->singleton('chromedriver', function () {
            return new ChromeDriver();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/chromedriver.php' => config_path('chromedriver.php'),
        ], 'chromedriver-config');

        $this->registerMiddleware();

        $this->configureChromeDriver();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['chromedriver'];
    }

    public function registerMiddleware()
    {
        $kernel = App::make(Kernel::class);

        $kernel->pushMiddleware(TerminateBrowser::class);
    }

    public function configureChromeDriver()
    {
        Browser::getOptions()
            ->setBinary(Config::get('chromedriver.binary_path'))
            ->addArguments(Config::get('chromedriver.args'));
    }
}
