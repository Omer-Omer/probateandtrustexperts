<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Seo;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_list = Blog::get()->latest();
        return view('backend.blog.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 2)->get();
        return view('backend.blog.add', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();

        $request->validate([
            'heading' => 'required',
            'thumbnail_image' => 'required',
            'image_alt_tag' => 'required',
            'user_id' => 'required',
            'blog_detail' => 'required',
//            'seo_title' => 'required',
//            'seo_description' => 'required',
        ]);


        if($request->hasFile('thumbnail_image')){
            $image = $request->file('thumbnail_image');
            $thumbnailImage = $image->getClientOriginalName();
            $image->move(public_path('upload/blog'), $thumbnailImage);
            $data['image'] = 'upload/blog/'.$thumbnailImage;
        }

        $data['pageheading'] = $request->heading;
        $data['image_caption'] = $request->image_alt_tag;
        $data['textcontent'] = $request->blog_detail;
        $data['published_date'] = date('Y-m-d');

        if(isset($request->heading)){
            $data['url'] = str_replace(' ', '-', $request->heading);
        }
        $data['user_id'] = $request->user_id;

        if(isset($request->status)){
            $data['status'] = 1;
        }

//        return $data;
        $blog = Blog::create($data);

        if(isset($blog)){
            $seoData['type'] = 2;
            $seoData['blog_id'] = $blog->id;
            $seoData['title'] = isset($request->seo_title) ? $request->seo_title : '';
            $seoData['description'] = isset($request->seo_description) ? $request->seo_description : '';
            Seo::create($seoData);
        }

        toastr()->success('Blog Created Successfully!');

        return redirect()->route('admin.blog.view');
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
        $blog = Blog::with('seo')->where('id', $id)->first();
//        return $blog->seo;
        $users = User::where('role', 2)->get();
        return view('backend.blog.edit', get_defined_vars());
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
//        return $request->all();
        $blog = Blog::with('seo')->where('id', $id)->first();

        $request->validate([
            'heading' => 'required',
            'thumbnail_image' => isset($blog->image) ? '' : 'required',
            'image_alt_tag' => 'required',
            'user_id' => 'required',
            'blog_detail' => 'required',
//            'seo_title' => 'required',
//            'seo_description' => 'required',
        ]);



        if($blog){

            if($request->hasFile('thumbnail_image')){
                $image = $request->file('thumbnail_image');
                $thumbnailImage = $image->getClientOriginalName();
                $image->move(public_path('upload/blog'), $thumbnailImage);
                $data['image'] = 'upload/blog/'.$thumbnailImage;
            }

            $data['pageheading'] = $request->heading;
            $data['image_caption'] = $request->image_alt_tag;
            $data['textcontent'] = $request->blog_detail;
            $data['published_date'] = date('Y-m-d');

            if(isset($request->heading)){
                $data['url'] = str_replace(' ', '-', $request->heading);
            }
            $data['user_id'] = $request->user_id;

            if(isset($request->status)){
                $data['status'] = 1;
            }

            Blog::where('id', $id)->update($data);

            $seoData['type'] = 2;
            $seoData['blog_id'] = $blog->id;
            $seoData['title'] = isset($request->seo_title) ? $request->seo_title : '';
            $seoData['description'] = isset($request->seo_description) ? $request->seo_description : '';

            if(isset($blog->seo)){
                Seo::where('blog_id', $id)->update($seoData);
            }else{
                Seo::create($seoData);
            }

            toastr()->success('Blog Updated Successfully!');

        }

        return redirect()->route('admin.blog.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::where('id', $id)->delete();
        toastr()->success('Faq Deleted Successfully!');
        return redirect()->back();

    }

    public function deleteFaq($id)
    {
        $faq = Faq::where('id', $id)->delete();
        toastr()->success('Faq Deleted Successfully!');
        return redirect()->back();

    }


    public function storeDetailSection(Request $request){

        $faq = Faq::where('section_type', 'section_detial')->first();

        $data['section_type'] = 'section_detial';
        $data['heading'] = $request->heading;
        $data['description'] = $request->description;

        if($faq){
            $faq->update($data);
            toastr()->success('Faq Detail Section Updated Successfully!');
        }else{
            Faq::create($data);
            toastr()->success('Faq Detail Section Created Successfully!');
        }

        return redirect()->route('admin.faq.detail-section');
    }




}
