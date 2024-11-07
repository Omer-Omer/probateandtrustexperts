<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs as ModelsAboutUs;
use App\Models\Home as HomeModel;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutUs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $aboutUsPage = Page::where('type', 'aboutus')->get();
        // $banner_section = [];
        // $sec_one = [];
        // $sec_two = [];
        // $sec_three = [];
        // $sec_four = [];
        // // dd($aboutUsPage);

        // foreach($aboutUsPage as $k => $p){
        //     if($p->section_type == 'banner_section') {
        //         $banner_section = $p;
        //     }elseif($p->section_type == 'section_one'){
        //         $sec_one = $p;
        //     }elseif($p->section_type == 'section_two'){
        //         $sec_two = $p;
        //     }elseif($p->section_type == 'section_three'){
        //         $sec_three = $p;
        //     }elseif($p->section_type == 'section_four'){
        //         $sec_four = $p;
        //     }
        // }

        // $aboutus = ModelsAboutUs::orderBy('ordering')->get();
        // $seo = Seo::where('page', 'aboutus')->first();


        $aboutus = Null;
        $d = Page::where('type', 'aboutus')->where('section_type', 'main_section')->first();
        if(isset($d)) {
            $aboutus = json_decode($d->json);
        }

        // return $aboutus;
        return view('backend.aboutus.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        // if($request->hasFile('images'))
        // {
        //     foreach($request->file('images') as $image)
        //     {

        //         $orignalImageName = strtolower(trim($image->getClientOriginalName()));
        //         $file_name = time().rand(100,999).$orignalImageName;
        //         $image->move(public_path('upload/aboutus/'.date('Y-m').'/'), $file_name);
        //         $about_us['image'] = 'upload/aboutus/'.date('Y-m').'/'.$file_name;
        //         ModelsAboutUs::create($about_us);
        //     }
        // }

        $data = $request->except(['_token']);
        Page::updateOrCreate(
            [
                'type' => 'aboutus',
                'section_type' => 'main_section'
            ],[
                'json' => json_encode($data),
            ]);

        toastr()->success('Data updated Successfully!');
        return redirect()->back();


        // if(isset($request->banner_image)) {
        //     if($request->hasFile('banner_image')){
        //         $image = $request->file('banner_image');
        //         $imageName = $image->getClientOriginalName();
        //         $image->move(public_path('upload/banner/'),$imageName);
        //         $data['section_image'] = 'upload/banner/'.$imageName;
        //     }

        //     Page::updateOrCreate(
        //         ['type' => 'aboutus', 'section_type' => 'banner_section'],
        //         [
        //             // 'section_heading' => $request->sec_two_heading,
        //             // 'section_description' => $request->sec_two_description,
        //             'section_images' => isset($data['section_image']) ? $data['section_image'] : NULL,
        //         ]
        //     );
        // }

        // if(isset($request->sec_one_heading) || isset($request->sec_one_description)) {
        //     Page::updateOrCreate(
        //         ['type' => 'aboutus', 'section_type' => 'section_one'],
        //         [
        //             'section_heading' => $request->sec_one_heading,
        //             'section_description' => $request->sec_one_description,
        //         ]
        //     );
        // }

        // if(isset($request->sec_two_description) || isset($request->sec_two_image)) {

        //     if($request->hasFile('sec_two_image')){
        //         $image = $request->file('sec_two_image');
        //         $imageName = $image->getClientOriginalName();
        //         $image->move(public_path('upload/banner/'),$imageName);
        //         $data['section_image'] = 'upload/banner/'.$imageName;
        //         Page::updateOrCreate(
        //             ['type' => 'aboutus', 'section_type' => 'section_two'],
        //             [
        //                 'section_images' => isset($data['section_image']) ? $data['section_image'] : NULL,
        //             ]
        //         );
        //     }

        //     Page::updateOrCreate(
        //         ['type' => 'aboutus', 'section_type' => 'section_two'],
        //         [
        //             'section_description' => $request->sec_two_description,
        //         ]
        //     );
        // }

        // if(isset($request->sec_three_description) || isset($request->sec_three_image)) {

        //     if($request->hasFile('sec_three_image')){
        //         $image = $request->file('sec_three_image');
        //         $imageName = $image->getClientOriginalName();
        //         $image->move(public_path('upload/banner/'),$imageName);
        //         $data['section_image'] = 'upload/banner/'.$imageName;

        //         Page::updateOrCreate(
        //             ['type' => 'aboutus', 'section_type' => 'section_three'],
        //             [
        //                 'section_images' => isset($data['section_image']) ? $data['section_image'] : NULL,
        //             ]
        //         );
        //     }

        //     Page::updateOrCreate(
        //         ['type' => 'aboutus', 'section_type' => 'section_three'],
        //         [
        //             // 'section_heading' => $request->sec_three_heading,
        //             'section_description' => $request->sec_three_description,
        //         ]
        //     );
        // }

        // if(isset($request->sec_four_heading) || isset($request->sec_four_description)) {
        //     Page::updateOrCreate(
        //         ['type' => 'aboutus', 'section_type' => 'section_four'],
        //         [
        //             'section_heading' => $request->sec_four_heading,
        //             'section_description' => $request->sec_four_description,
        //         ]
        //     );
        // }

        // if(isset($request->seo_title) && isset($request->seo_description)) {
        //     Seo::updateOrCreate(
        //         ['page' => 'aboutus'],
        //         [
        //             'meta_title' => $request->seo_title,
        //             'meta_description' => $request->seo_description,
        //         ]
        //     );
        // }
    }

    public function updateOrder(Request $request){
        $newOrder = $request->input('order');
        foreach ($newOrder as $index => $id) {
            ModelsAboutUs::where('id', $id)->update(['ordering' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }

    public function deleteImage($id){

        // return $id;
        $aboutus = ModelsAboutUs::findOrFail($id);
        $image_path = public_path($aboutus->image);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $aboutus->delete();

        return response()->json(['message' => 'Image Deleted Successfully!']);

        toastr()->success('Image Deleted Successfully!');
        return redirect()->back();
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
