<?php

namespace Emmaogunwobi\FileManager;

use Illuminate\Support\ServiceProvider;

class FileManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register package services
    }

    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../src/config/filemanager.php' => config_path('filemanager.php'),
        ], 'config');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../src/database/migrations');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filemanager');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filemanager');
    }
}
