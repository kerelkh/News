<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileService {

    public static function upload(Request $request)
    {
        $name = 'IMG' . NOW()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
        $filepath = $request->file('image')->storeAs('images', $name);

        return $filepath;
    }

}
