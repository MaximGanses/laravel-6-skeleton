<?php

namespace App\Http\Controllers;

use App\Image;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    use UploadTrait;

    private const UPLOAD_FOLDER = '/uploads/images/';

    public function createAction(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $request->validate(Image::VALIDATOR);
            $image = $request->file('image');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $this->uploadOne($image, $folder, 'public', $name);
            return new Response('Image optimised');
        }

        return view('images.new');
    }
}
