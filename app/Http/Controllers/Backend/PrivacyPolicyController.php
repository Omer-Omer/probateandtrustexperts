<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Seo;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $privacy_policy_list = PrivacyPolicy::get();
        // return 1;
        $privacyPage = Page::where('type', 'privacy_policy')->get();
        $banner_section = [];
        $sec_one = [];

        foreach($privacyPage as $k => $p){
            if($p->section_type == 'banner_section') {
                $banner_section = $p;
            }elseif($p->section_type == 'section_one'){
                $sec_one = $p;
            }
        }


        $seo = Seo::where('page', 'privacy_policy')->first();
        return view('backend.privacy_policy.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.privacy_policy.add');
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
                ['type' => 'privacy_policy', 'section_type' => 'banner_section'],
                [
                    'section_images' => isset($data['section_image']) ? $data['section_image'] : NULL,
                ]
            );
        }

        if(isset($request->sec_one_heading) || isset($request->sec_one_description)) {
            Page::updateOrCreate(
                ['type' => 'privacy_policy', 'section_type' => 'section_one'],
                [
                    'section_heading' => isset($request->sec_one_heading) ? $request->sec_one_heading : NULL,
                    'section_description' => isset($request->sec_one_description) ? $request->sec_one_description : NULL,
                ]
            );
        }

        if(isset($request->seo_title) && isset($request->seo_description)) {
            Seo::updateOrCreate(
                ['page' => 'privacy_policy'],
                [
                    'meta_title' => $request->seo_title,
                    'meta_description' => $request->seo_description,
                ]
            );
        }

        toastr()->success('Privacy Policy Created Successfully!');
        return redirect()->back();


        // toastr()->success('Privacy Policy Created Successfully!');
        // return redirect()->route('admin.privacy-policy.index');
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
        $privacy_policy = PrivacyPolicy::where('id', $id)->first();
        return view('backend.privacy_policy.edit', get_defined_vars());
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
        $privacy_policy = PrivacyPolicy::where('id', $id)->first();

        $data['heading'] = $request->heading;
        $data['description'] = $request->description;

        $privacy_policy->update($data);

        toastr()->success('Privacy Policy Updated Successfully!');
        return redirect()->route('admin.privacy-policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PrivacyPolicy::where('id', $id)->delete();

        toastr()->success('Privacy Policy Deleted Successfully!');
        return redirect()->route('admin.privacy-policy.index');
    }

    public function deletePrivacyPolicy($id)
    {
        PrivacyPolicy::where('id', $id)->delete();

        toastr()->success('Privacy Policy Deleted Successfully!');
        return redirect()->route('admin.privacy-policy.index');
    }
}
