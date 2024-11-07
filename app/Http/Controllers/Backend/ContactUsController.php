<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section_one = ContactUs::where('section_type', 'section_one')->first();
        $section_two = ContactUs::where('section_type', 'section_two')->first();
        // return $section_one;
        // $contact_us_list = ContactUs::where('section_type', 'section_one')->get();
        return view('backend.contactus.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contactus.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Section One
        if(isset($request->section_type) && $request->section_type == 'section_one'){

            $section_one = ContactUs::where('section_type', 'section_one')->first();
            $data['section_type'] = 'section_one';
            $data['image_text'] = $request->banner_image_text;

            if($request->hasFile('banner_image')){
                $image = $request->file('banner_image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('upload/banner/'),$imageName);
                $data['image'] = 'upload/banner/'.$imageName;
            }
            if($section_one){
                ContactUs::where('section_type', 'section_one')->update($data);
            }else{
                ContactUs::create($data);
            }

        }

        if(isset($request->section_type) && $request->section_type == 'section_two'){
            $section_two = ContactUs::where('section_type', 'section_two')->first();
            $data['section_type'] = 'section_two';
            $data['heading'] = $request->heading;
            $data['description'] = $request->description;

            if($section_two){
                ContactUs::where('section_type', 'section_two')->update($data);
            }else{
                ContactUs::create($data);
            }

        }

        toastr()->success('Contact Us Created Successfully!');
        return redirect()->route('admin.contact-us.index');
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
        $contact_us = ContactUs::where('id', $id)->first();
        return view('backend.contactus.edit', get_defined_vars());
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
        $contact_us = ContactUs::where('id', $id)->where('section_type', 'section_one')->first();

        $data['section_type'] = 'section_one';
        $data['heading'] = $request->heading;
        $data['description'] = $request->description;

        if($contact_us){
            $contact_us->update($data);
            toastr()->success('Contact Us Updated Successfully!');
        }else{
            ContactUs::create($data);
            toastr()->success('Contact Us Created Successfully!');
        }

        return redirect()->route('admin.contact-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactUs::where('id', $id)->delete();
        toastr()->success('Contact Us Deleted Successfully!');
        return redirect()->back();
    }

    public function deleteContactUs($id)
    {
        ContactUs::where('id', $id)->delete();
        toastr()->success('Contact Us Deleted Successfully!');
        return redirect()->back();
    }

    public function contactFormList(){
        $contact_form_list =  ContactUs::where('section_type', 'section_contact_us_form')->get();
        return view('backend.contactus.contact_form_list', get_defined_vars());
    }
}
