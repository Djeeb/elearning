@extends('layouts.app')

@section('content')


@php

$section = $course->sections[0];
$increment = 0;

@endphp

<section class="latest-blog container-fluid px-5 spad">
    <h2 class="text-center my-3">{{ $section->name }}</h2>
    <div class="row">
        <div class="col-md-8">
            <video width="800" height="550" controls>
                <source src="{{ asset("storage/courses_sections/$course->user_id/$section->video") }}" type="video/mp4">
            </video>
        </div>
        <div class="col-md-4">
            <ul class="list-group list-group-flush mt-5 pt-2">
                @foreach($course->sections as $section)
                @php
                    $increment++;
                @endphp
                    <li class="list-group-item bg-light">
                        <a href="{{ route('participant.section', [
                            'slug' => $course->slug,
                            'section' => $section->slug
                        ]) }}" class="btn">
                            <i class="fas fa-book"></i>
                            Chapitre {{ $increment }} : {{ $section->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@stop