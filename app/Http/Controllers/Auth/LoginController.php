<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        $role = Auth::user()->role;
        switch ($role) {
            case '1':
            return '/admin/dashboard';
            break;

            case '3':
            return '/user/profile';
            break;

            default:
            return '/';
            break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('Yes');
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm(){
    //     // $test = 'test';
    //     $categories = ProductCategory::with('product_sub_category')->get();
    //     return view('auth.login', compact('categories'));
    // }

}
