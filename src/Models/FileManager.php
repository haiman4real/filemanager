<?php

namespace emmaogunwobi\FileManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'file_path', 'mime_type', 'file_size'];
}
