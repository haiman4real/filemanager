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

## Usage

Import the package and use the provided methods to manage files:

```javascript
const fileManager = require('@mobile-bookings/filemanager');

// Upload a file
fileManager.upload(file);

// Download a file
fileManager.download(fileId);

// Delete a file
fileManager.delete(fileId);

// List all files
fileManager.list();
```

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is licensed under the MIT License.
