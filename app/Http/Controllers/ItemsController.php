<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Models\Item;
use App\Models\Order;

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
        $items = Item::orderBy('producer')->orderBy('name')->groupBy('name')->get();

        return view('items.one', compact('items'));
    }


    public function find($id)
    {
        $item = Item::find($id);

        if(!$item)
            return Redirect::back()->withError(['msg' =>'item not found']);

        $orders = Order::where('item_id', $item->id)->get();

        // calculate quantity of items in storage
        // TODO: substract items took out from storage

        // Na wyszukanym produkcie zrób zaokrąglenie do jednostki zakupu przyjmując że na 1 palecie mieści się maksymalnie
        // 80 rolek,  7 kartonów, 200 metrów bieżących, 150 M2 i 400 sztuk
        // Inne jednostki traktujemy jako sztuki. 
        // 1 paleta = 2 paczki

        // echo $item->name . " " . $item->unit . " " . $item->type . "<br>";
        
        $result = [
            "rolka" => 0,
            "KRT" => 0,
            "M" => 0,
            "M2" => 0,
            "szt" => 0,
            
        ];

        foreach($orders as $index => $order){
            // echo  $index+1 . ". " . $order->quantity . " " . $order->quantity_unit . "<br>";
            if($order->quantity_unit == "pełna paleta"){
                if($item->unit == "rolka"){
                    // echo  " - rolka<br>";
                    $result[$item->unit] += 80 * $order->quantity;
                }else if($item->unit == "KRT"){
                    // echo  " - KRT<br>";
                    $result[$item->unit] += 7 * $order->quantity;
                }else if($item->unit == "M"){
                    // echo  " - M<br>";
                    $result[$item->unit] += 200 * $order->quantity;
                }else if($item->unit == "M2"){
                    // echo  " - M2<br>";
                    $result[$item->unit] += 150 * $order->quantity;
                }else{
                    // echo  " - szt<br>";
                    $result["szt"] += 400 * $order->quantity;
                }
            }else if($order->quantity_unit == "paczka"){
                if($item->unit == "rolka"){
                    // echo  " - rolka<br>";
                    $result[$item->unit] += 80 * $order->quantity/2;
                }else if($item->unit == "KRT"){
                    // echo  " - KRT<br>";
                    $result[$item->unit] += 7 * $order->quantity/2;
                }else if($item->unit == "M"){
                    // echo  " - M<br>";
                    $result[$item->unit] += 200 * $order->quantity/2;
                }else if($item->unit == "M2"){
                    // echo  " - M2<br>";
                    $result[$item->unit] += 150 * $order->quantity/2;
                }else{
                    // echo  " - szt<br>";
                    $result["szt"] += 400 * $order->quantity/2;
                }
            }else{
                // echo  " - szt<br>";
                if($order->quantity){
                    $result["szt"] += $order->quantity;
                }else{
                    $result["szt"] += 1;
                }
            }
        }

        // dd($result, $orders);

        return view('items.result', compact('item', 'result'));
    }
    
}
