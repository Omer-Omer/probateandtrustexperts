<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
// use App\Models\CompanyProductCategory;
use App\Models\Product;
use App\Models\ProductCategory;
// use App\Models\ProductSubCategory;
use App\Models\ProductImage;
use App\Models\Seo;
// use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('company','product_images', 'product_category')->orderBy('created_at')->get();
        // dd($products);

        // foreach($products as $k=>  $p){
        //     $randomNumber = rand(1, 10000);
        //     $data['sku'] = 'sku-' . $randomNumber;

        //     $p->update($data);
        // }

        return view('backend.product.index', get_defined_vars());
    }

    public function productListing()
    {
        $products = Product::with('company','product_images', 'product_category')->latest()->get();
        return view('backend.product.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'Yes';
        // $companies = Company::get();
        $companies = Company::get();
        $product_categories = ProductCategory::get();
        // dd($product_categories);
        return view('backend.product.create', get_defined_vars());
    }

    public function companyProductCreate($companyId)
    {
        // return $companyId;
        // $companies = Company::get();
        $companies = Company::get();
        $product_categories = ProductCategory::get();
        // dd($product_categories);
        return view('backend.product.create', get_defined_vars());
    }

    public function getProductCategories(Request $request){

        $product_categories = CompanyProductCategory::where('company_id', $request->company_id)->get();
        return response()->json($product_categories);

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
        $request->validate([
            // 'title' => 'required',
            // 'company_id' => 'required',
            'product_category_id' => 'required',
            // 'sku' => 'required',
            // 'partno' => 'required',
            // 'description' => 'required',
            // 'thumbnail_img' => 'required|image',
            // 'gallery_images' => 'required|image',
            // 'image' => 'required|image|size:1024||dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            // 'price' => 'required',
            // 'quantity' => 'required',
        ]);

        // $data['company_id'] = $request->company_id;
        $data['product_category_id'] = $request->product_category_id;
        $data['title'] = $request->title;
        $data['sku'] = $request->sku;
        $data['description'] = $request->description;


        $data['show_on_card'] = 0;
        if ($request->has('show_on_card')) {
            $data['show_on_card'] = 1;
        }

        $data['show_on_page'] = 0;
        if ($request->has('show_on_page')) {
            $data['show_on_page'] = 1;
        }

        // $data['product_sub_category_id'] = $request->product_sub_category_id;
        // $data['sku'] = $request->sku;
        // $data['partno'] = $request->partno;
        // $data['price'] = $request->price;
        // $data['quantity'] = $request->quantity;

        if($request->hasFile('thumbnail_img')){
            $image = $request->file('thumbnail_img');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/product/thumbnail/'), $file_name);
            $data['thumbnail_image'] = 'upload/product/thumbnail/'.$file_name;
        }

        // $data['fabric_id'] = $request->fabric_id;
        // $data['content'] = $request->content;
        // $data['made_in_id'] = $request->made_in_id;
        $data['date'] = date('Y-m-d');

        $created = Product::create($data);

        $product_img_data['product_id'] = $created->id;
        $product_img_data['image_type'] = 'gallery';

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $image)
            {

                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/product/'.date('Y-m').'/'), $file_name);
                $product_img_data['image'] = 'upload/product/'.date('Y-m').'/'.$file_name;
                ProductImage::create($product_img_data);
            }
        }

        // dd($data);
        if(isset($created)) {
            $seo['product_id'] = $created->id;
            $seo['meta_title'] = isset($request->meta_title) ? $request->meta_title : NULL;
            $seo['meta_description'] = isset($request->meta_description) ? $request->meta_description : NULL;
            $seo['meta_tags'] = isset($request->meta_tags) ? $request->meta_tags : NULL;
            Seo::create($seo);
        }

        toastr()->success('Product created successfully!');
        // return redirect()->route('product.index');
        return redirect()->route('product.index');

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
        $companies = Company::get();
        $productCategories = ProductCategory::get();

        $product = Product::where('id', $id)->with('company', 'product_category', 'product_images')->first();
        // $product = Product::where('id', $id)->with('product_images')->first();
        $seo = Seo::where('product_id', $id)->first();
        // return $product;
        return view('backend.product.edit', get_defined_vars());
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
        // return $request->all();

        $request->validate([
            // 'title' => 'required',
            // 'company_id' => 'required',
            'product_category_id' => 'required',
            // 'sku' => 'required',
            // 'partno' => 'required',
            // 'description' => 'required',
            // 'thumbnail_img' => 'required|image',
            // 'gallery_images' => 'required|image',
            // 'image' => 'required|image|size:1024||dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            // 'price' => 'required',
            // 'quantity' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['sku'] = $request->sku;
        // $data['company_id'] = $request->company_id;
        $data['description'] = $request->description;
        $data['product_category_id'] = $request->product_category_id;

        // $data['product_sub_category_id'] = $request->product_sub_category_id;
        // $data['sku'] = $request->sku;
        // $data['partno'] = $request->partno;
        // $data['price'] = $request->price;
        // $data['quantity'] = $request->quantity;

        if($request->hasFile('thumbnail_img')){
            $image = $request->file('thumbnail_img');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/product/thumbnail/'), $file_name);
            $data['thumbnail_image'] = 'upload/product/thumbnail/'.$file_name;
        }

        // $data['fabric_id'] = $request->fabric_id;
        // $data['content'] = $request->content;
        // $data['made_in_id'] = $request->made_in_id;
        $data['date'] = date('Y-m-d');

        $data['show_on_card'] = 0;
        if ($request->has('show_on_card')) {
            $data['show_on_card'] = 1;
        }

        $data['show_on_page'] = 0;
        if ($request->has('show_on_page')) {
            $data['show_on_page'] = 1;
        }

        Product::where('id', $id)->update($data);

        if(isset($id)) {
            $seo['product_id'] = $id;
            $seo['meta_title'] = isset($request->meta_title) ? $request->meta_title : NULL;
            $seo['meta_description'] = isset($request->meta_description) ? $request->meta_description : NULL;
            $seo['meta_tags'] = isset($request->meta_tags) ? $request->meta_tags : NULL;
            Seo::create($seo);
        }

        $product_img_data['product_id'] = $id;
        $product_img_data['image_type'] = 'gallery';

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $image)
            {

                $orignalImageName = strtolower(trim($image->getClientOriginalName()));
                $file_name = time().rand(100,999).$orignalImageName;
                $image->move(public_path('upload/product/'.date('Y-m').'/'), $file_name);
                $product_img_data['image'] = 'upload/product/'.date('Y-m').'/'.$file_name;
                ProductImage::create($product_img_data);
            }

        }

        toastr()->success('Product updated successfully!');
        // return redirect()->route('product.index');
        // return redirect()->route('admin.company.edit', $request->company_id);
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        toastr()->success('Product deleted successfully!');

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $product = Product::where('id', $id)->with('product_images')->first();
        // dd($product);
        $productImages = $product->product_images;
        foreach($productImages as $value) {
            $productImage = ProductImage::where('product_id', $value->product_id)->first();
            // dd($productImage);
            $image_path = public_path($productImage->image);

            if(file_exists($image_path)){
                File::delete( $image_path);
            }
            $productImage->delete();
        }

        if(isset($product->thumbnail_image)) {
            $image_path = public_path($product->thumbnail_image);
            if(file_exists($image_path)){
                File::delete( $image_path);
            }
        }

        $product->delete();

        toastr()->success('Product deleted successfully!');
        return redirect()->back();
    }


    // Delete Gallery Image
    public function deleteSingleGalleryImage($id){

        $productImage = ProductImage::findOrFail($id);
        $image_path = public_path($productImage->img_url);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $productImage->delete();
        toastr()->success('Product Gallery Image Deleted Successfully!');
        return redirect()->back();
    }


    // Delete Thumbnail Image
    public function deleteThumbnailImage($id){

        $product = Product::findOrFail($id);
        $image_path = public_path($product->thumbnail_image);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $product->update([
            'thumbnail_image' => null,
        ]);


        toastr()->success('Product Thumbnail Image Deleted Successfully!');
        return redirect()->back();
    }


    public function getSubCategories($categoryId){
        // Log::info("get category: " . json_encode($request->all()));
        $subcategories = ProductSubCategory::where('category_id', $categoryId)->get();
        // return $subcategories;
        return response()->json($subcategories);
        // return response()->json($subcategories, 200);
    }

    // Product Category
    public function indexProductCategories(){

    }

    public function showProductCategories(){
        // dd('Yes');
        $product_categories = ProductCategory::get();
        return view('backend.product_category.index', get_defined_vars());
    }

    public function createProductCategory(){
        return view('backend.product_category.create');
    }

    function cleanAndFormatString($inputString) {
        // Remove extra spaces and replace slash and space with a single dash
        $formattedString = preg_replace('/[^a-zA-Z0-9]+/', '-', $inputString);
        $formattedString = strtolower($formattedString);
        return $formattedString;
    }

    public function storeProductCategory(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $slug = $this->cleanAndFormatString($request->name);
        // return $name;

        if($request->hasFile('icon')){
            $image = $request->file('icon');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/category/'), $file_name);
            $data['icon'] = 'upload/category/'.$file_name;
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $orignalImageName = strtolower(trim($image->getClientOriginalName()));
            $file_name = time().rand(100,999).$orignalImageName;
            $image->move(public_path('upload/category/'), $file_name);
            $data['image'] = 'upload/category/'.$file_name;
        }

        $data['slug'] = $slug ?? Null;
        $data['name'] = $request->name ?? Null;
        ProductCategory::create($data);

        // dd($request->all());
        // ProductCategory::create($request->all());
        toastr()->success('Product Category created successfully!');
        return redirect()->route('product.categories.show');
    }

    public function editProductCategory($id)
    {
        $product_category = ProductCategory::where('id', $id)->first();
        return view('backend.product_category.edit', get_defined_vars());
    }

    public function updateProductCategory(Request $request, $id)
    {

        $product_category = ProductCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $slug = $this->cleanAndFormatString($request->name);

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

        $data['slug'] = $slug ?? Null;

        $data['name'] = $request->name ?? Null;
        $product_category->update($data);

        toastr()->success('Product Category updated successfully!');
        return redirect()->route('product.categories.show');

    }

    public function deleteProductCategory($id)
    {
        $product = ProductCategory::where('id', $id)->first();
        $product->delete();
        toastr()->success('Product Category deleted successfully!');

        return redirect()->back();
    }


    // Product Sub Category
    public function showSubProductCategories(){
        // dd('Yes');
        $subcategories = ProductSubCategory::with('product_category')->get();

        // dd($subcategories);
        return view('backend.product_sub_category.index', get_defined_vars());
    }

    public function createSubProductCategory(){
        $product_categories = ProductCategory::get();
        // dd($product_categories);
        return view('backend.product_sub_category.create', get_defined_vars());
    }

    public function storeSubProductCategory(Request $request){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        // dd($request->all());
        // $request->except('_token');

        $data['category_id'] = $request->category_id;
        $data['name'] = $request->name;
        // dd($request->all());
        ProductSubCategory::create($data);
        toastr()->success('Product Sub Category created successfully!');
        return redirect()->route('product.subcategories.show');
    }

    public function editSubProductCategory($id)
    {
        $product_categories = ProductCategory::get();
        $subcategory = ProductSubCategory::where('id', $id)->first();
        return view('backend.product_sub_category.edit', get_defined_vars());
    }

    public function updateSubProductCategory(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $data['category_id'] = $request->category_id;
        $data['name'] = $request->name;
        // dd($request->all());

        ProductSubCategory::where('id', $id)->update($data);

        toastr()->success('Product Sub Category updated successfully!');
        return redirect()->route('product.subcategories.show');

    }

    public function deleteSubProductCategory($id)
    {
        $product = ProductSubCategory::where('id', $id)->first();
        $product->delete();
        toastr()->success('Product Sub Category deleted successfully!');

        return redirect()->back();
    }

    public function orders() {
        $orders = Order::get();

        // return $orders;
        return view('backend.product.order', get_defined_vars());
    }

    public function orderDetails($id) {
        $order = Order::where('id', $id)->first();
        $productIDs = json_decode($order->product_id);
        $quantity = json_decode($order->quantity);
        // dd($productIDs);
        foreach($productIDs as $key => $pro) {
            // dd($pro);
            $p = Product::where('id', $pro)->first();
            $p->qty= $quantity[$key];
            $products[] =$p;
        }

        // dd($products);
        // return $orders;

        return view('backend.product.order_details', get_defined_vars());
    }

    public function orderStatus($id, $status) {
        // return $status;
        Order::where('id', $id)->update([
            'status' => $status,
        ]);

        toastr()->success('Order status change successfully!');
        return redirect()->back();
    }
}
