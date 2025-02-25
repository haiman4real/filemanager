<?php

return [
    'disk' => env('FILEMANAGER_DISK', 'local'),
    'max_file_size' => 10240, // 10MB
    // 'allowed_mime_types' => ['image/jpeg', 'image/png', 'application/pdf'],
    'allowed_mime_types' => [
        // Images
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
        'image/svg+xml',
        // Documents
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        // Spreadsheets
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        // Presentations
        'application/vnd.ms-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        // Text
        'text/plain',
        // Archives
        'application/zip',
        'application/x-rar-compressed',
        'application/x-7z-compressed',
        // Audio
        'audio/mpeg',
        'audio/wav',
        // Video
        'video/mp4',
        'video/x-msvideo',
        'video/quicktime',
    ],
];
