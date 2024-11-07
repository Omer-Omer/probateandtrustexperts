<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Header as HeaderModel;
use Illuminate\Http\Request;

class Header extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = HeaderModel::where('type', 'header')->first();
        return view('backend.setting.header.index', get_defined_vars());
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
    public function uploadHeaderLogo(Request $request)
    {
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $file_name = $image->getClientOriginalName();
            $image->move(public_path('upload/logo'), $file_name);
            $data['logo'] = 'upload/logo/'.$file_name;


            $header = HeaderModel::where('type', 'header')->first();
            if($header){
                $header->update($data);
            }else{
                $data['type'] = 'header';
                HeaderModel::create($data);
            }

            toastr()->success('Logo Upload Successfully!');
            return redirect()->back();

        }else{

            toastr()->error('Logo not upload Successfully!');
            return redirect()->back();
        }

    }

    public function store(Request $request)
    {
        $data['slogan'] = $request->slogan ?? '';
        $data['menu_one'] = $request->menu_one ?? '';
        $data['menu_two'] = $request->menu_two ?? '';
        $data['menu_three'] = $request->menu_three ?? '';
        $data['menu_four'] = $request->menu_four ?? '';
        $data['menu_five'] = $request->menu_five ?? '';
        $data['menu_six'] = $request->menu_six ?? '';

        $header = HeaderModel::where('type', 'header')->first();
        if($header){
            $header->update($data);
        }else{
            $data['type'] = 'header';
            HeaderModel::create($data);
        }

        toastr()->success('Header Updated Successfully!');
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
