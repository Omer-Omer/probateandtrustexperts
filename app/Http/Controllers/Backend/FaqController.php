<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq_list = Faq::get();
        return view('backend.faq.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['section_type'] = 'section_one';
        $data['heading'] = $request->heading;
        $data['description'] = $request->description;

        Faq::create($data);
        toastr()->success('Faq Created Successfully!');

        return redirect()->route('admin.faq.index');
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
        $faq = Faq::where('id', $id)->first();
        return view('backend.faq.edit', get_defined_vars());
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
        $faq = Faq::where('id', $id)->first();

        if($faq){

            $data['section_type'] = 'section_one';
            $data['heading'] = $request->heading;
            $data['description'] = $request->description;

            $faq->update($data);
            toastr()->success('Faq Updated Successfully!');

        }

        return redirect()->route('admin.faq.index');
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

    public function detailSection() {
        $faq = Faq::where('section_type', 'section_detial')->first();
        // return $faq;
        return view('backend.faq.detail_section', get_defined_vars());
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

    public function haveQuestionList(){
        $have_question_list = Faq::where('section_type', 'section_have_question_form')->get();
        // return $faq;
        return view('backend.faq.have_question_list', get_defined_vars());
    }

}
