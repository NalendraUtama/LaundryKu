<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {

        $record= Order::where('user_id',Auth::user()->id)
        ->with('status','menu','user')
        ->get();
        
        // $price=$record->menu->price;
        // $total = $record->jumlah_baju * $price;
        // dd($record);
        return view('user.order.index', compact('record'));
    }
    public function create()
    {

        $menu= Menu::all();
        // $menu= Menu::all();
        
        // dd($record);
        return view('user.order.create', compact('menu'));
    }
    public function store(Request $request)
    {
        // dd($request->name);
        $validated = $request->validate([
            'name'=>'required',
            'menu'=>'required',
            'jumlah_baju'=>'required',
            'note'=>'required',
        ]);

        if($validated){
            Order::create([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'menu_id' => $request->menu,
                'status_id' => 1,
                'note' => $request->note,
                'jumlah_baju' => $request->jumlah_baju,
            ]);
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil');
            return redirect('/order');
        }
        Session::flash('status', 'failed');
            Session::flash('message', 'Gagal');
            return redirect('/order');

    }
    public function getDataforCreate($id)
    {
        $menu= Menu::find($id);
        // dd($menu);
        return response()->json([
            'data' => $menu
        ]);
    }
}
