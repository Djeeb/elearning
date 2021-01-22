<?php

use App\User;
use App\Course;
use App\Category;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new Slugify();
        
        $course = new Course();
        $course->title = "Les bases de Symfony 4";
        $course->subtitle = "Apprendre à créer un site avec Symfony 4";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium lacus eu accumsan pharetra. Donec in dui libero. Maecenas vitae sollicitudin quam. Nulla facilisis eu purus a varius. Nam sollicitudin metus sit amet felis fringilla, non semper ligula pretium. Curabitur tincidunt efficitur erat, quis ultricies lorem consequat ut. Mauris sodales euismod porttitor. Ut quis semper diam. Mauris nibh lectus, ullamcorper sit amet fermentum et, vehicula eu libero. Phasellus nec risus erat.";
        $course->price = 19.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Créer un site ecommerce avec Wordpress";
        $course->subtitle = "Créer un site ecommerce complet avec Wordpress";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium lacus eu accumsan pharetra. Donec in dui libero. Maecenas vitae sollicitudin quam. Nulla facilisis eu purus a varius. Nam sollicitudin metus sit amet felis fringilla, non semper ligula pretium. Curabitur tincidunt efficitur erat, quis ultricies lorem consequat ut. Mauris sodales euismod porttitor. Ut quis semper diam. Mauris nibh lectus, ullamcorper sit amet fermentum et, vehicula eu libero. Phasellus nec risus erat.";
        $course->price = 14.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de Laravel 7";
        $course->subtitle = "Créer une plateforme d'enseignement avec Laravel 7";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium lacus eu accumsan pharetra. Donec in dui libero. Maecenas vitae sollicitudin quam. Nulla facilisis eu purus a varius. Nam sollicitudin metus sit amet felis fringilla, non semper ligula pretium. Curabitur tincidunt efficitur erat, quis ultricies lorem consequat ut. Mauris sodales euismod porttitor. Ut quis semper diam. Mauris nibh lectus, ullamcorper sit amet fermentum et, vehicula eu libero. Phasellus nec risus erat.";
        $course->price = 34.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
        $course->save();
    }
}
