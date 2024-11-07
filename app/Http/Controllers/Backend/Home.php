<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Home as HomeModel;

class Home extends Controller
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
    public function index()
    {
        // $section_one = HomeModel::where('section_type', 'section_one')->first();
        // $section_two_right = HomeModel::where('section_type', 'section_two_right')->first();
        // $section_two_left = HomeModel::where('section_type', 'section_two_left')->first();

        // // Project Images
        // $section_three = HomeModel::where('section_type', 'section_three')->first();
        // $project_images = Gallery::where('page_section_id', $section_three->id)->get();

        // $section_four = HomeModel::where('section_type', 'section_four')->first();
        // $section_five = HomeModel::where('section_type', 'section_five')->first();
        // $section_six = HomeModel::where('section_type', 'section_six')->first();

        return view('backend.home.index', get_defined_vars());
    }

    public function homeSectionHeadings(Request $request){

        // return $request;
        // Section One

        if(isset($request->section_type) && $request->section_type == 'section_one'){

            $section_one = HomeModel::where('section_type', 'section_one')->first();
            $data['section_type'] = 'section_one';
            $data['section_image_text'] = $request->banner_image_text;

            if($request->hasFile('banner_image')){
                $image = $request->file('banner_image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('upload/banner/'),$imageName);
                $data['section_image'] = 'upload/banner/'.$imageName;
            }
            if($section_one){
                HomeModel::where('section_type', 'section_one')->update($data);
            }else{
                HomeModel::create($data);
            }

        }

        //  Section Six
        if(isset($request->section_type) && $request->section_type == 'section_six'){
            $section_one = HomeModel::where('section_type', 'section_six')->first();
            $data['section_type'] = 'section_six';
            $data['section_description'] = $request->section_description;
            if($section_one){
                HomeModel::where('section_type', 'section_six')->update($data);
            }else{
                HomeModel::create($data);
            }
        }


        //  Section Two
        if(isset($request->section_type) && $request->section_type == 'section_two_left'){
            $section_one = HomeModel::where('section_type', 'section_two_left')->first();
            $data['section_type'] = 'section_two_left';
            $data['section_description'] = $request->section_two_left_description;
            if($section_one){
                HomeModel::where('section_type', 'section_two_left')->update($data);
            }else{
                HomeModel::create($data);
            }
        }

        if(isset($request->section_type) && $request->section_type == 'section_two_right'){
            $section_one = HomeModel::where('section_type', 'section_two_right')->first();
            $data['section_type'] = 'section_two_right';
            $data['section_description'] = $request->section_two_right_description;
            if($section_one){
                HomeModel::where('section_type', 'section_two_right')->update($data);
            }else{
                HomeModel::create($data);
            }
        }

        // return $request->all();
        if(isset($request->section_type) && $request->section_type == 'section_three'){

            $section_three = HomeModel::where('section_type', 'section_three')->first();
            $data['section_type'] = 'section_three';
            if($section_three){
                HomeModel::where('section_type', 'section_three')->update($data);
            }else{
                $section_three = HomeModel::create($data);
            }

            $sectionId = $section_three->id;

            if($request->hasFile('project_images'))
            {
                foreach($request->file('project_images') as $image)
                {

                    $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                    $file_name = time().rand(100,999).$orignalImageName;
                    $image->move(public_path('upload/project_images/'), $file_name);
                    $img_data['image'] = 'upload/project_images/'.$file_name;
                    $img_data['page_section_id'] = $sectionId;
                    Gallery::create($img_data);
                }
            }

        }

        if(isset($request->section_type) && $request->section_type == 'section_four'){

            $section_four = HomeModel::where('section_type', 'section_four')->first();
            $data['section_type'] = 'section_four';
            $data['section_description'] = $request->section_description;
            if($section_four){
                HomeModel::where('section_type', 'section_four')->update($data);
            }else{
                HomeModel::create($data);
            }
        }

        if(isset($request->section_type) && $request->section_type == 'section_five'){

            $section_five = HomeModel::where('section_type', 'section_five')->first();
            $data['section_type'] = 'section_five';
            $data['section_description'] = $request->section_description;
            if($section_five){
                HomeModel::where('section_type', 'section_five')->update($data);
            }else{
                HomeModel::create($data);
            }
        }

        return redirect()->back()->with('success', 'Headings Updated Successfull!');

    }

    public function sliderImageUpload(Request $request){

        $request->validate([
            'slider_image' => 'required|dimensions:min_width=1200,min_height=400'
        ]);

        // return $request->file('slider_image');
        if( $request->hasFile('slider_image') ){
            $image = $request->file('slider_image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('upload/slider'),$imageName);

            $imageUpload = new Media();
            $imageUpload->page = 'home';
            $imageUpload->section = 'slider_section';
            $imageUpload->image_url = 'upload/slider/'.$imageName;
            $imageUpload->save();

            return redirect()->back()->with('success', 'Slider Image uploaded successfully');

        }else{
            return redirect()->back()->with('error', 'File not Found');

        }

    }

    // Banner Upload
    public function bannerImageUpload(Request $request){

        $request->validate([
            'banner_image' => 'required|dimensions:min_width=900,min_height=150',
            'banner_image_text' => 'required',
        ]);

        // return $request->file('banner_image');
        if( $request->hasFile('banner_image') ){
            $image = $request->file('banner_image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('upload/banner/'),$imageName);

            // $banner_section = HomeModel::where('section_type', 'banner_section')->first();

            $imageUpload = new HomeModel();
            $imageUpload->section_type = 'banner_section';
            $imageUpload->section_image = 'upload/banner/'.$imageName;
            $imageUpload->section_image_text = isset($request->banner_image_text) ? $request->banner_image_text : '' ;
            $imageUpload->save();

            return redirect()->back()->with('success', 'Banner Image uploaded successfully');

        }else{
            return redirect()->back()->with('error', 'File not Found');

        }

    }

    public function deleteUploadImage(Request $request, $id){

        // return $id;
        $file = Media::find($id);
        $file_path = $file->image_url;
        if(file_exists($file_path))
        {
           unlink($file_path);
           Media::destroy($id);
        }
        return redirect()->back()->with('success', 'Image Deleted successfully');
    }

    public function deleteGalleryImage($id){

        // return $id;
        $file = Gallery::find($id);
        $file_path = $file->image;
        if(file_exists($file_path))
        {
           unlink($file_path);
           Gallery::destroy($id);
        }
        return redirect()->back()->with('success', 'Gallery Image Deleted successfully');
    }

}

