<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $portfolio = Portfolio::orderBy('ordering')->get();
        $seo = Seo::where('page', 'aboutus')->first();

        return view('backend.portfolio.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['title'] = $request->title ?? null;

        if($request->hasFile('thumbnail_image')){
            $image = $request->file('thumbnail_image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/portfolio/'), $file_name);
            $data['thumbnail'] = 'upload/portfolio/'.$file_name;
        }

        if($request->hasFile('document')){
            $image = $request->file('document');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/portfolio/'), $file_name);
            $data['document'] = 'upload/portfolio/'.$file_name;
        }


        $data['show_download_button'] = 0;
        if ($request->has('show_download_button')) {
            $data['show_download_button'] = 1;
        }

        Portfolio::create($data);
        toastr()->success('portfolio created Successfully!');
        // return redirect()->back();
        return redirect()->route('admin.portfolio.index');

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
        $portfolio = Portfolio::where('id', $id)->first();
        return view('backend.portfolio.edit', get_defined_vars());
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

        $data['title'] = $request->title ?? null;

        if($request->hasFile('thumbnail_image')){
            $image = $request->file('thumbnail_image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/portfolio/'), $file_name);
            $data['thumbnail'] = 'upload/portfolio/'.$file_name;
        }

        if($request->hasFile('document')){
            $image = $request->file('document');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/portfolio/'), $file_name);
            $data['document'] = 'upload/portfolio/'.$file_name;
        }


        $data['show_download_button'] = 0;
        if ($request->has('show_download_button')) {
            $data['show_download_button'] = 1;
        }

        Portfolio::where('id', $id)->update($data);
        toastr()->success('Portfolio updated Successfully!');
        // return redirect()->back();
        return redirect()->route('admin.portfolio.index');
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


    public function updatePortfolioOrder(Request $request){
        $newOrder = $request->input('order');
        foreach ($newOrder as $index => $id) {
            Portfolio::where('id', $id)->update(['ordering' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        // dd($portfolio);

        if(isset($portfolio->thumbnail)) {
            $image_path = public_path($portfolio->thumbnail);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
        }
        if(isset($portfolio->document)) {
            $image_path = public_path($portfolio->document);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
        }

        $portfolio->delete();

        toastr()->success('Portfolio deleted successfully!');
        return redirect()->back();
    }
}
