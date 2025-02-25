<?php

return [
    'disk' => env('FILEMANAGER_DISK', 'local'),
    'max_file_size' => 10240, // 10MB
    'allowed_mime_types' => ['image/jpeg', 'image/png', 'application/pdf'],
];
