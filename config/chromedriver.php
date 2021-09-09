<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Chrome Executable Path
    |--------------------------------------------------------------------------
    |
    | You can configure the Chrome executable binary path from here if you
    | want to using a Chrome executable in non-standard location.
    |
    */

    'binary_path' => env('CHROMEDRIVER_BINARY_PATH', ''),

    /*
    |--------------------------------------------------------------------------
    | Command-line Arguments
    |--------------------------------------------------------------------------
    |
    | You can configure the command-line arguments to use when starting
    | Chrome from here.
    |
    | See: https://peter.sh/experiments/chromium-command-line-switches/
    |
    */

    'args' => explode(',', env('CHROMEDRIVER_ARGS', implode(',', [
        '--no-sandbox',
        '--headless',
        '--disable-gpu',
        '--disable-dev-shm-usage',
    ]))),
];
