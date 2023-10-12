<?php

namespace App\Http\Controllers;

use App\Models\user;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
public function index(){
    return view('login/loginform');
    
}
public function login_acn(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
           // print_r(Auth::attempt($credentials));die();
        if (Auth::attempt($credentials)) {
          //  print_r($credentials);die();
            return redirect()->intended('/dashboard');
        }else{
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);

        }
    }
    public function dashboard()

    {
        return view('admin/layout/dashboard');

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    //change password
    public function changepassword(){
        return view('login/changepassword');
    }
    public function updatepassword (Request $request) {
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
    public function showprofile()
    {
        return view('login/updateprofile');
    }
    public function profileUpdate(Request $request)
    {
        $user = auth()->user(); 
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'updated_at' => now(),
        ]);
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
       
    }
    public function createnewuser()
    {
        return view('login/registration');
    }
    public function newuserstore()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/games');
    }

}
