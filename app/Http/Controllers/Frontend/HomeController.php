<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AboutUs as ModelsAboutUs;
use App\Models\Company;
use App\Models\CompanyContactForm;
use App\Models\ContactUs;
use App\Models\Vendor;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Feedback;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Home;
use App\Models\Media;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\TermOfUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyInfoMail;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Seo;
use App\Models\Order;
use App\Models\Configuration;
use App\Models\NewFormSubmission;
use App\Rules\Recaptcha;
use Log;
use Validator;
use Response;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $header = Header::where('type', 'header')->first();
        // $footer = Footer::where('type', 'footer')->first();

        $page = Page::where('type', 'home')->get();

        $banner_section;
        $category_section;
        $aboutus_section;
        $partner_section;

        foreach ($page as $p) {
            if($p->section_type == 'banner_section') {
                $banner_section = $p;
            }elseif($p->section_type == 'category_section'){
                $category_section = $p;
            }elseif($p->section_type == 'aboutus_section'){
                $aboutus_section = $p;
            }
        }

        $partner_section = Gallery::where('type', 'partner_logo')->get();

        $seo = Seo::where('page', 'contactus')->first();
        $product_categories = ProductCategory::get();

        return view('frontend.home', get_defined_vars());
    }

    public function home(){
        $product_categories = array();
        $product = array();

        // $productCategories = ProductCategory::with('products.company', 'products.product_images')->get();
        // $products = Product::with('company', 'product_category')->limit(12)->get();
        // return $products;
        // $viewProductCategories = ProductCategory::with('products.company', 'products.product_images')->get();

        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);

        $textUnderBanner = Page::where('type', 'home')->where('section_type', 'textUnderBanner')->first();
        $bannerImages = Gallery::where('type', 'banner_images')->get();

        // return $productCategories;
        return view('frontend.home', get_defined_vars());
    }

    public function homePage(){
        $product_categories = array();
        $product = array();


        return view('frontend.homePage', get_defined_vars());
    }

    public function category(){
        $product_categories = array();
        $product = array();
        return view('frontend.category', get_defined_vars());
    }

    public function dynamicCategory($name){
        // return $name;
        // $name = str_replace('-', ' ', $name);

        // $product_category = ProductCategory::where('slug', $name)->first();
        // $productCategoryId = $product_category->id;

        // $companies = Company::with(['products.product_images' => function ($query) use ($productCategoryId) {
        //     $query->where('product_category_id', $productCategoryId);
        // }])->get();

        // $companies = Company::with(['products' => function ($query) use ($productCategoryId) {
        //     $query->where('product_category_id', $productCategoryId)
        //           ->with(['product_images']);
        // }])->get();

        $productCategory = ProductCategory::where('slug', $name)
        ->with(['products.company', 'products.product_images'])
        ->first();

        $products = $productCategory->products()->paginate(1000);


        // dd($productCategories);

        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        // return $companies;
        return view('frontend.category', get_defined_vars());
    }

    public function searchProducts(Request $request) {

        // return $request->all();
        $company_id = $request->company_id;
        $product = $request->product;
        $location = $request->location;

        $query = Product::query();
        $query->with('company', 'product_images');

        // Check if company is provided
        if ($company_id) {
            $query->where('company_id', $company_id);
        }

        // Check if product is provided
        if ($product !== null) {
            $query->where('title', 'LIKE', '%' . $product . '%');
        }

        if ($location !== null) {
            $query->whereHas('company', function ($q) use ($location) {
                $q->where('location', 'LIKE', '%' . $location . '%');
            });
        }

        $products = $query->get();
        // return $products;

        return view('frontend.search-products', compact('products', 'company_id', 'product', 'location'));

    }

    public function dynamicCompany($name){
        $name = str_replace('-', ' ', $name);
        $company = Company::where('name', $name)->with('products')->first();
        // return $company;
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.company', get_defined_vars());
    }

    public function company(){
        $product_categories = array();
        $product = array();
        return view('frontend.company', get_defined_vars());
    }

    public function myformPost(Request $request){

        // Setup the validator
        $rules = array(
            'company_name' => 'required',
            'person_name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        // return $request;

        $data = $request->except('_token', 'g-recaptcha-response');
        // return $data;

        NewFormSubmission::create($data);

        $company = Company::where('id', $request->company_id)->first();
        $email_to = $company->email ?? 'umar@yopmail.com';
        // $email_to = 'umar@yopmail.com';
        // $email_from = Configuration::where('key', 'email_from')->first();
        // $email_from = $email_from->value;
        $email_from = config('app.email_from');

        $subject = 'Query Submitted by ' . $data['person_name'];
        $name = $data['person_name'];

        Log::info($email_from);
        Log::info($email_to);
        Log::info($data);
        // return $data;
        $result = Mail::send('frontend.emails.mail', $data, function($message) use ($name, $email_to, $subject, $email_from) {
            $message->to($email_to, $name)
            ->subject($subject);
            $message->from($email_from, config('app.name'));
        });
        Log::info($result);
        // $users= array();
        // $users[0]['name'] =  isset($request->first_name) ? $request->first_name : 'Name not found';
        // $users[0]['email'] = isset($email_to->value) ? $email_to->value : 'info@bmwe36m3.com';
        // $users[0]['subject'] = 'BMW - Vehicle Details submitted By '. $request->first_name;
        // $users[0]['type'] = 1; // admin

        // $users[1]['name'] = 'BMW';
        // $users[1]['email'] = isset($request->email) ? $request->email : '';
        // $users[1]['subject'] = 'BMW - Thank You for Your Form Submission';
        // $users[1]['type'] = 0; // customer

        // foreach($users as $user){
        //     $to_name = $user['name'];
        //     $to_email = $user['email'];
        //     $subject = $user['subject'];
        //     $type = $user['type'];
        //     if($type == 1) { //admin
        //         Mail::send('frontend.emails.mail', $data, function($message) use ($to_name, $to_email, $subject, $from_email) {
        //             $message->to($to_email, $to_name)
        //             ->subject($subject);
        //             // $message->from('info@bmwe36m3.com','Test Mail');
        //             $message->from($from_email,'BMW');
        //         });
        //     }else{
        //         Mail::send('frontend.emails.customer_mail', $data, function($message) use ($to_name, $to_email, $subject, $from_email) {
        //             $message->to($to_email, $to_name)
        //             ->subject($subject);
        //             // $message->from('info@bmwe36m3.com','Test Mail');
        //             $message->from($from_email,'BMW');
        //         });
        //     }

        // }

        return Response::json(array('success' => true), 200);

    }
    public function submitForm(Request $request){

        // Setup the validator
        $rules = array(
            // 'company_name' => 'required',
            'person_name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        // return $request;

        $data = $request->except('_token', 'g-recaptcha-response');
        // return $data;
        $formData['json'] = json_encode($data);
        $formData['form_type'] = $request->form_type ?? Null;
        NewFormSubmission::create($formData);

        $email_to = 'umar@yopmail.com';
        $config = Configuration::where('key', 'email_to')->first();
        if(isset($config)) {
            $email_to = $config->value;
        }

        $email_from = config('app.email_from');

        $subject = 'Query Submitted by ' . $data['person_name'];
        $name = $data['person_name'];
        $data['comment'] = $request->message ?? null;

        Mail::send('frontend.emails.mail', $data, function($message) use ($name, $email_to, $subject, $email_from) {
            $message->to($email_to, $name)
            ->subject($subject);
            $message->from($email_from, config('app.name'));
        });

        return Response::json(array('success' => true), 200);
    }


    public function comingSoon(){
        $product_categories = array();
        $product = array();
        return view('frontend.comingsoon', get_defined_vars());
    }

    public function latest() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.pages', get_defined_vars());
    }

    public function pallets() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.pages', get_defined_vars());
    }

    public function deals() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.pages', get_defined_vars());
    }

    public function events() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.events', get_defined_vars());
    }

    public function services() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.services', get_defined_vars());
    }

    public function vendors() {
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        $page = Page::where(['type' => 'vendor','section_type' => 'description_section'])->first();
        return view('frontend.vendors', get_defined_vars());
    }

    public function gallery() {
        $galleryImagers = Gallery::where('type', 'gallery')->get();
        return view('frontend.gallery', get_defined_vars());
    }

    public function contactUs()
    {
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);

        $page = Page::where(['type' => 'contactus','section_type' => 'description_section'])->first();
        return view('frontend.contactus', get_defined_vars());
    }

    public function policy()
    {
        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);

        $page = Page::where(['type' => 'contactus','section_type' => 'policy'])->first();
        return view('frontend.policy', get_defined_vars());
    }
    public function detail($id)
    {
        $product = Product::where('id', $id)->with('product_category','product_images')->first();
        // return $category;

        $categories = array();
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.detail', get_defined_vars());
    }

    public function returnAndExchange()
    {
        return view('frontend.return_and_exchange', get_defined_vars());
    }

    public function products() {
        $product_categories = ProductCategory::has('products')->limit(6)->get();
        $ppage = Page::where('type', 'product')->get();
        return view('frontend.products', get_defined_vars());
    }

    public function categoryDetail($categoryName) {
        // dd($categoryName);
        $product_categories = ProductCategory::has('products')->limit(6)->get();
        $category= ProductCategory::where('name', str_replace('-', ' ', $categoryName))->first();

        $product = Product::where('product_category_id', $category->id)->first();
        // dd($product);
        return view('frontend.product_detail', get_defined_vars());
    }

    public function productDetail() {

        $product_categories = ProductCategory::has('products')->limit(6)->get();
        return view('frontend.product_detail', get_defined_vars());
    }

    public function categoryListing($id)
    {
        $categories = ProductCategory::with('product_sub_category')->get();

        $products = Product::whereHas('product_sub_category', function($query) use ($id) {
            $query->where('id', '=', $id); }
        )->with('product_category', 'product_sub_category', 'product_images')->get();

        // return view('welcome');
        return view('frontend.listing', get_defined_vars());
    }

    public function subCategoryListing($id)
    {
        $categories = ProductCategory::with('product_sub_category')->get();

        $subCategory = ProductSubCategory::Where('id', $id)->first();
        $products = Product::whereHas('product_sub_category', function($query) use ($id) {
            $query->where('id', '=', $id); }
        )->with('product_category', 'product_sub_category', 'product_images')->get();

        // return view('welcome');
        return view('frontend.listing', get_defined_vars());
    }

    public function itemListing()
    {
        $categories = ProductCategory::with('product_sub_category')->get();

        $products = Product::with('product_category', 'product_sub_category', 'product_images')->get();
        // return view('welcome');
        return view('frontend.listing', get_defined_vars());
    }

    // public function productDetail ($id){
    //     $categories = ProductCategory::with('product_sub_category')->get();
    //     $product = Product::where('id', $id)->with('product_images', 'product_category', 'product_sub_category')->first();
    //     // dd($product);

    //     if(isset($product)) {
    //         $relatedProducts = Product::where('product_category_id', $product->product_category_id)->with('product_images', 'product_category', 'product_sub_category')->get();
    //     }
    //     // dd($relatedProducts);
    //     return view('frontend.preview', get_defined_vars());
    // }

    // For Add to Cart
    public function productDetailsById(Request $request){
        // return $request;
        // $categories = ProductCategory::with('product_sub_category')->get();
        // $product = Product::where('id', $id)->with('product_images', 'product_category', 'product_sub_category')->first();
        // // dd($product);

        // if(isset($product)) {
        //     $relatedProducts = Product::where('product_category_id', $product->product_category_id)->with('product_images', 'product_category', 'product_sub_category')->get();
        // }

        $product = Product::select('id', 'title', 'description', 'thumbnail_image', 'sku')->where('id', $request->productId)->first();

        // dd($relatedProducts);
        return $product;
        // return view('frontend.preview', get_defined_vars());
    }

    public function viewCartItems(Request $request) {
        // return $request->products;
        $showPro = [];
        foreach ($request->products as $value){
            $product = Product::select('id', 'title', 'description', 'thumbnail_image', 'sku')->where('id', $value['productId'])->first();
            $product->qty = $value['productQty'];
            $showPro[] = $product;
        }
        return $showPro;

    }

    public function viewCart(Request $request) {
        $categories = ProductCategory::with('product_sub_category')->get();

        // dd($request->all());
        // return json_encode($request->viewCartProducts);
        $products = [];
        $totalProducts = 0;
        if(isset($request->viewCartProducts)) {
            $reqProducts = explode(',', $request->viewCartProducts);
            $totalProducts = count($reqProducts);

            for ($i=0; $i < count($reqProducts); $i++){
                $pro = Product::where('id', $reqProducts[$i])->with('product_images', 'product_category', 'product_sub_category')->get();
                $qty = 'product_'.$reqProducts[$i];
                $pro[0]->qty = $request->$qty;
                $products[] = $pro;

                // dd( $reqProducts[$i]);
                // dd( $products);

                // $products[] = Product::select('id', 'title', 'description', 'thumbnail_image', 'sku')->where('id', $value['productId'])->first();
            }
        }
        // dd($products);
        // foreach ($reqProducts as $value) {
        //     dd($value);
        //     echo $value->id;
        // }
        // dd($products);
        // return $request->all();
        return view('frontend.view_cart', get_defined_vars());
    }

    public function checkout(Request $request) {
        // dd($request->all());
        // echo $request->product_1;
        // echo $request->product_2;
        // echo $request->product_3;
        // die();

        $categories = ProductCategory::with('product_sub_category')->get();

        $products = [];
        if($request->totalProducts > 0) {
            for ($i=1; $i <= $request->totalProducts; $i++){
                // dd($productId);
                $a = 'product_'.$i;

                $productId = $request->$a;
                $pro = Product::where('id', $productId)->with('product_images', 'product_category', 'product_sub_category')->get();

                $q = 'product_qty_'.$productId;
                // echo $request->$q;
                $pro[0]->qty = $request->$q;
                $products[] = $pro;
                // dd($products);
            }
            // die();
        }
        // dd($products);
        return view('frontend.checkout', get_defined_vars());
    }

    public function orderConfirm(Request $request){

        // return $request->all();

        $products = [];
        if(isset($request->totalProducts)) {
            for ($i=1; $i <= $request->totalProducts; $i++){
                $products[] = $request->product_.$i;
                // dd($productId);
                // $products[] = Product::where('id', $productId)->with('product_images', 'product_category', 'product_sub_category')->get();
            }
        }

        $request->request->add(['product_id' => json_encode($request->products)]);
        $request->request->add(['quantity' => json_encode($request->qty)]);
        // $request->request->add(['quantity' => $request->qty]);

        $data = $request->only(['product_id', 'quantity','total_price','first_name', 'last_name', 'address_one', 'address_two', 'company', 'country', 'state', 'city', 'post_code']);

        // return response()->json(['success', $data]);
        $order = Order::create($data);
        if(isset($order)){

            // $to_email = 'dev@luckygoldtravel.pk';
            // $from_email = $request->email;
            // $from_email = 'meharomer50@gmail.com';
            $from_email = Configuration::where('key', 'mail_from')->first();
            $to_email = Configuration::where('key', 'mail_to')->first();

            if(isset($from_email) && isset($to_email)) {
                $subject = 'Hi, User '.$request->name. ' has placed the order!';
                $body = 'Check the order details in System!';

                Mail::send([], [], function ($message) use ($to_email, $from_email, $subject, $body) {
                    $message->to($to_email)
                    ->subject($subject)
                    ->setBody($body,'text/html');
                    $message->from($from_email,'OpenCart - New Order Received!');
                });
            }

            $q = json_decode($request->quantity);
            foreach(json_decode($request->product_id) as $key => $value) {
                $p = Product::where('id', $value)->first();
                $p->update([
                    'quantity' => $p->quantity - $q[$key],
                ]);
            }

            return response()->json(['status' => true, 'data' => $order]);
        }else{
            return response()->json(['status' => false, 'data' => 'Something is wrong!']);

        }
    }

    public function blogDetail($url){

        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();

        $blog = Blog::with('user')->where('url', $url)->first();
        $seo = Seo::where('blog_id', $blog->id)->first();

        $blog_list = Blog::get();
        // return $seo;
        return view('frontend.pages.blog_detail', get_defined_vars());
    }

    // public function userLogin() {

    //     $categories = ProductCategory::with('product_sub_category')->get();
    //     return view('auth.login', get_defined_vars());
    // }


    public function blogList(){

        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();

        $blog_list = Blog::with('user')->get();
        // $seo = Seo::get();
        // return $blog_list;
        return view('frontend.pages.blog', get_defined_vars());
    }

    // public function contactUs()
    // {
    //     // $header = Header::where('type', 'header')->first();
    //     // $footer = Footer::where('type', 'footer')->first();
    //     // $companies = Company::get();
    //     // $product_categories = ProductCategory::get();
    //     // $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

    //     // $contactus_section_one = ContactUs::where('section_type', 'section_one')->get();

    //     // $section_one = ContactUs::where('section_type', 'section_one')->first();
    //     // $section_two = ContactUs::where('section_type', 'section_two')->first();

    //     $categories = ProductCategory::with('product_sub_category')->get();
    //     return view('frontend.contact_us', get_defined_vars());
    // }

    public function faq()
    {
        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        // $companies = Company::get();
        // $product_categories = ProductCategory::get();
        // $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $faq_section_one = Faq::where('section_type', 'section_one')->get();
        $faq_section_detial = Faq::where('section_type', 'section_detial')->first();

        return view('frontend.pages.faq', get_defined_vars());
    }

    public function privacyPolicy()
    {

        // $header = Header::where('type', 'header')->first();
        // $footer = Footer::where('type', 'footer')->first();
        // $companies = Company::get();
        // $product_categories = ProductCategory::get();
        // $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        // $privacy_policy_list = PrivacyPolicy::get();

        $categories = ProductCategory::with('product_sub_category')->get();
        return view('frontend.privacy_policy', get_defined_vars());
    }

    public function termOfUse()
    {
        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();
        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $term_of_use_list = TermOfUse::get();
        return view('frontend.pages.term_of_use', get_defined_vars());
    }


    // Feedback
    public function feedback()
    {
        $header = Header::where('type', 'header')->first();
        $footer = Footer::where('type', 'footer')->first();
        $companies = Company::get();
        $product_categories = ProductCategory::get();
        $sliders = Media::where('page', 'home')->where('section', 'slider_section')->get();

        $feedback_section_one = Feedback::where('section_type', 'section_one')->first();
        return view('frontend.pages.feedback', get_defined_vars());
    }

    public function submitReview(Request $request)
    {
        // return response()->json(['success'=>'Review Submitted is successfully submitted!']);
        Feedback::create([
            'section_type' => 'section_review_form',
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return response()->json(['success'=>'Review is successfully submitted!']);
    }

    public function submitVendorForm(Request $request)
    {
        // return response()->json(['success'=> config('app.email_from')]);
        // return response()->json(['success'=>'Review Submitted is successfully submitted!']);
        $vendor = Vendor::create($request->all());

        try {

            // $from_email = Configuration::where('key', 'mail_from')->first();
            $to_email = Configuration::where('key', 'email_to')->first();

            if(isset($vendor) && isset($to_email)){

                $to_email = isset( $to_email) ?  $to_email->value : config('app.email_to');
                $from_email = config('app.email_from');
                $subject = 'Hi, User '.$request->fname. ' want to contact you!';
                $body = '<p><b>Name: </b>'.$request->fname.'</p><p><b>Company Name: </b>'.$request->cname.'</p><p><b>Address: </b>'.$request->address.'</p><p><b>City: </b>'.$request->city.'</p><p><b>Country: </b>'.$request->country.'</p><p><b>Post Code: </b>'.$request->postcode.'</p><p><b>Phone: </b>'.$request->phone.'</p><p><b>Email: </b>'.$request->email;

                Mail::send([], [], function ($message) use ($to_email, $from_email, $subject, $body) {
                    $message->to($to_email)
                    ->subject($subject)
                    ->setBody($body,'text/html');
                    $message->from($from_email,'Showroom - Vendor Form Query');
                });
            }

            return response()->json(['success'=>'Contact Form Submitted Successfully!']);

        }catch(\Exception $th){
            return $th;
        }

    }

    public function submitContactForm(Request $request)
    {
        // return response()->json(['success'=>'Contact Form Submitted Successfully!']);
        // return response()->json(['success'=>'Review Submitted is successfully submitted!']);
        $contactUs = ContactUs::create([
            // 'section_type' => 'section_contact_us_form',
            'email' => $request->email,
            'name' => $request->first_name .' '.$request->last_name,
            // 'phone' => $request->phone,
            'comment' => $request->message,
        ]);

        try {

            // $from_email = Configuration::where('key', 'mail_from')->first();
            $to_email = Configuration::where('key', 'mail_to')->first();

            if(isset($contactUs) && isset($to_email)){
                $to_email = 'no-reply@888overstock.com';
                $from_email = $request->email;
                $subject = 'Hi, User '.$request->name. ' want to contact you!';
                $body = '<p><b>Name: </b>'.$request->name.'</p><p><b>Company Name: </b>'.$request->name.'</p><p><b>Comment: </b>'.$request->message.'</p>';

                Mail::send([], [], function ($message) use ($to_email, $from_email, $subject, $body) {
                    $message->to($to_email)
                    ->subject($subject)
                    ->setBody($body,'text/html');
                    $message->from($from_email,'Comforter Overstock - Contact Us Query');
                });
            }

        }catch(\Exception $th){
            return $th;
        }

        return response()->json(['success'=>'Contact Form Submitted Successfully!']);
    }

    public function subscribeEmail(Request $request)
    {
        // return response()->json(['success'=>'Contact Form Submitted Successfully!']);
        // return response()->json(['success'=>'Review Submitted is successfully submitted!']);
        // $contactUs = ContactUs::create([
        //     // 'section_type' => 'section_contact_us_form',
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     // 'company_name' => $request->company_name,
        //     'comment' => $request->message,
        // ]);

        try {

            // $from_email = Configuration::where('key', 'mail_from')->first();
            $to_email = Configuration::where('key', 'mail_to')->first();

            // $to_email = 'dev@luckygoldtravel.pk';
            // $from_email = $request->email;
            // $from_email = 'meharomer50@gmail.com';

            if(isset($request->email)  && isset($to_email)){
                // $to_email = 'dev@luckygoldtravel.pk';
                $from_email = $request->email;
                // $subject = 'Hi, User '.$request->name. ' want to contact you!';
                // $body = '<p><b>Name: </b>'.$request->name.'</p><p><b>Company Name: </b>'.$request->name.'</p><p><b>Comment: </b>'.$request->message.'</p>';
                $subject = 'YEs';
                $body = 'HDK';

                Mail::send([], [], function ($message) use ($to_email, $from_email, $subject, $body) {
                    $message->to($to_email)
                    ->subject($subject)
                    ->setBody($body,'text/html');
                    $message->from($from_email,'888 OverStock - Subscribe');
                });
            }

        }catch(\Exception $th){
            return $th;
        }

        return response()->json(['success'=>'Subscribed Successfully!']);
    }

    public function submitQuestion(Request $request)
    {
        // return response()->json(['success'=>'Review Submitted is successfully submitted!']);
        Faq::create([
            'section_type' => 'section_have_question_form',
            'name' => $request->name,
            'email' => $request->email,
            'question' => $request->question,
        ]);

        return response()->json(['success'=>'Question Form is successfully submitted!']);
    }

    public function submitCompanyContactForm(Request $request)
    {
        // $data = array('name'=> 'umar');
        // return response($data['name']);
        // return response()->json($request->all());
        CompanyContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'comment' => $request->comment,
            'company_id' => $request->company_id,
        ]);

        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['phone_no'] = $request->phone_no;
        $userData['comment'] = $request->comment;

        $userData['company_id'] = $request->company_id;

        $company = Company::where('id', $request->company_id)->first();
        // event(new CompanyInfoMail($userData));
        // Mail::to($request->email)->send(new CompanyInfoMail($userData));
        // return response()->json(env('APP_URL'));

        $company_name = $company->name;
        $user_name = $request->name;

        if(isset($company->email)){
            $to_name =  $company->name;
            $to_email = $company->email;

            $data = array('name'=> $userData['name'], 'email'=> $userData['email'], 'phone_no'=> $userData['phone_no'], 'comment'=> $userData['comment'], 'company_name'=> $company->name,  'body' => 'This User give you a comment');

            $email = Mail::send('email.company-info-mail', $data, function($message) use ($to_name, $to_email, $company_name, $user_name) {
                $message->to($to_email, $to_name)
                ->subject('Hi' .$company_name.', User '.$user_name. 'wants to connect you!');
                $message->from('meharomer50@gmail.com', 'Lahowroom - Ecommerce Platform');
                // $message->from('no-reply@confinito.com', 'Lahowroom - Ecommerce Platform');
            });
        }

        return response()->json(['success'=>'Contact Form is successfully submitted!']);

    }




    public function termsAndConditions(){

        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        // return $topbar;
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        $categories = ProductCategory::with('product_sub_category')->get();
        return view('frontend.terms_and_conditions', get_defined_vars());

    }


    public function aboutUs(){
        // // dd('Yes');
        // // $categories = ProductCategory::with('product_sub_category')->get();
        // $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        // $topbar = json_decode($topbar->json);
        // // return $topbar;
        // $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        // $footer = json_decode($footer->json);

        // $aboutus = AboutUs::orderBy('ordering')->get();
        $aboutus = Null;
        $d = Page::where('type', 'aboutus')->where('section_type', 'main_section')->first();
        if(isset($d)) {
            $aboutus = json_decode($d->json);
        }

        // return $aboutus;
        // header
        $categories = ProductCategory::get();
        $topbar = Page::where('type', 'home')->where('section_type', 'topbar')->first();
        $topbar = json_decode($topbar->json);
        $footer = Page::where('type', 'home')->where('section_type', 'footer')->first();
        $footer = json_decode($footer->json);
        return view('frontend.aboutus', get_defined_vars());
    }

}
