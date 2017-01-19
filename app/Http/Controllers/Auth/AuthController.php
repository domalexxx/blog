<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   //  protected function validator(array $data)
   //  {
   //      $rules = [
   //          'fname' => 'required|max:255',
   //          'lname' => 'required|max:255',
   //          'email' => 'required|email|max:255|unique:users',
   //          'password' => 'required|confirmed|min:6',
   //          'password_confirmation' => 'required|min:6',
   //      ];
   //      $messages = [
   //          'fname.required' => 'Please enter your First Name',
   //          'lname.required' => 'Please enter your Last Name',
   //          'email.required' => 'Please enter your E-mail address!',
   //      ];
   //      return Validator::make($data, $rules, $messages);
   // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'fname' => $data['fname'],
    //         'lname' => $data['lname'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
    protected function register()
    {
       $inputData = Input::get('formData');
       parse_str($inputData, $formFields);  
       $userData = array(
         'fname'      => $formFields['fname'],
         'lname'      => $formFields['lname'],
         'email'     =>  $formFields['email'],
         'password'  =>  $formFields['password'],
         'password_confirmation' =>  $formFields[ 'password_confirmation'],
       );
       $rules = [
           'fname' => 'required|max:255',
           'lname' => 'required|max:255',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|confirmed|min:6',
           'password_confirmation' => 'required|min:6',
       ];
       $messages = [
           'fname.required' => 'Please enter your First Name',
           'lname.required' => 'Please enter your Last Name',
           'email.required' => 'Please enter your E-mail address!',
       ];
       $validator = Validator::make($userData,$rules,$messages);
       if($validator->fails())
           return Response::json(array(
               'fail' => true,
               'errors' => $validator->getMessageBag()->toArray()
           ));
       else {
       //save password to show to user after registration
           $password = $userData['password'];
       //hash it now
           $userData['password'] = bcrypt($userData['password']);
           unset($userData['password_confirmation']);
       //save to DB user details
         if(User::create($userData)) {  
             //return success  message
           return Response::json(array(
             'success' => true,
             'email' => $userData['email'],
             'password'    =>  $userData['password']
           ));
         }
     }   
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
