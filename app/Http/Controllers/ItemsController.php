<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
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
    public function show()
    {
        $names = Item::groupBy('name')->get();
        $producers = Item::groupBy('producer')->get();

        return view('items.one', compact('names', 'producers'));
    }


    public function find(Request $request)
    {
        if($request->name != null){
            if($request->producer != null){
                $items = Item::where('name', $request->name)->where('producer', $request->producer)->get();
            }else{
                $items = Item::where('name', $request->name)->get();
            }
        }else{
            if($request->producer != null){
                $items = Item::where('producer', $request->producer)->get();
            }else{
                $items = null;
            }
        }
        return view('items.one', compact('items'));
    }
    
}
