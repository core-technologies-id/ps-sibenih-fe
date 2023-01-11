<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Produsen;
use Illuminate\Http\Request;

class ProdusenController extends Controller
{
    public function get_data(Request $request)
    {
        if (isset($request->produsen)) {
            $data = new Produsen();
            $data = $data->where('id', $request->produsen)->first();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
            
        } else if (isset($request->datatable) && $request->datatable === 'false' && isset($request->id)) {
            $query = Produsen::where('id', $request->id)->get();
            return response()->json($query, 200);
        }
        else {
            $data = new Produsen();
            return response()->json($data->get(), 200);
        }
    }
}
