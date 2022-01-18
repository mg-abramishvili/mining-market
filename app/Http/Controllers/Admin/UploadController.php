<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo');
        }
        if ($request->file('screenshot')) {
            $file = $request->file('screenshot');
        }

        if ($file) {
            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file->path());
            $img->resize(1400, 1400, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/uploads/' . $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }
    }

    public function ck_image_upload(Request $request) {
        $file = $request->file('upload');
        $filename = time().'.'.$file->extension();
        $img = Image::make($file->path());
        $img->resize(1600, 1600, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/uploads/' . $filename);

        return response()->json([
            'url' => '/uploads/' . $filename
        ]);
    }
}