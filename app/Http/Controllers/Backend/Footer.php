<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer as FooterModel;
use Illuminate\Http\Request;

class Footer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = FooterModel::where('type', 'footer')->first();
        return view('backend.setting.footer.index', get_defined_vars());
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

    public function uploadFooterLogo(Request $request)
    {
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $file_name = $image->getClientOriginalName();
            $image->move(public_path('upload/logo'), $file_name);
            $data['logo'] = 'upload/logo/'.$file_name;


            $footer = FooterModel::where('type', 'footer')->first();
            if($footer){
                $footer->update($data);
            }else{
                $data['type'] = 'footer';
                FooterModel::create($data);
            }

            toastr()->success('Logo Upload Successfully!');
            return redirect()->back();

        }else{

            toastr()->error('Logo not upload Successfully!');
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['find_us'] = $request->find_us;
        $data['call_us'] = $request->call_us;
        $data['mail_us'] = $request->mail_us;
        $data['copyright'] = $request->copyright;

        $footer = FooterModel::where('type', 'footer')->first();
        if($footer){
            $footer->update($data);
        }else{
            $data['type'] = 'footer';
            FooterModel::create($data);
        }

        toastr()->success('Footer Updated Successfully!');
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
