<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\Master\Kabupaten;
use App\Models\Sibenih\Produsen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdusenController extends Controller
{
    private $mainModel;
    private $kabupatenModel;
    public function __construct()
    {
        $this->mainModel = new Produsen();
        $this->kabupatenModel = new Kabupaten();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.sibenih.produsen.view');
    }

    public function get_data(Request $request)
    {
        // return $request;
        if (isset($request->datatable) && $request->datatable === 'false' && isset($request->nama_pt)) {
            $query = $this->mainModel->where('nama_pt', $request->nama_pt)->get();
            return response()->json($query, 200);
        } else if (isset($request->datatable) && $request->datatable === 'false' && isset($request->id)) {
            $query = $this->mainModel->where('id', $request->id)->get();
            return response()->json($query, 200);
        } else {
            $where = [];
            if ($request->session()->has('app')) {
                $module = $request->session()->get('app', $request->get('app'));
                $where[] = $module;
            }

            // make condition from filter to filter data
            if ($request->has('filter')) {
                $filter = $request->get('filter');
                if ($filter == 'Iya') {
                    $query = $this->mainModel->where('is_petani', $filter)->latest()->get();
                } elseif ($filter == 'Tidak') {
                    $query = $this->mainModel->where('is_petani', $filter)->latest()->get();
                } elseif ($filter == 'Semua') {
                    $query = $this->mainModel->latest()->orderBy('id', 'desc');
                }
            } else {
                $query = $this->mainModel->latest()->orderBy('id', 'desc');
            }

            return Datatables::of($query)
                ->addIndexColumn()
                ->editColumn("verified", function ($row) {
                    return ($row->verified == 1) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
                })
                ->editColumn("created_at", function ($row) {
                    return date('d-m-Y H:i:s', strtotime($row->created_at));
                })
                ->editColumn("nomor_tiket", function ($row) {
                    return isset($row->nomor_tiket) ? $row->nomor_tiket : '-';
                })
                ->editColumn("is_petani", function ($row) {
                    return isset($row->is_petani) ? $row->is_petani : '-';
                })
                ->editColumn("url_produsen", function ($row) {
                    return isset($row->url_produsen) ? '<span class="badge text-light bg-success">Ada</span>' : '<span class="badge text-light bg-danger">Belum</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('sibenih.produsen.edit', ['produsen' => $row->id]) . '" class="edit btn btn-primary btn-sm" data-toogle="tooltip" title="Edit #' . $row->id . '"><i class="far fa-edit"></i></a>';
                    $btn = $btn . ' <a href="#" class="btn btn-danger btn-sm delete" data-id=' . $row->id . ' data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></a>';
                    $btn = $btn . '<a href="' . route('sibenih.produsen.qrcode', ['produsen' => $row->id]) . '" class="edit btn btn-dark btn-sm ml-1" data-toogle="tooltip"><i class="fa fa-qrcode" aria-hidden="true"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->setRowData([
                    'data-toggle' => function ($row) {
                        return 'tooltip';
                    },
                    'title' => function ($row) {
                        return $row->caption;
                    },
                ])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $kabs = $this->kabupatenModel->get();

        $produsen = Produsen::select('nomor_tiket')->where('nomor_tiket', '!=', null)->count();
        $depan = 'A';

        if ($produsen) {
            $number = $produsen + 1;
            if ($number < 10) {
                $nol = '000';
            } elseif ($number < 100) {
                $nol = '00';
            } elseif ($number < 1000) {
                $nol = '0';
            } else {
                $nol = '';
            }
            $nomer_tiket = $depan . $nol . $number;
        } else {
            $nomer_tiket = $depan . '0001';
        }

        return view('pages.sibenih.produsen.form', compact('kabs', 'nomer_tiket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_rekomendasi' => 'required|string|unique:sibenih_produsen,nomor_rekomendasi',
            'nomor_tiket' => 'required|string|unique:sibenih_produsen,nomor_tiket',
            'nama_pt' => 'required|string|unique:sibenih_produsen,nama_pt',
            'tahun_usaha' => 'required|string',
            'npwp' => 'required|string',
            'nama_pimpinan' => 'required|string',
            'nik_pimpinan' => 'required|string',
            'alamat_usaha' => 'required|string',
            'kota' => 'required|string',
            'hp' => 'required|string|unique:sibenih_produsen,hp',
            'email' => 'required|string',
            'status_usaha' => 'required|string',
            'bentuk_usaha' => 'required|string',
            'logo_usaha' => 'nullable|string',
            'foto_pimpinan' => 'nullable|string',
            'foto_ktp' => 'nullable|string',
            'username' => 'required|string|unique:sibenih_produsen,username',
            'password' => 'required|string',
            'password_conf' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $this->mainModel->insert([
            'nomor_rekomendasi' => $request->nomor_rekomendasi,
            'nama_pt' => $request->nama_pt,
            'tahun_usaha' => $request->tahun_usaha,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nik_pimpinan' => $request->nik_pimpinan,
            'alamat_usaha' => $request->alamat_usaha,
            'kota' => $request->kota,
            'hp' => $request->hp,
            'email' => $request->email,
            'status_usaha' => $request->status_usaha,
            'bentuk_usaha' => $request->bentuk_usaha,
            'logo_usaha' => $request->logo_usaha,
            'foto_pimpinan' => $request->foto_pimpinan,
            'foto_ktp' => $request->foto_ktp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        return redirect()->route('sibenih.produsen.create')->with('flash_success', 'Data berhasil disimpan!');
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
        $data = $this->mainModel->findOrFail($id);
        $kabs = $this->kabupatenModel->get();
        $produsen = Produsen::select('nomor_tiket')->where('nomor_tiket', '!=', null)->count();
        $depan = 'A';

        if ($produsen) {
            $number = $produsen + 1;
            if ($number < 10) {
                $nol = '000';
            } elseif ($number < 100) {
                $nol = '00';
            } elseif ($number < 1000) {
                $nol = '0';
            } else {
                $nol = '';
            }
            $nomer_tiket = $depan . $nol . $number;
        } else {
            $nomer_tiket = $depan . '0001';
        }
        return view('pages.sibenih.produsen.form', compact('nomer_tiket'))
            ->withId($id)
            ->withKabs($kabs)
            ->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_rekomendasi' => "required|string|unique:sibenih_produsen,nomor_rekomendasi,$id",
            'nomor_tiket' => "required|string",
            'nama_pt' => "required|string|unique:sibenih_produsen,nama_pt,$id",
            'tahun_usaha' => 'required|string',
            'npwp' => 'required|string',
            'nama_pimpinan' => 'required|string',
            'nik_pimpinan' => 'required|string',
            'alamat_usaha' => 'required|string',
            'kota' => 'required|string',
            'hp' => "required|string|unique:sibenih_produsen,hp,$id",
            'email' => "required|string",
            'status_usaha' => 'required|string',
            'bentuk_usaha' => 'required|string',
            'logo_usaha' => 'nullable|string',
            'foto_pimpinan' => 'nullable|string',
            'foto_ktp' => 'nullable|string',
            'username' => "required|string|unique:sibenih_produsen,username,$id"
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $input = Arr::except($request->all(), ['_token', '_method', 'logo_usaha_file', 'foto_pimpinan_file', 'foto_ktp_file']);
        if ($request->hasfile('logo_usaha_file')) {
            $fullpath = upload_file('logo_usaha_file', 'sibenih/produsen/logo_usaha');
            $input['logo_usaha'] = $fullpath;
        }

        if ($request->hasfile('foto_pimpinan_file')) {
            $fullpath = upload_file('foto_pimpinan_file', 'sibenih/produsen/foto_pimpinan');
            $input['foto_pimpinan'] = $fullpath;
        }
        if ($request->hasfile('foto_ktp_file')) {
            $fullpath = upload_file('foto_ktp_file', 'sibenih/produsen/foto_ktp');
            $input['foto_ktp'] = $fullpath;
        }
        $this->mainModel->where('id', $id)->update($input);
        return redirect()->route('sibenih.produsen.edit', ['produsen' => $id])->with('flash_success', 'Data updated!');
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

    public function insertUrl(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'url_produsen' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $this->mainModel->where('id', $request->id)->update([
            'url_produsen' => $request->url_produsen
        ]);

        return redirect()->route('sibenih.produsen.qrcode', ['produsen' => $request->id])->with('flash_success', 'Data updated!');
    }
}
