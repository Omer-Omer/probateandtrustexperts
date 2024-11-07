<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Company;
use App\Models\CompanyContactForm;
use App\Models\CompanyProductCategory;
use App\Models\ProductCategory;
use App\Models\Home as HomeModel;
use App\Models\ProductCategories;
use App\Models\User;
use App\Models\Configuration;
use File;

class Setting extends Controller
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

    public function configuration(){
        // $users = User::where('role', 2)->get();
        $configurations = Configuration::get();
        return view('backend.setting.configuration.index', get_defined_vars());
    }

    public function createConfiguration(){
        // $users = User::where('role', 2)->get();

        return view('backend.setting.configuration.add', get_defined_vars());
    }

    public function storeConfiguration(Request $request){

        // return $request->hasFile('logo');
        // dd($request->all());
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        $data['key'] = $request->key ?? Null;
        $data['value'] = $request->value ?? Null;
        // return $data;
        Configuration::create($data);

        toastr()->success('Configuration added Successfully!');
        return redirect()->route('configuration');
    }

    public function editConfiguration($id) {
        $config = Configuration::where('id', $id)->first();
        return view('backend.setting.configuration.edit', get_defined_vars());
    }

    public function updateConfiguration(Request $request, $id) {
        // dd($request->all());

        $data['key'] = $request->key;
        $data['value'] = $request->value;
        Configuration::where('id', $id)->update($data);

        toastr()->success('Configuration updated Successfully!');
        return redirect()->route('configuration');
    }


    public function viewUsers(){
        $users = User::where('role', 2)->get();
        return view('backend.setting.user.index', get_defined_vars());
    }

    public function addUser(){
//        $product_categories = ProductCategory::get();
        return view('backend.setting.user.add', get_defined_vars());
    }

    public function storeUser(Request $request){

//         return $request->all();

        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $profileImage = $image->getClientOriginalName();
            $image->move(public_path('upload/profile'), $profileImage);
            $data['profile_image'] = 'upload/profile/'.$profileImage;
        }

        $data['role'] = 2;
        $data['name'] = $request->name ?? '';
        $data['email'] = $request->email ?? '';
        $data['description'] = $request->description ?? '';

        User::create($data);

        toastr()->success('User Added Successfully!');
        return redirect()->route('view-users');
    }

    public function editUser($id){
        $user = User::where('id', $id)->first();
        // $product_categories = ProductCategory::get();
        // $company_product_categories = CompanyProductCategory::get();

        // return $company_product_categories;
        return view('backend.setting.user.edit', get_defined_vars());
    }

    public function updateUser(Request $request, $id){
        $user = User::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $profileImage = $image->getClientOriginalName();
            $image->move(public_path('upload/profile'), $profileImage);
            $data['profile_image'] = 'upload/profile/'.$profileImage;
        }

        $data['name'] = $request->name ?? '';
        $data['email'] = $request->email ?? '';
        $data['description'] = $request->description ?? '';

        $user->update($data);

        toastr()->success('Company updated Successfully!');
        return redirect()->route('view-users');
    }

    public function deleteUser($id){

        $user = User::find($id);
        $user->delete();

        toastr()->success('Company deleted Successfully!');
        return redirect()->route('view-users');
    }



    // Product Categories
    public function viewProductCategories(){
        $product_categories = ProductCategory::get();
        return view('backend.setting.product_category.index', get_defined_vars());
    }

    public function addProductCategory(){
        return view('backend.setting.product_category.add');
    }

    public function storeProductCategory(Request $request){
        // return $request->hasFile('logo');

        $request->validate([
            'name' => 'required',
        ]);



        $data['name'] = $request->name ?? '';
        ProductCategory::create($data);

        toastr()->success('Product Category Added Successfully!');
        return redirect()->route('view-product-categories');
    }

    public function editProductCategory($id){
        $product_category = ProductCategory::where('id', $id)->first();
        return view('backend.setting.product_category.edit', get_defined_vars());
    }

    public function updateProductCategory(Request $request, $id){
        // dd($request->all());
        $product_category = ProductCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('icon')){

            $image_path = public_path($product_category->icon);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
            $product_category->update(['icon' => NULL]);

            $image = $request->file('icon');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/category/'), $file_name);
            $data['icon'] = 'upload/category/'.$file_name;
        }

        if($request->hasFile('image')){
            $image_path = public_path($product_category->image);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
            $product_category->update(['image' => NULL]);

            $image = $request->file('image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/category/'), $file_name);
            $data['image'] = 'upload/category/'.$file_name;
        }

        $data['name'] = $request->name ?? '';
        $product_category->update($data);

        toastr()->success('Product Category updated Successfully!');
        return redirect()->route('view-product-categories');
    }

    public function deleteProductCategory($id){

        $product_category = ProductCategory::find($id);
        $product_category->delete();

        toastr()->success('Product Category deleted Successfully!');
        return redirect()->route('view-product-categories');
    }

    public function companyContactList(){

        $company_contact_list = CompanyContactForm::with('company')->get();
        // return $company_contact_list;
        return view('backend.setting.company.contact_list', get_defined_vars());
    }

}

