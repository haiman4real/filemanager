<?php

namespace Emmaogunwobi\FileManager;

use Illuminate\Support\ServiceProvider;
use Emmaogunwobi\FileManager\Services\FileManagerService;

class FileManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register package services
        
        $this->mergeConfigFrom(__DIR__ . '/../config/filemanager.php', 'filemanager');

        // Bind the file manager service to the container
        $this->app->singleton('filemanager', function ($app) {
            return new FileManagerService();
        });
        
    
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
