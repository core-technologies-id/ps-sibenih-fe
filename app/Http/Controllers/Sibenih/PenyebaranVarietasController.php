<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sibenih\PenyebaranVarietas;
use App\Models\sibenih_mas_kabupaten;
use App\Models\sibenih_mas_varietas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PenyebaranVarietasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varietas = sibenih_mas_varietas::orderBy('nama', 'ASC')->get();
        $kabupatens = sibenih_mas_kabupaten::all();
        return view('pages.sibenih.penyebaranVarietas.form', compact('varietas', 'kabupatens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "kabupaten_id" => "required",
            "varietas_id" => "required",
            "month" => "string|required",
            "year" => "required|numeric",
            "value" => "required|numeric"
        ]);

        $input = Arr::except($request->all(), [
            '_token', '_method', 'model'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        PenyebaranVarietas::insert($input);
        return redirect()->route('penyebaran_varietas.index')->with('flash_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
