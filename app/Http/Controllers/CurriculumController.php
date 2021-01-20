<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Managers\VideoManager;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends Controller
{
    public function __construct(VideoManager $videoManager){
        $this->videoManager = $videoManager;
    }
    
    public function index($id){
        $course = Course::find($id);
        return view('instructor.curriculum.index', [
            'course' => $course
        ]);
    }

    public function create($id){
        $course = Course::find($id);
        return view('instructor.curriculum.create', [
            'course' => $course
        ]);
    }
    
        public function store(Request $request, $id){
        $slugify = new Slugify();
        $section = new Section();
        $course = Course::find($id);

        $section->name = $request->input('section_name');
        $section->slug = $slugify->slugify($section->name);
        $video = $this->videoManager->videoStorage($request->file('section_video'));

        $section->video = $video;
        $section->course_id = $id;

        $playtime = $this->videoManager->getVideoDuration($video);
        $section->playtime_seconds = $playtime;
        
        $section->save();
        return redirect()->route('instructor.curriculum.index', $course->id);
    }
}
