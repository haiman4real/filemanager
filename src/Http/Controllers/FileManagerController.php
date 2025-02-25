<?php

namespace Emmaogunwobi\FileManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use emmaogunwobi\FileManager\Models\FileManager;

class FileManagerController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:' . config('filemanager.max_file_size'),
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', config('filemanager.disk'));

        // Save file details in the database
        $fileRecord = FileManager::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getMimeType(),
            'file_size' => round($file->getSize() / 1024), // Convert to KB
        ]);

        return response()->json([
            'message' => 'File uploaded successfully',
            'file_id' => $fileRecord->id,
            'file_path' => $fileRecord->file_path
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate(['file_id' => 'required|integer']);

        $file = FileManager::find($request->file_id);
        if (!$file) {
            return response()->json(['error' => 'File not found'], 404);
        }

        Storage::disk(config('filemanager.disk'))->delete($file->file_path);
        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }

    public function getFileDetails($id)
    {
        $file = FileManager::find($id);
        if (!$file) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response()->json([
            'file_name' => $file->file_name,
            'file_url' => asset('storage/' . $file->file_path),
            'mime_type' => $file->mime_type,
            'size' => $file->file_size . ' KB',
        ]);
    }
}
