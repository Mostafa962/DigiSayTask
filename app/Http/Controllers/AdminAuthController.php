<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use App\Admin;
use Auth;
use Mail;
use DB;

class AdminAuthController extends Controller
{
	//Start Login Modules Methods
	protected function login(){
		if (auth()->guard('admin')->check()) {
			return redirect('admin/client');
		}
		return view('auth.login-register');
	}
	protected function loginCheck(){
		$remember = request('rememberme') == 1 ? true: false;
		if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
			return redirect('admin/client');
		}else{
			session()->flash('error',"E-mail and Password does'nt match,try again");
			return redirect('admin/');
		}

	}
	//End Login Methods

	//Start Register Module Methods
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request, $user)
    {
        
    }
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        auth()->guard('admin')->login($user);
        return $this->registered($request, $user)
                        ?: redirect('admin/client');
    }
    //End Register Methods
    //Start Reset-Password Methods
    //if admin forgot password
    public function Forget_password (){
        if (auth()->guard('admin')->check()) {
            return redirect('admin/');
        }
        return view('auth/forgotPassword');
    }
    //admin write his email and App Will sent mail to his Email if the emial true
    public function verifieEmail(){
        $adminMail = Admin::Where('email',request('email'))->first();
        //if email already exists
        if(!empty($adminMail)){
            $token = app('auth.password.broker')->createToken($adminMail);
            $data = DB::table('password_resets')->insert([
                'email'=>$adminMail->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
            Mail::to($adminMail->email)->send(new AdminResetPassword(['data'=>$adminMail,'token'=>$token]));
            session()->flash('success',trans('Admin.the_link_reset_send'));
            return back();
        }
        //if email not found
        session()->flash('failed',trans('Admin.the_Email_not_found'));
        return back();
    }
    //if already link has same token 
    public function resetAdminPassword($token){
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){
            return view('auth.ResetPassword',['data'=>$check_token]);
        }else{
            return redirect('admin/forgot/password');
        }
    }
    //final step,admin insert his new passwords
    public function NewResetAdminPassword($token){
        //validate his two passwords
        $this->validate(request(),[
            'password'               => 'required|confirmed',
            'password_confirmation'  => 'required'
            ],[],[
            'password'               =>'Password',
            'password_confirmation'  =>'Two Passwords'
        ]);
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){
            $admin = Admin::where('email',$check_token->email)->update([
            'email'=>$check_token->email,
            'password'=>bcrypt(request('password'))]);
             DB::table('password_resets')->where('email',request('email'))->delete();
             session()->flash('resetSuccess',trans('Admin.the_password_reset_succcess'));
             auth()->guard('admin')->attempt(['email'=>$check_token->email,'password'=>request('password')],true);
             return redirect(('admin/'));
        }else{
            return redirect(('admin/forgot/password'));
        }
    }
    //End Reset-Password Methods
	protected function logout(){
			auth()->guard('admin')->logout();
			return redirect('admin/');
	}	
}
