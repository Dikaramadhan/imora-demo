<?php
// app/Http/Controllers/TemplateController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

abstract class TemplateController extends Controller
{
    protected string $galleryPath;
    protected string $view;

    public function index()
    {
        $directory = public_path($this->galleryPath);

        File::ensureDirectoryExists($directory, 0755);

        $files = File::glob($directory . '/*.{jpg,JPG,jpeg,png,webp}', GLOB_BRACE) ?: [];

        $galleryPhotos = array_map(
            fn($file) => asset($this->galleryPath . '/' . basename($file)),
            $files
        );

        return view($this->view, compact('galleryPhotos'));
    }
}
