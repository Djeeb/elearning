<?php

namespace App\Http\Managers;

use Illuminate\Support\Facades\Auth;



class VideoManager{
    public function videoStorage($video){
        $fileFullName = $video->getClientOriginalName();
        $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = time() . '_' . $fileName . '.' .$extension;
        $video->storeAs('public/courses_sections/' . Auth::user()->id, $file);
        return $file;
    }
}