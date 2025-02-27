# File Manager by Emmanuel Ogunwobi

Welcome to the File Manager package for the Laravel project. This package provides functionalities to manage files within the application.

## Features

- Upload files
- Download files
- Delete files
- List files

## Installation

To install the package, run:

```bash
composer require emmaogunwobi/filemanager
```

```bash
php artisan vendor:publish --provider="Emmaogunwobi\FileManager\FileManagerServiceProvider" --tag=config
```

```bash
php artisan migrate
```

## Usage

Import the package and use the provided methods to manage files

Add the following to the config/app.php file to activate the Facade service

```php
'aliases' => [
    // ...
    'FileManager' => Emmaogunwobi\FileManager\Facades\FileManager::class,
],
```

You can use via the Dependency Injection

```php
use Emmaogunwobi\FileManager\Services\FileManagerService;

class SomeController extends Controller
{
    protected $fileManager;

    public function __construct(FileManagerService $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    public function someMethod()
    {
        $result = $this->fileManager->upload('/path/to/file.jpg');
        // Do something with $result
    }
}
```

or via the Facade
```php
use FileManager; // Assuming you've set up the alias

class SomeController extends Controller
{
    public function someMethod()
    {
        $result = FileManager::upload('/path/to/file.jpg');
        // Do something with $result
    }
}
```


## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is licensed under the MIT License.
