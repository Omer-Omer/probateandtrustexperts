<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('frontend.home', get_defined_vars());
    }

    public function livingTrustQA()
    {
        return view('frontend.living_trust', get_defined_vars());
    }

    public function haveWill()
    {
        return view('frontend.have_will', get_defined_vars());
    }

    public function trustWithoutWill()
    {
        return view('frontend.trust_without_will', get_defined_vars());
    }

    public function trustImportance()
    {
        return view('frontend.trust_importance', get_defined_vars());
    }

    public function whyMediation()
    {
        return view('frontend.why_mediation', get_defined_vars());
    }

    public function customMadeDrapery()
    {

        $drapery = Null;
        $d = Page::where('type', 'drapery')->where('section_type', 'main_section')->first();
        if(isset($d)) {
            $drapery = json_decode($d->json);
        }

        $galleryImages = Gallery::where('type', 'drapery')->get();
        // return $drapery;

        // header
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        // return $topbar;

        return view('frontend.drapery', get_defined_vars());
    }

    public function projects()
    {

        $galleryImages = Gallery::where('type', 'projects')->get();
        // return $drapery;

        // header
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        // return $categories;

        return view('frontend.projects', get_defined_vars());
    }

    public function category(Request $request)
    {
        // dd($request->name);
        $product_categories = array();
        $product = array();

        $category = ProductCategory::where('slug', $request->name)->first();
        // $bannerImages = Gallery::where('type', 'banner_images')->get();

        $products = Product::where('product_category_id', $category->id)->with('product_category', 'product_images')->limit(12)->get();

        // $products = $product_categories->products;
        // return $products;

        // header
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        // return $topbar;

        return view('frontend.category', get_defined_vars());
    }

    public function productDetails(Request $request) {

        $product = array();
        $product = Product::where('id', $request->id)->with('product_category', 'product_images')->first();
        // return $products;

        // header
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);

        return view('frontend.product_detail', get_defined_vars());
    }

    public function company()
    {
        return view('frontend.company');
    }

    public function listing()
    {
        // dd('yes');
        return view('frontend.company_listing');
    }

    public function itemListing()
    {
        // return view('welcome');
        return view('frontend.listing');
    }

    public function preview() {
        return view('frontend.preview');
    }
}
