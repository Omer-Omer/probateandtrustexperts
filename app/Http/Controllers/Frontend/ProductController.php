<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Media;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();

        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $company = Company::where('id', $id)->first();
        $products = Product::where('company_id', $id)->with('company', 'product_category', 'product_images')->get();

        return view('frontend.pages.product-listing', get_defined_vars());
    }

    public function getCompanyProductListing($id){

        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();

        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $company = Company::where('id', $id)->first();
        $products = Product::where('company_id', $id)->with('company', 'product_category', 'product_images')->get();

        return view('frontend.pages.product-listing', get_defined_vars());
    }

    public function getCategoryProductListing($id){

        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();

        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $company = Company::where('id', $id)->first();
        $products = Product::where('company_id', $id)->with('company', 'product_category', 'product_images')->get();

        return view('frontend.pages.product-listing', get_defined_vars());
    }

    public function searchCompanyProducts(Request $request){

        $company_id = $request->company;

        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();

        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $company = Company::where('id', $company_id)->first();
        $products = Product::where('company_id', $company_id)->with('company', 'product_category', 'product_images')->get();

        return view('frontend.pages.product-listing', get_defined_vars());
    }

    public function productDetails($id)
    {
        // return $id;
        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();

        $product_detail = Product::where('id', $id)->with('company', 'product_category', 'product_images')->first();

        $category_id = $product_detail->product_category_id;
        $related_products =  Product::where('product_category_id', $category_id)->with('company', 'product_category', 'product_images')->get();
        // return public_path('/');
        // return $product_detail;
        return view('frontend.pages.product-detail', get_defined_vars());
    }
}
