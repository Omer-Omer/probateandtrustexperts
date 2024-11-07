<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUs as ModelsAboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $section_one = ModelsAboutUs::where('section_type', 'section_one')->first();
        $section_two_left = ModelsAboutUs::where('section_type', 'section_two_left')->first();
        $section_two_right = ModelsAboutUs::where('section_type', 'section_two_right')->first();

        $section_three = ModelsAboutUs::where('section_type', 'section_three')->first();
        $section_four = ModelsAboutUs::where('section_type', 'section_four')->first();
        $section_five = ModelsAboutUs::where('section_type', 'section_five')->first();

        $section_six_one = ModelsAboutUs::where('section_type', 'section_six_one')->first();
        $section_six_two = ModelsAboutUs::where('section_type', 'section_six_two')->first();
        $section_six_three = ModelsAboutUs::where('section_type', 'section_six_three')->first();

        return view('frontend.pages.faq', get_defined_vars());
    }
}
