<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermOfUse as TermOfUseModel;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Seo;

class TermOfUse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termAndConditions = Page::where('type', 'term_and_conditions')->get();
        $banner_section = [];
        $sec_one = [];

        foreach($termAndConditions as $k => $p){
            if($p->section_type == 'banner_section') {
                $banner_section = $p;
            }elseif($p->section_type == 'section_one'){
                $sec_one = $p;
            }
        }


        $seo = Seo::where('page', 'term_and_conditions')->first();
        // return $term_of_use_list;
        return view('backend.term_of_use.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.term_of_use.add');
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
        if(isset($request->banner_image) && $request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('upload/banner/'),$imageName);
            $data['section_image'] = 'upload/banner/'.$imageName;

            Page::updateOrCreate(
                ['type' => 'term_and_conditions', 'section_type' => 'banner_section'],
                [
                    'section_images' => isset($data['section_image']) ? $data['section_image'] : NULL,
                ]
            );
        }

        if(isset($request->sec_one_heading) || isset($request->sec_one_description)) {
            Page::updateOrCreate(
                ['type' => 'term_and_conditions', 'section_type' => 'section_one'],
                [
                    'section_heading' => isset($request->sec_one_heading) ? $request->sec_one_heading : NULL,
                    'section_description' => isset($request->sec_one_description) ? $request->sec_one_description : NULL,
                ]
            );
        }

        if(isset($request->seo_title) && isset($request->seo_description)) {
            Seo::updateOrCreate(
                ['page' => 'term_and_conditions'],
                [
                    'meta_title' => $request->seo_title,
                    'meta_description' => $request->seo_description,
                ]
            );
        }

        toastr()->success('Term And Conditions save successfully!');
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
        $termOfUse = TermOfUseModel::where('id', $id)->first();
        return view('backend.term_of_use.edit', get_defined_vars());
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
        $termOfUse = TermOfUseModel::where('id', $id)->first();

        $data['heading'] = $request->heading;
        $data['description'] = $request->description;

        $termOfUse->update($data);

        toastr()->success('FAQ Updated Successfully!');
        return redirect()->route('admin.term-of-use.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TermOfUseModel::where('id', $id)->delete();

        toastr()->success('FAQ Deleted Successfully!');
        return redirect()->route('admin.term-of-use.index');
    }

    public function deleteTermOfUse($id)
    {
        TermOfUseModel::where('id', $id)->delete();

        toastr()->success('FAQ Deleted Successfully!');
        return redirect()->route('admin.term-of-use.index');
    }
}
