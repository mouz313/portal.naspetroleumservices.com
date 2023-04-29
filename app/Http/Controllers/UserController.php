<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Shop;
use App\Models\User;
use App\Models\ShopFile;
use App\Mail\restpassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // ------------------User Dashboard-----------------

    public function showRegisterForm(){
        return view('admin.pages.adduser');
    }
    public function dashboard()
    {
        return view('user.dashboard');
    }



    // -----------------User Dashboard---------------------



    public function allusers()
    {
        $users = User::where('role','=','0')->get();
        return view('admin.pages.userlist', compact('users'));
    }
    //new registration
    public function registerUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' =>  ['required','string'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($request['email'])->send( new restpassword($request));
        if(request()->is('manager/register')){
            return redirect('manager/all')->with('flash_message', 'Manager Add Successfully!');
        }
        return redirect('users')->with('flash_message', 'Customer Add Successfully!');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pages.edit',compact('user'));

    }
    public function manager_profile_show(){

        return view('manager.profile')->with('user', Auth::user());
    }
    public function manager_profile_update(Request $request)
    {

        User::find($request->id)->update(['name' => $request->name, 'email' => $request->email]);
        return redirect()->back()->with('flash_message', 'Profile Upadated');
    }

    public function managerpassword(Request $request)
    {
       
        {
            $request->validate([
                'old_password' => ['required','min:8','string'],
                'password' => ['required','min:8','string','confirmed'],

            ]);
            $currentPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
            $user = User::find(Auth::user()->id);
            if(password_verify($request->old_password, $user->password)){
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                return redirect()->back()->with('flash_message', 'Password Updated');
            }
            else
            {
                return redirect()->back()->with('fail', 'Incorrect password');
            }
        }
    }
    public function storedownloadableview($id)
    {
        $shop = Shop::find($id);
        $shop_file = ShopFile::where('shop_id', '=', $shop->id)->orderBy('id', 'DESC')->get();
        return view('user.layout.storedownloadableview', compact('shop_file', 'shop'));

    }
    public function update(Request $request)
    {
        $user = User::find($request['id']);
        $user->update([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        ]);
        if($user->role == '0'){
            return redirect('users')->with('flash_message', 'User Profile Updated!');
        }
        if($user->role == '1'){
            return redirect('manager/all')->with('flash_message', 'Manager Profile Updated!');
        }
        else{
         return redirect()->back()->with('flash_message', 'Admin Profile Updated!');
        }
    }

    public function destroy($id)
    {

       $shop = Shop::where('user_id' , '=' , $id)->delete();
        User::destroy($id);


       return redirect()->back()->with('flash_message', 'User deleted! Sucessfully');
    }

    public function destroy_shop($id)
    {
        Shop::destroy($id);
        return redirect()->back()->with('flash_message', 'Shop deleted! Sucessfully');
    }

    public function view($id)
    {
        $user = User::find($id);
        return view('admin.pages.view')->with('user', $user);
        // return view('admin.pages.view');
    }

    public function adminpassword(Request $request)
    {
        $request->validate([
           'old_password' => ['required','min:8','string'],
        'password' => ['required','min:8','string','confirmed'],

        ]);
        $currentPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
        $user = User::find(Auth::user()->id);
        if(password_verify($request->old_password, $user->password)){
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
            return redirect()->back()->with('flash_message', 'Password Updated');
    }
        else
        {
            return redirect()->back()->with('fail', 'Incorrect password');
        }
    }

}