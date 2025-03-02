<?php

namespace Emmaogunwobi\FileManager\Services;

use Illuminate\Support\Facades\Storage;
use Emmaogunwobi\FileManager\Models\FileManager;
use Exception;

class FileManagerService
{
    /**
     * Upload a file and store its details in the database.
     *
     * @param string $filePath
     * @return array
     */
    public function upload($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: " . $filePath);
        }

        $originalName = basename($filePath);
        $mimeType     = mime_content_type($filePath);
        $path         = Storage::disk(config('filemanager.disk'))->putFile('uploads', new \Illuminate\Http\File($filePath));

        $fileRecord = FileManager::create([
            'file_name' => $originalName,
            'file_path' => $path,
            'mime_type' => $mimeType,
            'file_size' => round(filesize($filePath) / 1024), // in KB
        ]);


        return [
            'message'   => 'File uploaded successfully',
            'file_id'   => $fileRecord->id,
            'file_path' => $fileRecord->file_path,
        ];
    }

    /**
     * Delete a file by its ID.
     *
     * @param int $fileId
     * @return array
     */
    public function delete($fileId)
    {
        $file = FileManager::find($fileId);
        if (!$file) {
            throw new Exception("File not found");
        }

        Storage::disk(config('filemanager.disk'))->delete($file->file_path);
        $file->delete();

        return [
            'message' => 'File deleted successfully'
        ];
    }

    // Add other methods as needed
    /**
     * Return a response that streams the file to the user.
     *
     * @param int $fileId
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Exception
     */
    public function viewFile($fileId)
    {
        // Retrieve the file record from the database
        $file = FileManager::find($fileId);
        if (!$file) {
            throw new Exception("File not found");
        }

        return Storage::disk(config('filemanager.disk'))->response(
            $file->file_path,
            $file->file_name,
            ['Content-Type' => $file->mime_type]
        );
    }
}