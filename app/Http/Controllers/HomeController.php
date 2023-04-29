<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Artisan;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        $shops = Shop::where('user_id','=',Auth::user()->id)->get();
        return view('user.layout.index',compact('shops'));
    }

    public function userstore($id)
    {
        $pro = Shop::find($id);
        return view('user.layout.usershop', compact('pro'));
    }
    public function userprofile()
    {
        return view('user.layout.editprofile')->with('user', auth()->user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editorHome()
    {
        return view('manager.index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::where('role', '0')->count();
        $managers = User::where('role', '1')->count();
        $shops = Shop::count();
        return view('admin.dashboard.index', compact('users','shops', 'managers'));
    }

    public function storeview($id)
    {
        $pro = Shop::find($id);

        return view('admin.dashboard.storeview', compact('pro'));
    }

    public function editprofile()
    {
        return view('admin.dashboard.profile')->with('user', Auth::user());
    }
    
    public function managerprofile()
    {
        // return view('manager.profile')->with('user', Auth::user());
    }

    public function updateprofile(Request $request)
    {
        User::find($request->id)->update(['name' => $request->name, 'email' => $request->email]);
        return redirect()->back()->with('success', 'Profile Upadated');
    }

    public function userpassword(Request $request)
    {
        {
            $request->validate([
                'password' => 'required|min:8|confirmed',
                
            ]);
            $user = User::find(Auth::user()->id);
            if(password_verify($request->old_password, $user->password)){
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                return redirect()->back()->with('Success', 'Password Updated');
        }
            else
            {
                return redirect()->back()->with('fail', 'Incorrect password');
            }
        }
    }
    public function cacheClear()
    {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            return redirect()->route('admin.home')->withSuccess(__('System Cache Has Been Removed.'));
    }
    
}
