<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopFile;
use App\Models\User;
use App\Notifications\UpdateShopData;
use Auth;
use File;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::all();

        return view('admin.shop.index')->with('shops', $shop);
    }
    public function create(array $data)
    {
        $shop = Shop::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'facility_id' => $data['facility_id'],
            'user_id' => $data['user_id'],
        ]);
    }
    public function add($id)
    {
        $user = User::find($id);
        return view('admin.shop.add', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facility_id' => 'required',
            'user_id' => 'required',
        ]);

        Shop::create($request->all());
        if( Auth::user()->role == 1)
        {
            return redirect()->route('manager.shop')->with('flash_message', 'Shop Created Sucessfully');
        }
        return redirect()->route('shop')->with('flash_message', 'Shop Created Sucessfully');
    }
    public function test_report(Request $request)
    {
        $store = Shop::find($request->id);

        if ($file = $request->file('test_report')) {
            $extension = $file->getClientOriginalExtension();
            $filename = time();
            $report_name = $filename . '.' . $extension;
            $reportorignalname = $file->getClientOriginalName();

            $file->move(
                public_path('storage/Test_Reports'),
                $report_name
            );

        } else {
            $report_name = '';
            $reportorignalname = '';
        }
        if ($file = $request->file('required_document')) {
            $extension = $file->getClientOriginalExtension();
            $filename = time();
            $required_doc_name = $filename . '.' . $extension;
            $required_orignalname = $file->getClientOriginalName();

            $file->move(
                public_path('storage/required_document'),
                $required_doc_name
            );

        } else {
            $required_doc_name = '';
            $required_orignalname = '';
        }
        if ($file = $request->file('nov')) {
            $extension = $file->getClientOriginalExtension();
            $filename = time();
            $nov_name = $filename . '.' . $extension;
            $nov_orignalname = $file->getClientOriginalName();

            $file->move(
                public_path('storage/required_document'),
                $nov_name
            );
            $store_file = ShopFile::create([
                'shop_id' => $request->id,
                'note' => $request->note,
                'test_reports' => $report_name,
                'test_reports_name' => $reportorignalname,
                'required_document_name' => $required_orignalname,
                'required_document' => $required_doc_name,
                'nov' => $nov_name,
                'nov_name' => $nov_orignalname,
                'status' => '1',
            ]);
            return redirect()->back()->with('flash_message', 'Report Uploaded');
        }
        $store_file = ShopFile::create([
            'shop_id' => $request->id,
            'note' => $request->note,
            'test_reports' => $report_name,
            'test_reports_name' => $reportorignalname,
            'required_document_name' => $required_orignalname,
            'required_document' => $required_doc_name,
            'status' => '1',
        ]);

        $user = User::where('id', '=', $store->user_id)->first();
        $user->notify(new UpdateShopData($store));

        return redirect()->back()->with('flash_message', 'Report Uploaded');
    }
    public function storedownloadableview($id)
    {
        $shop = Shop::find($id);
        $shop_file = ShopFile::where('shop_id', '=', $shop->id)->orderBy('id', 'DESC')->get();
        return view('admin.shop.storedownloadableview', compact('shop_file', 'shop'));

    }

//    public function test_nov(Request $request)
//    {
//        $store = Shop::find($request->id);
//        $test = $store->down_nov;
//        if ($file = $request->file('test_report')) {
//            $extension = $file->getClientOriginalExtension();
//            $filename = time();
//            $name = $filename . '.' . $extension;
//            $clientorignalname = $file->getClientOriginalName();
//            $store->reportname = $clientorignalname;
//
//            $file->move(
//                public_path('storage/Test_Reports'),
//                $name
//            );
//            $store->down_nov = $name;
//            $store->save();
//        }
//
//
//        return redirect()->route('userstore')->with('sucsess', 'Shop Created Sucessfully');
//    }

    public function download_file($fileName)
    {

        return response()->download(public_path('storage/Test_Reports/' . $fileName));
    }

    public function download_required_document($fileName)
    {

        return response()->download(public_path('storage/required_document/' . $fileName));
    }

    public function usershop()
    {
        $shops = Shop::where('user_id', '=', Auth::user()->id)->get();

        return view('user.layout.shop', compact('shops'));
    }
    public function shop_edit($id)
    {
        $shop=Shop::find($id);
        return view('admin.shop.shop_edit',compact('shop'));
    }
    public function shop_update(Request $request)
    {
        Shop::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        if(Auth::user()->role==1){
        return redirect('manager/shop')->with('flash_message','Shop Updated');
            
        }
        return redirect('shop')->with('flash_message','Shop Updated');
    }
}
