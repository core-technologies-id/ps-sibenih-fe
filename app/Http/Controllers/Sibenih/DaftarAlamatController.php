<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\Master\ProdusenAlamat;
use App\Models\Sibenih\Produsen;
use App\Models\Sibenih\Master\Kabupaten;
use App\Models\Sibenih\Master\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DaftarAlamatController extends Controller
{
    private $modelProdusen;
    private $modelKabupaten;
    private $modelKecamatan;
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new ProdusenAlamat();
        $this->modelProdusen = new Produsen();
        $this->modelKabupaten = new Kabupaten();
        $this->modelKecamatan = new Kecamatan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // return $request;
    public function get_produsen(Request $request)
    {
        if (isset($request->id)) {
            $data = new ProdusenAlamat();
            $data = $data->where('s1_produsen_id', $request->id)->get();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new Produsen();
            return response()->json($data->get(), 200);
        }
    }


    public function data_alamat(Request $request)
    {
        if (isset($request->id)) {
            $data = new ProdusenAlamat();
            $data = $data->join('sibenih_mas_kabupaten as kabupaten', 'kabupaten.id', '=', 'sibenih_mas_produsen_alamat.s2_kabupaten_id')
                ->join('sisaras_kecamatan as kecamatan', 'kecamatan.idkecamatan', '=', 'sibenih_mas_produsen_alamat.s2_kecamatan_id')
                ->select(
                    'sibenih_mas_produsen_alamat.*',
                    'kabupaten.nama as kabupaten',
                    'kecamatan.kecamatan as kecamatan',
                )
                ->get();
            $data = $data->where('id', $request->id)->first();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new ProdusenAlamat();
            return response()->json($data->get(), 200);
        }
    }

    public function index()
    {
        $daftarAlamats = ProdusenAlamat::join('sibenih_mas_kabupaten as kabupaten', 'kabupaten.id', '=', 'sibenih_mas_produsen_alamat.s2_kabupaten_id')
            ->join('sisaras_kecamatan as kecamatan', 'kecamatan.idkecamatan', '=', 'sibenih_mas_produsen_alamat.s2_kecamatan_id')
            ->join('sibenih_produsen as produsen', 'produsen.id', '=', 'sibenih_mas_produsen_alamat.s1_produsen_id')
            ->join('pentas_sitepat_user as user', 'user.id', '=', 'sibenih_mas_produsen_alamat.admin_id')
            ->select(
                'sibenih_mas_produsen_alamat.*',
                'produsen.nama_pt as produsen_nama_pt',
                'user.name as admin_name',
                'kabupaten.nama as kabupaten',
                'kecamatan.kecamatan as kecamatan',
            )
            ->where('sibenih_tanam_pangan.s1_produsen_id', auth()->user()->id)
            ->get();
        return view('pages.sibenih.daftarAlamat.view', [
            'daftarAlamats' => $daftarAlamats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produsens = $this->modelProdusen->get();
        $kecamatans = $this->modelKecamatan->get();
        $kabupatens = $this->modelKabupaten->get();
        return view('pages.sibenih.daftarAlamat.form', compact('produsens', 'kecamatans', 'kabupatens'));
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
            's1_produsen_id' => 'required',
            's1_alamat_lengkap' => 'required',
            's2_desa' => 'required',
            's2_kecamatan_id' => 'required',
            's2_kabupaten_id' => 'required',
            's2_luas_tanah' => 'required'
        ]);

        $input = Arr::except($request->all(), [
            '_token', '_method', 'model',
        ]);
        $input['created_at'] = now();
        $input['admin_id'] = auth()->user()->id;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $this->mainModel::insert($input);
        return redirect()->route('daftaralamat.index')->with('flash_success', 'Data berhasil disimpan!');
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
        $produsens = $this->modelProdusen->get();
        $kecamatans = $this->modelKecamatan->get();
        $kabupatens = $this->modelKabupaten->get();
        $data = $this->mainModel
            ->join('sibenih_produsen as produsen', 'produsen.id', '=', 'sibenih_mas_produsen_alamat.s1_produsen_id')
            ->select(
                'sibenih_mas_produsen_alamat.*',
                'produsen.nama_pt as produsen_nama_pt',
            )->where('sibenih_mas_produsen_alamat.id', $id)->first();

        return view('pages.sibenih.daftarAlamat.form', compact('produsens', 'kecamatans', 'kabupatens'))->withId($id)->withData($data);
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
        $validator = Validator::make($request->all(), [
            's1_produsen_id' => 'required',
            's1_alamat_lengkap' => 'required',
            's2_desa' => 'required',
            's2_kecamatan_id' => 'required',
            's2_kabupaten_id' => 'required',
            's2_luas_tanah' => 'required'
        ]);

        $input = Arr::except($request->all(), [
            '_token', '_method', 'model',
        ]);

        $input['admin_id'] = auth()->user()->id;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $this->mainModel->where('id', $id)->update($input);
        return redirect('/daftaralamat')->with('flash_success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mainModel->destroy($id);
        return redirect()->route('daftaralamat.index')->with('flash_success', 'Data berhasil dihapus!');
    }
}
