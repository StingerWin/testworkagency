<?php


namespace App\Services;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GlobalServices
{
    public static function saveImg($data, $path) {
        $name = time() . '-'. pathinfo($data->getClientOriginalName(), PATHINFO_FILENAME).'.jpg';

        $path = $path.'/'.$name;
        $img = Image::make($data)->fit(300, 300, function ($constraint) {
            $constraint->upsize();
        })->orientate()->encode('jpg', 80);
        Storage::disk('public')->put($path, $img);


        return '/storage/'.$path;
    }

    public static function deleteFile($pathToFile)
    {
        Storage::disk('public')->delete(str_replace("/storage/", "", $pathToFile));
    }
}
