<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function show()
    {
        $name = 'Hind Bundoq';

        $skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'];

        $course = (object) [
            'title'   => 'Full Stack Web Development',
            'academy' => 'Orange Academy',
            'track'   => 'Laravel',
        ];

        return view('profile', compact('name', 'skills', 'course'));
    }
}
