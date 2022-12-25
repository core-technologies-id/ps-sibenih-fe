<?php

use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_file')) {
    function upload_file($field = '', $folder = '', $visibility = 'public', $not_image = false)
    {
        $request = app()->request;
        $image = $request->file($field);
        $mime = $image->getClientMimeType();

        $targepath = $image->getClientOriginalName();

        $path = sprintf("$folder/%s", $targepath);
        Storage::disk('minio')->put($path, file_get_contents($image), [
            'visibility' => $visibility,
            'mimetype' => $mime
        ]);

        $url = config('filesystems.disks.minio.url');
        $bucket = config('filesystems.disks.minio.bucket');
        $filename = Storage::disk('minio')->path($path);
        $fullpath = sprintf("%s/%s/%s", $url, $bucket, $filename);

        if ($not_image == true) {
            $webp = Webp::make($image);
            if ($webp->save(public_path($targepath . '.webp'))) {
                $webp_content = public_path($targepath . '.webp');
                $webp_path = sprintf("$folder/%s", $targepath);
                Storage::disk('minio')->put($webp_path, file_get_contents($webp_content), [
                    'visibility' => $visibility,
                    'mimetype' => 'image/webp'
                ]);
            }
        }

        return $fullpath;
    }
}
