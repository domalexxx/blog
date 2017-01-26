<?php

namespace App\Http\Controllers\Partnerauth;

use App\Partner;
use Validator;
use Input;
use Response;
use Lang;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/partner';
    protected $guard = 'partners';
  
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

  public function showLoginForm(Request $request)
  { 
    return view('partner.auth.login');
  }
  
  public function showRegistrationForm()
  {
    return view('partner.auth.register');
  }

  protected function register(Request $request)
  {
     $inputData = Input::get('formData');
     parse_str($inputData, $formFields);  
     $userData = array(
       'company_name'      => $formFields['company_name'],
       'business_number'      => $formFields['business_number'],
       'office_email'      => $formFields['office_email'],
       'password'         => $formFields['password'],
       'password_confirmation'         => $formFields['password_confirmation'],
       // 'office_location'      => $formFields['office_location'],
       'business_license_number'      => $formFields['business_license_number'],
       // 'scanned_business'      => $formFields['scanned_business'],
       // 'email'     =>  $formFields['email'],
       // 'password'  =>  $formFields['password'],
       // 'password_confirmation' =>  $formFields[ 'password_confirmation'],
     );

     $rules = [
         'company_name' => 'required|max:255',
         'business_number' => 'required',
         'business_license_number' => 'required',
         'office_email' => 'required|email',
         // 'office_location.*.country' => 'required',
         // 'office_location.*.state' => 'required',
         // 'office_location.*.city' => 'required',
         // 'office_location.*.street' => 'required',
         // 'office_location.*.suite' => 'required',
         // 'office_location.*.postalcode' => 'required',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|min:6'
     ];
     $messages = [
         'company_name.required' => 'Please enter your Company Name',
         'business_number.required' => 'Please enter your Business Number',
         'business_license_number.required' => 'Please enter your Business License Number',
         'office_email.required' => 'Please enter your Office Email',
         // 'office_locationcountry.required' => 'Please enter your Office Location country',
         // 'office_location-state.required' => 'Please enter your Office Location state/province',
         // 'office_location-city.required' => 'Please enter your Office Location city',
         // 'office_location-street.required' => 'Please enter your Office Location street',
         // 'office_location-suite.required' => 'Please enter your Office Location suite',
         // 'office_location-postalcode.required' => 'Please enter your Office Location postalcode',
         // 'lname.required' => 'Please enter your Last Name',
         // 'email.required' => 'Please enter your E-mail address!',
     ];
     $validator = Validator::make($userData,$rules,$messages);
     if($validator->fails())
         return Response::json(array(
             'fail' => true,
             'errors' => $validator->getMessageBag()->toArray()
         ));
     else {
     //save password to show to user after registration
         // $password = $userData['password'];
     //hash it now
         $userData['password'] = bcrypt($userData['password']);
         unset($userData['password_confirmation']);
     //save to DB user details
       if(Partner::create($userData)) {  
           //return success  message
         return Response::json(array(
           'success' => true,
           // 'email' => $userData['email'],
           // 'password'    =>  $userData['password']
        ));
      }
    }   
  }
  
  public function resetPassword()
  {
    return view('partner.auth.passwords.email');
  }
  
  public function logout(){
    Auth::guard('partner')->logout();
    return redirect('/partner/login');
  }
  public function login(Request $request)
  {
    // $email = Input::get('email');
    // $password = Input::get('password');
    // parse_str($inputData, $formFields); 
    $rules = [
      'office_email' => 'required|email',
      'password' => 'required|min:6',
    ];
    $messages = [
        'office_email.required' => 'Please enter your Office Email',
        'password.required' => 'Please enter your Business Number',
        // 'business_license_number.required' => 'Please enter your Business License Number',
        // 'office_email.required' => 'Please enter your Office Email',
        // 'office_locationcountry.required' => 'Please enter your Office Location country',
        // 'office_location-state.required' => 'Please enter your Office Location state/province',
        // 'office_location-city.required' => 'Please enter your Office Location city',
        // 'office_location-street.required' => 'Please enter your Office Location street',
        // 'office_location-suite.required' => 'Please enter your Office Location suite',
        // 'office_location-postalcode.required' => 'Please enter your Office Location postalcode',
        // 'lname.required' => 'Please enter your Last Name',
        // 'email.required' => 'Please enter your E-mail address!',
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    //      if($validator->fails())
    //          return Response::json(array(
    //              'fail' => true,
    //              'errors' => $validator->getMessageBag()->toArray()
    //          ));
    $this->validate($request, [
                'office_email' => 'required|email',
                'password' => 'required',
            ]);
            if (auth()->guard('partner')->attempt(['office_email' => $request->input('office_email'), 'password' => $request->input('password')]))
            {
                $user = auth()->guard('partner')->user();
                return redirect('/partner/login');
            }else{
              return Response::json(array(
             'fail' => true,
             'errors' => $validator->getMessageBag()->toArray()
         ));
            }

    // if (Auth::guard('partners')->attempt(['office_email' => '', 'password' => '']))
    // {
    //   return redirect('/partner');
    // }
    
    // return view('partner.auth.login');
  }
  protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'error' => Lang::get('auth.failed')
            ], 401);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }
    protected function sendLockoutResponse(Request $request)
  {
      $seconds = $this->limiter()->availableIn(
          $this->throttleKey($request)
      );

      $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

      if ($request->ajax()) {
          return response()->json([
              'error' => $message
          ], 401);
      }

      return redirect()->back()
          ->withInput($request->only($this->username(), 'remember'))
          ->withErrors([$this->username() => $message]);
  }
}