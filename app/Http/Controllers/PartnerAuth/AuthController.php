<?php

namespace App\Http\Controllers\Partnerauth;

use App\Partner;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/partner';
    protected $guard = 'partner';
  
  public function showLoginForm()
  {
    if (Auth::guard('partner')->check())
    {
      return redirect('/partner');
    }
    
    return view('partner.auth.login');
  }
  
  public function showRegistrationForm()
  {
    return view('partner.auth.register');
  }
  
  public function resetPassword()
  {
    return view('partner.auth.passwords.email');
  }
  
  public function logout(){
    Auth::guard('partner')->logout();
    return redirect('/partner/login');
  }
  public function login()
  {
    if (Auth::guard('partner')->check())
    {
      return redirect('/partner');
    }
    
    return view('partner.auth.login');
  }
}