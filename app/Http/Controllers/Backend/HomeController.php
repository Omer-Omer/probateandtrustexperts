<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Page;
use App\Models\Seo;
use App\Models\Gallery;
use App\Models\ProductCategory;
use File;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topbar()
    {
        $page  = Page::where(['type' => 'home', 'section_type' => 'topbar'])->first();

        $topbar = Null;
        if(isset($page)) {
            $topbar = json_decode($page->json);
        }
        // return $topbar;
        return view('backend.home.topbar', get_defined_vars());
    }

    public function topbarStore(Request $request)
    {
        // return $request->all();
        $json = $request->except(['_token']);

        $json['logo'] = NULL;
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrl = 'upload/page/'.$file_name;
            $json['logo'] = $imageUrl;
        }

        Page::updateOrCreate(
            [
                'type' => 'home',
                'section_type' => 'topbar'
            ],[
                'json' => json_encode($json),
            ]);

        return redirect()->route('topbar');
    }

    public function footer()
    {
        $page  = Page::where(['type' => 'home', 'section_type' => 'footer'])->first();

        $footer = Null;
        if(isset($page)) {
            $footer = json_decode($page->json);
        }
        // return $footer;
        return view('backend.home.footer', get_defined_vars());
    }

    public function footerStore(Request $request)
    {
        // return $request->all();
        $json = $request->except(['_token']);

        // $json['logo'] = NULL;
        // if($request->hasFile('logo')){
        //     $image = $request->file('logo');
        //     $orignalImageName = strtolower(trim($image->getClientOriginalName()));
        //     $file_name = time().rand(100,999).$orignalImageName;
        //     $image->move(public_path('upload/page/'), $file_name);
        //     $imageUrl = 'upload/page/'.$file_name;
        //     $json['logo'] = $imageUrl;
        // }

        Page::updateOrCreate(
            [
                'type' => 'home',
                'section_type' => 'footer'
            ],[
                'json' => json_encode($json),
            ]);

        return redirect()->route('footer');
    }

    public function banner()
    {
        // $banners  = Gallery::where(['type' => 'banner_images'])->get();
        // return $banners;
        $b = Page::where('type', 'home')->where('section_type', 'banner')->first();
        $banner = json_decode($b->json);
        // return $banner->bh_one;

        return view('backend.home.banner', get_defined_vars());
    }

    public function bannerStore(Request $request)
    {
        // return $request->all();

        // if($request->hasFile('banner_images')){
        //     foreach($request->file('banner_images') as $ki => $image)
        //     {
        //         $orignalImageName = strtolower(trim($image->getClientOriginalName()));
        //         $file_name = time().rand(100,999).$orignalImageName;
        //         $image->move(public_path('upload/page/'.date('Y-m').'/'), $file_name);
        //         $imageUrl = 'upload/page/'.date('Y-m').'/'.$file_name;

        //         // $gallery_data['type'] = 'banner_images';
        //         // $gallery_data['featured_image'] = $imageUrl;
        //         // Gallery::create($gallery_data);
        //     }
        // }

        $data = [];
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrl = 'upload/page/'.$file_name;

            // return $data;
        }
        $data = $request->except(['_token', 'banner_image']);
        if(isset($imageUrl)) {
            $data['b_image'] = $imageUrl;
        }

        // return $data;
        // $json = json_encode($data);

        Page::updateOrCreate(
            [
                'type' => 'home',
                'section_type' => 'banner'
            ],[
                'json' => json_encode($data),
            ]);

        return redirect()->route('banner');
    }

    public function customDrapery()
    {
        $drapery = Null;
        $d = Page::where('type', 'drapery')->where('section_type', 'main_section')->first();
        if(isset($d)) {
            $drapery = json_decode($d->json);
        }
        // return $banner->bh_one;

        return view('backend.home.custom_drapery', get_defined_vars());
    }

    public function customDraperyStore(Request $request)
    {
        $data = [];
        if($request->hasFile('image_one')){
            $image = $request->file('image_one');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrlOne = 'upload/page/'.$file_name;
            $data['d_image_one'] = $imageUrlOne;
        }

        if($request->hasFile('image_two')){
            $image = $request->file('image_two');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrTwo = 'upload/page/'.$file_name;
            $data['d_image_two'] = $imageUrTwo;
        }
        $data = $request->except(['_token', 'image_one', 'image_two']);

        // return $data;
        // $json = json_encode($data);

        Page::updateOrCreate(
            [
                'type' => 'drapery',
                'section_type' => 'main_section'
            ],[
                'json' => json_encode($data),
            ]);

        return redirect()->route('custom-drapery');
    }


    public function textUnderBanner()
    {
        $page  = Page::where(['type' => 'home', 'section_type' => 'textUnderBanner'])->first();

        return view('backend.home.textunderbanner', get_defined_vars());
    }

    public function textUnderBannerStore(Request $request)
    {
        // return $request->all();
        $data = $request->except(['_token']);

        Page::updateOrCreate(
            [
                'type' => 'home',
                'section_type' => 'textUnderBanner'
            ],[
                'description' => $request->description ?? '',
            ]);

        return redirect()->route('textUnderBanner');
    }
















    public function index()
    {
        $page = Page::where('type', 'home')->get();

        $banner_section;
        $category_section;
        $aboutus_section;
        $partner_section;
        foreach ($page as $p) {
            if($p->section_type == 'banner_section') {
                $banner_section = $p;
            }elseif($p->section_type == 'category_section'){
                $category_section = $p;
            }elseif($p->section_type == 'aboutus_section'){
                $aboutus_section = $p;
            }
        }
        $partner_section = Gallery::where('type', 'partner_logo')->get();

        $seo = Seo::where('page', 'contactus')->first();

        $product_categories = ProductCategory::get();
        return view('backend.home.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seo = Seo::Where('page', 'home')->first();
        $products = Product::select('id', 'title')->get();
        // dd($products);
        return view('backend.home.create', get_defined_vars());
    }

    public function contactUs(Request $request) {
        $page = Page::where(['type' => 'contactus','section_type' => 'description_section'])->first();
        $seo = Seo::where('page', 'contactus')->first();
        return view('backend.contactus.index', get_defined_vars());
    }

    public function contactUsStore(Request $request) {
        // dd($request->address_1);

        Page::updateOrCreate([
            'type' => 'contactus',
            'section_type' => 'description_section',
        ],[
            'description' => $request->description,
        ]);

        Seo::updateOrCreate([
            'page' => 'contactus',
        ],[
            'meta_title' => $request->seo_title,
            'meta_description' => $request->seo_description,
        ]);

        toastr()->success('Contact Us update Successfully!');
        return redirect()->back();
    }
    public function vendor(Request $request) {
        $page = Page::where(['type' => 'vendor','section_type' => 'description_section'])->first();
        $seo = Seo::where('page', 'vendor')->first();
        return view('backend.vendor.index', get_defined_vars());
    }

    public function vendorStore(Request $request) {
        // dd($request->address_1);

        Page::updateOrCreate([
            'type' => 'vendor',
            'section_type' => 'description_section',
        ],[
            'description' => $request->description,
        ]);

        Seo::updateOrCreate([
            'page' => 'vendor',
        ],[
            'meta_title' => $request->seo_title,
            'meta_description' => $request->seo_description,
        ]);

        toastr()->success('Vendor update Successfully!');
        return redirect()->back();
    }

    public function productIndex() {
        $ppage = Page::where('type', 'product')->get();

        return view('backend.ppage.index', get_defined_vars());
    }

    public function createProductPage() {
        $product_categories = ProductCategory::get();

        return view('backend.ppage.create', get_defined_vars());
    }

    public function storeProductPage(Request $request) {

        if($request->hasFile('image')){
            $image = $request->file('image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrl = 'upload/page/'.$file_name;
        }

        Page::updateOrCreate([
            'type' => 'product',
            'section_type' => $request->product_category_id,
        ],[
            'section_images' => $imageUrl ?? '',
            'section_description' => $request->description,
        ]);

        toastr()->success('Product Section Added successfully!');
        return redirect()->route('page.product');

    }

    public function editProductPage($id) {

        $product = Page::where('type', 'product')->where('id', $id)->first();
        $productCategories  = ProductCategory::get();
        // dd($product);
        return view('backend.ppage.edit', get_defined_vars());
    }

    public function updateProductPage(Request $request, $id) {
        // dd($id);
        // dd($request->all());
        $ppage = Page::where('type', 'product')->where('section_type', $id)->first();
        if($request->hasFile('image')){

            $image_path = public_path($ppage->section_images);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
            $ppage->update(['section_images' => NULL]);

            $image = $request->file('image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/page/'), $file_name);
            $imageUrl = 'upload/page/'.$file_name;

            $ppage->update(['section_images' => $imageUrl]);
        }

        Page::updateOrCreate([
            'type' => 'product',
            'section_type' => $id,
        ],[
            'section_description' => $request->description,
        ]);

        toastr()->success('Product Section Updated successfully!');
        return redirect()->route('page.product');

    }

    public function deleteProductPage($id) {

        $ppage = Page::where('type', 'product')->where('id', $id)->first();

        if(isset($ppage->section_images)) {
            $image_path = public_path($ppage->section_images);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
        }

        $ppage->delete();

        toastr()->success('Product Section Deleted successfully!');
        return redirect()->route('page.product');
    }

    public function fabricIndex() {
        $galleryImages = Gallery::where('type', 'fabric')->get();
        return view('backend.home.fabric', get_defined_vars());
    }

    public function fabricStore(Request $request){

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $image)
            {
                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/gallery/'.date('Y-m').'/'), $file_name);
                $imageUrl = 'upload/gallery/'.date('Y-m').'/'.$file_name;

                $gallery_data['type'] = 'fabric';
                // $gallery_data['thumbnail_image'] = 'gallery';
                $gallery_data['featured_image'] = $imageUrl;
                Gallery::create($gallery_data);
            }

        }
        toastr()->success('Fabric Images Uploaded successfully!');
        return redirect()->route('page.fabric');
    }

    public function projectsIndex() {
        $galleryImages = Gallery::where('type', 'projects')->get();
        return view('backend.home.projects', get_defined_vars());
    }

    public function projectsStore(Request $request){

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $image)
            {
                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/gallery/'.date('Y-m').'/'), $file_name);
                $imageUrl = 'upload/gallery/'.date('Y-m').'/'.$file_name;

                $gallery_data['type'] = 'projects';
                // $gallery_data['thumbnail_image'] = 'gallery';
                $gallery_data['featured_image'] = $imageUrl;
                Gallery::create($gallery_data);
            }

        }
        toastr()->success('Projects Images Uploaded successfully!');
        return redirect()->route('page.projects');
    }

    public function galleryIndex() {
        $galleryImages = Gallery::where('type', 'drapery')->get();
        // $seo = Seo::Where('page', 'gallery')->first();
        return view('backend.gallery.index', get_defined_vars());
    }

    public function galleryStore(Request $request){

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $image)
            {

                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/gallery/'.date('Y-m').'/'), $file_name);
                $imageUrl = 'upload/gallery/'.date('Y-m').'/'.$file_name;

                $gallery_data['type'] = 'drapery';
                // $gallery_data['thumbnail_image'] = 'gallery';
                $gallery_data['featured_image'] = $imageUrl;
                Gallery::create($gallery_data);
            }

        }

        // Seo::updateOrCreate([
        //     'page' => 'gallery',
        // ],[
        //     'meta_title' => $request->seo_title,
        //     'meta_description' => $request->seo_description,
        // ]);


        toastr()->success('Drapery Images Uploaded successfully!');
        // toastr()->success('Gallery Images Uploaded successfully!');
        return redirect()->route('page.gallery');
    }

    // Delete Gallery Image
    public function deleteSingleGalleryImage($id){

        $image = Gallery::findOrFail($id);
        $image_path = public_path($image->featured_image);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $image->delete();
        toastr()->success('Drapery Image Deleted Successfully!');
        return redirect()->back();
    }

    public function addressStore(Request $request) {
        // dd($request->all());
        return redirect()->back()->with('success', 'Address Added Successfully!');
    }

    public function homeStore(Request $request) {
        // dd($request->all());

        if($request->section_type == 'banner_section') {

            if($request->hasFile('banner_image')){
                $image = $request->file('banner_image');
                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/page/'), $file_name);
                $data['section_images'] = 'upload/page/'.$file_name;
            }
            Page::updateOrCreate([
                'type' => 'home',
                'section_type' => 'banner_section'
            ],[
                'section_images' => $data['section_images'],
            ]);

        }elseif($request->section_type == 'category_section') {

            Page::updateOrCreate([
                'type' => 'home',
                'section_type' => 'category_section'
            ],[
                'section_description' => json_encode($request->category),
            ]);

        }elseif($request->section_type == 'aboutus_section') {

            if($request->hasFile('image')){
                $image = $request->file('image');
                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/page/'), $file_name);
                $data['section_images'] = 'upload/page/'.$file_name;
            }
            Page::updateOrCreate([
                'type' => 'home',
                'section_type' => 'aboutus_section'
            ],[
                'section_images' => $data['section_images'],
                'section_description' => $request->description,
            ]);

        }elseif($request->section_type == 'partner_section') {

            if($request->hasFile('partner_logo'))
            {
                foreach($request->file('partner_logo') as $image)
                {

                    $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                    $file_name = time().rand(100,999).$orignalImageName;
                    $image->move(public_path('upload/page/'), $file_name);
                    $data['featured_image'] = 'upload/page/'.$file_name;
                    $data['type'] = 'partner_logo';
                    Gallery::create($data);
                }

            }

        }

        toastr()->success('Record updated successfully!');
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
        $data['type'] =  'home';
        $data['section_type'] = $request->section_type;
        $data['section_heading'] = $request->heading;

        if($request->section_type == 'slider' && $request->hasFile('slider')) {
            $sliderImages = [];
            foreach($request->file('slider') as $key => $image){
                $imageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$imageName;
                $image->move(public_path('upload/slider/'), $file_name);
                $slider_img_data['image'] = 'upload/slider/'.$file_name;
                $sliderImages[$key] = $slider_img_data['image'];
            }

            $data['section_images'] = json_encode($sliderImages);
        }elseif($request->section_type == 'product') {
            $data['section_products'] = json_encode($request->product);
        }

        // dd($data);
        Page::create($data);


        if(isset($request->seo_title) && isset($request->seo_description)) {

            Seo::updateOrCreate(
                ['page' => 'home'],
                [
                    'meta_title' => $request->seo_title,
                    'meta_description' => $request->seo_description,
                ]
            );
        }
        return redirect()->back()->with('success', 'Section created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
