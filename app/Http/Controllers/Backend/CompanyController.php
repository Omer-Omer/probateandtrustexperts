<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get();
        // dd($products);
        return view('backend.company.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company.create', get_defined_vars());
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
        $data = $request->except(['_token']);

        if($request->hasFile('banner')){
            $image = $request->file('banner');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/company/'), $file_name);
            $data['banner'] = 'upload/company/'.$file_name;
        }

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/company/'), $file_name);
            $data['logo'] = 'upload/company/'.$file_name;
        }

        Company::create($data);
        toastr()->success('Company created successfully!');
        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('id', $id)->first();

        return view('backend.company.edit', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        $products = Product::where('company_id', $id)->with('company','product_images', 'product_category')->get();
        return view('backend.company.edit', get_defined_vars());
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
        $company = Company::where('id', $id)->first();
        $data = $request->except(['_token']);

        if($request->hasFile('banner')){
            $image = $request->file('banner');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/company/'), $file_name);
            $data['banner'] = 'upload/company/'.$file_name;
        }

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/company/'), $file_name);
            $data['logo'] = 'upload/company/'.$file_name;
        }

        $company->update($data);
        toastr()->success('Company updated successfully!');
        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('company_id', $id)->with('product_images')->delete();
        Company::where('id', $id)->delete();

        toastr()->success('Company Deleted successfully!');
        return redirect()->route('admin.company.index');
    }
}
