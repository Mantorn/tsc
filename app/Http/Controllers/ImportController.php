<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class ImportController extends Controller
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
        return view('import');
    }
        

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $index => $line) {
            if($index == 0)
                continue;

            $data = str_getcsv($line);

            foreach($data as $i => $d){
                if($d == ""){
                    $data[$i] = null;
                }
            }

            if(!Item::find($data[0])){
                Item::create([
                    'id' => $data[0],
                    'name' => $data[1],
                    'producer' => $data[2],
                    'unit' => $data[3],
                    'weight' => $data[4],
                    'radius' => $data[5],
                    'length' => $data[6],
                    'width' => $data[7],
                    'depth' => $data[8],
                    'size' => $data[9],
                    'type' => $data[10],
                ]);
            }

            Order::create([
                'item_id' => $data[0],
                'quantity' => $data[11],
                'quantity_unit' => $data[12],
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}
