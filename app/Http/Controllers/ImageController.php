<?php

namespace App\Http\Controllers;

use App\ImageModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $albums = Storage::directories();
        return view('index')->with('albums', $albums);
    }

    public function showAlbum($album)
    {
        $image_details = [
            'album' => $album,
            'images' => []
        ];
        $image_folder = Storage::files($album);
        $file_extension = null;
        foreach ($image_folder as &$image) {
            $image = str_replace($album, '', $image);
            $image = str_replace('/', '', $image);
            $file_extension = substr($image, strpos($image, '.'));
            $image = str_replace($file_extension, '', $image);
        }

        sort($image_folder);

        foreach ($image_folder as &$image) {
            $image_name = $image;
            $image = $album . '/' . $image . $file_extension;
            $details = [
                'image_name' => $image_name,
                'image_link' => Storage::url($image)
            ];
            array_push($image_details['images'], $details);
        }

        // echo '<pre>';
        // print_r($image_details);
        return view('album')->with('image_details', $image_details);
    }

    public function store(Request $request)
    {
        //
    }
    public function showImage($album, $name)
    {
        $image = $album . '/' . $name . '.jpg';
        $image_exist = Storage::exists($image);
        if ($image_exist != 1) {
            $image = $album . '/' . $name . '.png';
        }
        $image = Storage::url($image);
        return view('image')->with('image', $image);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
