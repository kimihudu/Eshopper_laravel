<?php

namespace App\Http\Controllers\Auth;

// use App\Users;
use App\User;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // app('debugbar')->info($this);
        
    }
    
    /**
    * Handle a login request to the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        return $this->sendLoginResponse($request);
        // return $this->sendFailedLoginResponse($request);
    }
    
    /**
    * Validate the user login request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return void
    */
    protected function validateLogin(Request $request)
    {
        
        $this->validate($request, [
        'email' => 'required|string',
        'password' => 'required|string',
        ]);
    }
    
    /**
    * Send the response after the user was authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        
        // $this->clearLoginAttempts($request);
        
        return $this->authenticated($request, User::all());
        // ?: redirect()->intended($this->redirectPath());
    }
    
    /**
    * The user has been authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    protected function authenticated(Request $request, $user)
    {
        //
        // $_auth = User::where('email','=',$request->input('email'))->where('password','=',$request->input('password'))->get();
        // app('debugbar')->info($request->input('email'));
        $_usr = User::where('email','=',$request->input('email'))->where('psw','=',$request->input('password'))->get();
        $_usr = $_usr->toArray();
        // dd($_usr);
        // dd($_usr[0]['role']);
        if(count($_usr) > 0 && $_usr[0]['role'] != "admin")
        return redirect('/home');
        else if(count($_usr) > 0 && $_usr[0]['role'] == "admin")
        return redirect('/admin');
        else
            return redirect('/login');
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->input('email'))->get();
        // dd($user);
        // app('debugbar')->info($this->username());
        // if ($user && !$user->activated) {
        //     $errorMessage = 'You need to activate your account first'; // you can use trans here too
        // }
        if($user) {
            $errorMessage = trans('auth.failed');
        }
        
        $errors = [$this->username() => $errorMessage];
        
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        
        return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
    }
}