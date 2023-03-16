<?php

namespace App\Supports\Services;

use App\Models\File;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadFileService
{
    /**
     * @param $uploadedFile
     * @param array $oldPath
     * @param string|null $prefix
     * @return string
     */
    public function uploadFile($uploadedFile, array $oldPath = [], string $prefix = null): ?string
    {
        if (! empty($oldPath)) {
            $this->deleteFile($oldPath);
        }

        if (is_array($uploadedFile)) {
            return collect($uploadedFile)
                ->filter(function ($file) {
                    return $file instanceof UploadedFile;
                })
                ->map(function ($file) use ($prefix) {
                    return $this->upload($file, $prefix);
                });
        }
        if ($uploadedFile instanceof UploadedFile) {
            return $this->upload($uploadedFile, $prefix);
        }

        return null;
    }

    /**
     * @param $path
     */
    public function deleteFile($path)
    {
        $this->storageDriver()->delete($path);
    }

    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function storageDriver(): FilesystemAdapter
    {
        return Storage::disk('s3');
    }

    public function upload(UploadedFile $uploadedFile, string $prefix = null)
    {
        // add new image
        $filename = sprintf('file_%s_%s.%s', now()->timestamp, Str::random(8), $uploadedFile->getClientOriginalExtension());
        $path = $this->imageDirectoryPath();
        $filePath = $path.'/'.$filename;
        $option = ['visibility' => 'public'];
        $this->storageDriver()->put($filePath, file_get_contents($uploadedFile), $option);

        return $this->imagePathS3($filePath);
    }

    /**
     * @return string
     */
    public function imageDirectoryPath(): string
    {
        return 'auger/uploads/'.now()->format('Y/m/d');
    }

    /**
     * @param $path
     * @return string
     */
    public function imagePathS3($path): string
    {
        return $this->storageDriver()->temporaryUrl($path, now()->addDay());
    }
}
