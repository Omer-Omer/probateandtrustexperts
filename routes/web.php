<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test-email', function () {
    try {
        Mail::raw('Test email content', function ($message) {
            $message->to('meharomer50@gmail.com')
                ->subject('Test Email');
        });

        return "Test email sent successfully!";
    } catch (\Exception $e) {
        return "Error sending test email: " . $e->getMessage();
    }
});


Route::get('clear-cache',function (){
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    \Illuminate\Support\Facades\Artisan::call('storage:link');
 });

Route::post('my-form', [App\Http\Controllers\Frontend\HomeController::class, 'myformPost'])->name('my.form');
Route::post('/submitForm', [App\Http\Controllers\Frontend\HomeController::class, 'submitForm'])->name('frontend.submit-form');

// Route::get('search-products', [App\Http\Controllers\Frontend\HomeController::class, 'searchProducts'])->name('search-products');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/living-trust/qa', [App\Http\Controllers\HomeController::class, 'livingTrustQA']);
Route::get('/have-will', [App\Http\Controllers\HomeController::class, 'haveWill']);
Route::get('/trust-without-will', [App\Http\Controllers\HomeController::class, 'trustWithoutWill']);
Route::get('/trust-importance', [App\Http\Controllers\HomeController::class, 'trustImportance']);
Route::get('/why-mediation', [App\Http\Controllers\HomeController::class, 'whyMediation']);

// Route::get('/custom-made-drapery', [App\Http\Controllers\HomeController::class, 'customMadeDrapery']);
// Route::get('/projects', [App\Http\Controllers\HomeController::class, 'projects']);
// Route::get('/aboutus', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs']);
// Route::get('/contactus', [App\Http\Controllers\Frontend\HomeController::class, 'contactUs']);
// Route::get('/policy', [App\Http\Controllers\Frontend\HomeController::class, 'policy']);
// Route::get('/detail/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'detail']);
// Route::get('/return-and-exchange', [App\Http\Controllers\Frontend\HomeController::class, 'returnAndExchange']);
// Route::get('/category/{name}', [App\Http\Controllers\HomeController::class, 'category']);
// Route::get('/company/listing', [App\Http\Controllers\HomeController::class, 'listing']);
// Route::get('/company/{name}', [App\Http\Controllers\HomeController::class, 'company']);

// Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'productDetails']);


// Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'homePage']);
// Route::get('/category', [App\Http\Controllers\Frontend\HomeController::class, 'category']);
// Route::get('/category/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'dynamicCategory']);
// Route::get('/company', [App\Http\Controllers\Frontend\HomeController::class, 'company']);
// Route::get('/company/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'dynamicCompany']);
// Route::get('/comingsoon', [App\Http\Controllers\Frontend\HomeController::class, 'comingSoon']);

// Route::get('/latest', [App\Http\Controllers\Frontend\HomeController::class, 'latest']);
// Route::get('/pallets', [App\Http\Controllers\Frontend\HomeController::class, 'pallets']);
// Route::get('/deals', [App\Http\Controllers\Frontend\HomeController::class, 'deals']);
// Route::get('/about', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs']);
// Route::get('/events', [App\Http\Controllers\Frontend\HomeController::class, 'events']);
// Route::get('/services', [App\Http\Controllers\Frontend\HomeController::class, 'services']);
// Route::get('/vendors', [App\Http\Controllers\Frontend\HomeController::class, 'vendors']);

Route::post('/submitVendorForm', [App\Http\Controllers\Frontend\HomeController::class, 'submitVendorForm'])->name('frontend.submit-vendor-form');
Route::post('/submitContactForm', [App\Http\Controllers\Frontend\HomeController::class, 'submitContactForm'])->name('frontend.submit-contact-form');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/product/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'productDetail']);
// Route::get('/category/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'categoryListing']);
// Route::get('/sub-category/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'subCategoryListing']);
// Route::get('/listing', [App\Http\Controllers\Frontend\HomeController::class, 'itemListing']);
// Route::get('/terms-and-conditions', [App\Http\Controllers\Frontend\HomeController::class, 'termsAndConditions']);
// Route::get('/aboutus', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs']);
// Route::get('/gallery', [App\Http\Controllers\Frontend\HomeController::class, 'gallery']);
// Route::get('/contactus', [App\Http\Controllers\Frontend\HomeController::class, 'contactUs']);
// Route::get('/products', [App\Http\Controllers\Frontend\HomeController::class, 'products']);
// Route::get('/product/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'categoryDetail']);

// Route::get('/product-detail', [App\Http\Controllers\Frontend\HomeController::class, 'productDetail']);
// Route::get('/privacy-policy', [App\Http\Controllers\Frontend\HomeController::class, 'privacyPolicy']);

// Route::post('/submitContactForm', [App\Http\Controllers\Frontend\HomeController::class, 'submitContactForm'])->name('frontend.submit-contact-form');
// Route::post('/subscribe-email', [App\Http\Controllers\Frontend\HomeController::class, 'subscribeEmail'])->name('frontend.subscribe-email');

// Route::get('/get-product-details', [App\Http\Controllers\Frontend\HomeController::class, 'productDetailsById']);
// Route::post('/view-cart-items', [App\Http\Controllers\Frontend\HomeController::class, 'viewCartItems']);

// Route::get('/view-cart', [App\Http\Controllers\Frontend\HomeController::class, 'viewCart']);

// Route::get('/checkout', [App\Http\Controllers\Frontend\HomeController::class, 'checkout']);
// Route::post('/order-confirm', [App\Http\Controllers\Frontend\HomeController::class, 'orderConfirm'])->name('frontend.orderConfirm');


Auth::routes();

Route::prefix('admin')->middleware('auth','dashboard')->group(function () {

    // Route::get('/dashboard', [App\Http\Livewire\DashboardController::class, 'index'])->name('dashboard');

    // Category
    // Route::get('/category', [App\Http\Livewire\CategoryController::class, 'index'])->name('category');
    // Route::get('/category/create', [App\Http\Livewire\CategoryController::class, 'create'])->name('category.create');
    // Route::post('/category/store', [App\Http\Livewire\CategoryController::class, 'store'])->name('category.store');

    Route::get('/dashboard', [App\Http\Controllers\Backend\Dashboard::class, 'index'])->name('dashboard');

    Route::get('topbar', [App\Http\Controllers\Backend\HomeController::class, 'topbar'])->name('topbar');
    Route::post('topbar/store', [App\Http\Controllers\Backend\HomeController::class, 'topbarStore'])->name('topbar.store');

    Route::get('footer', [App\Http\Controllers\Backend\HomeController::class, 'footer'])->name('footer');
    Route::post('footer/store', [App\Http\Controllers\Backend\HomeController::class, 'footerStore'])->name('footer.store');

    Route::get('banner', [App\Http\Controllers\Backend\HomeController::class, 'banner'])->name('banner');
    Route::post('banner/store', [App\Http\Controllers\Backend\HomeController::class, 'bannerStore'])->name('banner.store');

    Route::get('custom-drapery', [App\Http\Controllers\Backend\HomeController::class, 'customDrapery'])->name('custom-drapery');
    Route::post('custom-drapery/store', [App\Http\Controllers\Backend\HomeController::class, 'customDraperyStore'])->name('custom-drapery.store');

    Route::get('text-under-banner', [App\Http\Controllers\Backend\HomeController::class, 'textUnderBanner'])->name('textUnderBanner');
    Route::post('text-under-banner/store', [App\Http\Controllers\Backend\HomeController::class, 'textUnderBannerStore'])->name('textUnderBanner.store');

    Route::post('home-store', [App\Http\Controllers\Backend\HomeController::class, 'homeStore'])->name('homeStore');

    Route::get('page/product', [App\Http\Controllers\Backend\HomeController::class, 'productIndex'])->name('page.product');
    Route::get('page/product/create', [App\Http\Controllers\Backend\HomeController::class, 'createProductPage'])->name('page.createProductPage');
    Route::post('page/product/store', [App\Http\Controllers\Backend\HomeController::class, 'storeProductPage'])->name('page.storeProductPage');
    Route::get('page/product/edit/{id}', [App\Http\Controllers\Backend\HomeController::class, 'editProductPage'])->name('page.editProductPage');

    Route::put('page/product/update/{id}', [App\Http\Controllers\Backend\HomeController::class, 'updateProductPage'])->name('page.updateProductPage');
    Route::get('page/product/delete/{id}', [App\Http\Controllers\Backend\HomeController::class, 'deleteProductPage'])->name('page.deleteProductPage');

    // Home Fabric Gallery
    Route::get('page/fabric', [App\Http\Controllers\Backend\HomeController::class, 'fabricIndex'])->name('page.fabric');
    Route::post('page/fabric/store', [App\Http\Controllers\Backend\HomeController::class, 'fabricStore'])->name('page.fabric.store');

    // Project Page Gallery
    Route::get('page/projects', [App\Http\Controllers\Backend\HomeController::class, 'projectsIndex'])->name('page.projects');
    Route::post('page/projects/store', [App\Http\Controllers\Backend\HomeController::class, 'projectsStore'])->name('page.projects.store');

    // Custom Drapery Page Images
    Route::get('page/gallery', [App\Http\Controllers\Backend\HomeController::class, 'galleryIndex'])->name('page.gallery');
    Route::post('page/gallery/store', [App\Http\Controllers\Backend\HomeController::class, 'galleryStore'])->name('page.gallery.store');
    Route::get('page/galleryImage/delete/{id}', [App\Http\Controllers\Backend\HomeController::class, 'deleteSingleGalleryImage'])->name('page.galleryImage.delete');

    Route::get('page/contactus', [App\Http\Controllers\Backend\HomeController::class, 'contactUs'])->name('page.contactus');
    Route::post('page/contactus/store', [App\Http\Controllers\Backend\HomeController::class, 'contactUsStore'])->name('page.contactus.store');
    Route::get('page/vendor', [App\Http\Controllers\Backend\HomeController::class, 'vendor'])->name('page.vendor');
    Route::post('page/vendor/store', [App\Http\Controllers\Backend\HomeController::class, 'vendorStore'])->name('page.vendor.store');
    Route::get('page/contactus/addressStore', [App\Http\Controllers\Backend\HomeController::class, 'addressStore'])->name('addressStore');
    Route::resource('page/home', App\Http\Controllers\Backend\HomeController::class);

    // Route::get('/home', [App\Http\Controllers\Backend\Home::class, 'index'])->name('home');
    // Route::post('/slider-image-upload', [App\Http\Controllers\Backend\Home::class, 'sliderImageUpload'])->name('slider-image-upload');
    // Route::post('/delete-upload-image/{id}', [App\Http\Controllers\Backend\Home::class, 'deleteUploadImage'])->name('delete-upload-image');
    // Route::post('/home-section-headings', [App\Http\Controllers\Backend\Home::class, 'homeSectionHeadings'])->name('home-section-headings');
    // Route::get('/delete-gallery-img/{id}', [App\Http\Controllers\Backend\Home::class, 'deleteGalleryImage'])->name('delete-gallery-img');
    // Route::post('/banner-image-upload', [App\Http\Controllers\Backend\Home::class, 'bannerImageUpload'])->name('banner-image-upload');

    Route::get('/company/product/create/{id}', [App\Http\Controllers\Backend\ProductController::class, 'companyProductCreate'])->name('
    companyProductCreate');

    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    Route::get('/product-listing', [App\Http\Controllers\Backend\ProductController::class, 'productListing']);

    Route::get('/sub-categories/{id}', [App\Http\Controllers\Backend\ProductController::class, 'getSubCategories']);

     // Product Category
    Route::get('/product/categories/show', [App\Http\Controllers\Backend\ProductController::class, 'showProductCategories'])->name('product.categories.show');
    Route::get('/product/category/create', [App\Http\Controllers\Backend\ProductController::class, 'createProductCategory'])->name('product.category.create');
    Route::post('/product/category/store', [App\Http\Controllers\Backend\ProductController::class, 'storeProductCategory'])->name('product.category.store');
    Route::get('/product/category/edit/{id}', [App\Http\Controllers\Backend\ProductController::class, 'editProductCategory'])->name('product.category.edit');
    Route::put('/product/category/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'updateProductCategory'])->name('product.category.update');
    Route::get('/product/category/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteProductCategory'])->name('product.category.delete');

    // Product Sub Category
    // Route::get('/product/subcategories/show', [App\Http\Controllers\Backend\ProductController::class, 'showSubProductCategories'])->name('product.subcategories.show');
    // Route::get('/product/subcategory/create', [App\Http\Controllers\Backend\ProductController::class, 'createSubProductCategory'])->name('product.subcategory.create');
    // Route::post('/product/subcategory/store', [App\Http\Controllers\Backend\ProductController::class, 'storeSubProductCategory'])->name('product.subcategory.store');
    // Route::get('/product/subcategory/edit/{id}', [App\Http\Controllers\Backend\ProductController::class, 'editSubProductCategory'])->name('product.subcategory.edit');
    // Route::put('/product/subcategory/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'updateSubProductCategory'])->name('product.subcategory.update');
    // Route::get('/product/subcategory/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteSubProductCategory'])->name('product.subcategory.delete');

    // Route::get('/orders', [App\Http\Controllers\Backend\ProductController::class, 'orders'])->name('product.orders');
    // Route::get('/order/{id}', [App\Http\Controllers\Backend\ProductController::class, 'orderDetails'])->name('product.order.details');
    // Route::get('/order/status/{id}/{status}', [App\Http\Controllers\Backend\ProductController::class, 'orderStatus'])->name('product.order.status');

    Route::get('/get-product-categories', [App\Http\Controllers\Backend\ProductController::class, 'getProductCategories'])->name('get-product-categories');
    Route::get('/delete-single-gallery-img/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteSingleGalleryImage'])->name('delete-single-gallery-img');
    Route::get('/delete-thumbnail-img/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteThumbnailImage'])->name('delete-thumbnail-img');
    Route::get('/delete-product/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteProduct'])->name('admin.product.delete');

    Route::post('aboutus/update-order', [App\Http\Controllers\Backend\AboutUs::class, 'updateOrder'])->name('aboutus.updateOrder');
    Route::delete('aboutus/delete-img/{id}', [App\Http\Controllers\Backend\AboutUs::class, 'deleteImage'])->name('aboutus.deleteImage');
    Route::resource('about-us', App\Http\Controllers\Backend\AboutUs::class, [ 'as' => 'admin']);
    Route::resource('term-of-use', App\Http\Controllers\Backend\TermOfUse::class, [ 'as' => 'admin']);
    Route::get('/delete-term-of-use/{id}', [App\Http\Controllers\Backend\TermOfUse::class, 'deleteTermOfUse'])->name('admin.term-of-use.delete');

    Route::post('portfolio/update-order', [App\Http\Controllers\Backend\PortfolioController::class, 'updatePortfolioOrder'])->name('portfolio.updateOrder');
    Route::get('/delete-portfolio/{id}', [App\Http\Controllers\Backend\PortfolioController::class, 'deletePortfolio'])->name('admin.portfolio.delete');
    Route::resource('portfolio', App\Http\Controllers\Backend\PortfolioController::class, [ 'as' => 'admin']);

    Route::resource('privacy-policy', App\Http\Controllers\Backend\PrivacyPolicyController::class, [ 'as' => 'admin']);
    Route::get('/delete-privacy-policy/{id}', [App\Http\Controllers\Backend\PrivacyPolicyController::class, 'deletePrivacyPolicy'])->name('admin.privacy-policy.delete');

    // Feedback
    // Route::resource('feedback', App\Http\Controllers\Backend\FeedbackController::class, [ 'as' => 'admin']);
    // Route::get('/review-list', [App\Http\Controllers\Backend\FeedbackController::class, 'reviewList'])->name('admin.feedback.review-list');

    // Contact Us
    Route::resource('contact-us', App\Http\Controllers\Backend\ContactUsController::class, [ 'as' => 'admin']);
    Route::get('/contact-form-list', [App\Http\Controllers\Backend\ContactUsController::class, 'contactFormList'])->name('admin.contact-us.form-list');
    Route::get('/delete-contact-us/{id}', [App\Http\Controllers\Backend\ContactUsController::class, 'deleteContactUs'])->name('admin.contact-us.delete');


    Route::resource('faq', App\Http\Controllers\Backend\FaqController::class, [ 'as' => 'admin']);
    Route::get('/faq-detail-section', [App\Http\Controllers\Backend\FaqController::class, 'detailSection'])->name('admin.faq.detail-section');
    Route::post('/store-faq-detail-section', [App\Http\Controllers\Backend\FaqController::class, 'storedetailSection'])->name('admin.faq.store-detail-section');
    Route::get('/faq-have-question-list', [App\Http\Controllers\Backend\FaqController::class, 'haveQuestionList'])->name('admin.faq.have-question-list');
    Route::get('/delete-faq/{id}', [App\Http\Controllers\Backend\FaqController::class, 'deleteFaq'])->name('admin.faq.delete');

    // Settings
    Route::resource('header', App\Http\Controllers\Backend\Header::class);
    Route::post('/upload-header-logo', [App\Http\Controllers\Backend\Header::class, 'uploadHeaderLogo'])->name('upload-header-logo');

    // Route::resource('footer', App\Http\Controllers\Backend\Footer::class);
    // Route::post('/upload-footer-logo', [App\Http\Controllers\Backend\Footer::class, 'uploadFooterLogo'])->name('upload-footer-logo');

    //    Blog
    // Route::get('/blog/view', [App\Http\Controllers\Backend\BlogController::class, 'index'])->name('admin.blog.view');
    // Route::get('/blog/create', [App\Http\Controllers\Backend\BlogController::class, 'create'])->name('admin.blog.create');
    // Route::post('/blog/store', [App\Http\Controllers\Backend\BlogController::class, 'store'])->name('admin.blog.store');
    // Route::get('/blog/edit/{id}', [App\Http\Controllers\Backend\BlogController::class, 'edit'])->name('admin.blog.edit');
    // Route::patch('/blog/update/{id}', [App\Http\Controllers\Backend\BlogController::class, 'update'])->name('admin.blog.update');
    // Route::post('/blog/delete/{id}', [App\Http\Controllers\Backend\BlogController::class, 'delete'])->name('admin.blog.delete');

    // User
    Route::get('/view-users', [App\Http\Controllers\Backend\Setting::class, 'viewUsers'])->name('view-users');
    Route::get('/add-user', [App\Http\Controllers\Backend\Setting::class, 'addUser'])->name('add-user');
    Route::post('/store-user', [App\Http\Controllers\Backend\Setting::class, 'storeUser'])->name('store-user');
    Route::get('/edit-user/{id}', [App\Http\Controllers\Backend\Setting::class, 'editUser'])->name('edit-user');
    Route::patch('/update-user/{id}', [App\Http\Controllers\Backend\Setting::class, 'updateUser'])->name('update-user');
    Route::get('/delete-user/{id}', [App\Http\Controllers\Backend\Setting::class, 'deleteUser'])->name('admin.delete-user');
//    Route::get('/user-contact-list', [App\Http\Controllers\Backend\Setting::class, 'companyContactList'])->name('admin.user-contact-list');

    // Company
    Route::resource('company', App\Http\Controllers\Backend\CompanyController::class, [ 'as' => 'admin']);

    // Route::get('/view-companies', [App\Http\Controllers\Backend\Setting::class, 'viewCompanies'])->name('view-companies');
    // Route::get('/add-company', [App\Http\Controllers\Backend\Setting::class, 'addCompany'])->name('add-company');
    // Route::post('/store-company', [App\Http\Controllers\Backend\Setting::class, 'storeCompany'])->name('store-company');
    // Route::get('/edit-company/{id}', [App\Http\Controllers\Backend\Setting::class, 'editCompany'])->name('edit-company');
    // Route::patch('/update-company/{id}', [App\Http\Controllers\Backend\Setting::class, 'updateCompany'])->name('update-company');
    // Route::get('/delete-company/{id}', [App\Http\Controllers\Backend\Setting::class, 'deleteCompany'])->name('admin.delete-company');
    // Route::get('/company-contact-list', [App\Http\Controllers\Backend\Setting::class, 'companyContactList'])->name('admin.company-contact-list');

    // Product Category
    Route::get('/view-product-categories', [App\Http\Controllers\Backend\Setting::class, 'viewProductCategories'])->name('view-product-categories');
    Route::get('/add-product-category', [App\Http\Controllers\Backend\Setting::class, 'addProductCategory'])->name('add-product-category');
    Route::post('/store-product-category', [App\Http\Controllers\Backend\Setting::class, 'storeProductCategory'])->name('store-product-category');
    Route::get('/edit-product-category/{id}', [App\Http\Controllers\Backend\Setting::class, 'editProductCategory'])->name('edit-product-category');
    Route::patch('/update-product-category/{id}', [App\Http\Controllers\Backend\Setting::class, 'updateProductCategory'])->name('update-product-category');
    Route::get('/delete-product-category/{id}', [App\Http\Controllers\Backend\Setting::class, 'deleteProductCategory'])->name('delete-product-category');

    Route::get('/configuration', [App\Http\Controllers\Backend\Setting::class, 'configuration'])->name('configuration');
    Route::get('/configuration/create/', [App\Http\Controllers\Backend\Setting::class, 'createConfiguration'])->name('configuration.create');
    Route::post('/configuration/store/', [App\Http\Controllers\Backend\Setting::class, 'storeConfiguration'])->name('configuration.store');
    Route::patch('/configuration/update/{id}', [App\Http\Controllers\Backend\Setting::class, 'updateConfiguration'])->name('configuration.update');
    Route::get('/configuration/edit/{id}', [App\Http\Controllers\Backend\Setting::class, 'editConfiguration'])->name('configuration.edit');

});


// Dashboard Controller
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
