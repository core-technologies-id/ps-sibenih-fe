<?php

namespace App\Http\Controllers\Sibenih;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Produsen;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\Sibenih\Varietas;
use App\Models\Sibenih\Komoditas;
use App\Models\Sibenih\KelasBenih;
use App\Models\Sibenih\TanamPangan;
use App\Models\ProdusenAlamat;

class TanamPanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanamPangan = TanamPangan::join('sibenih_produsen as pro', 'pro.id', '=', 'sibenih_tanam_pangan.s1_produsen_id')
            ->join('sibenih_mas_varietas as var', 'var.id', '=', 'sibenih_tanam_pangan.s2_varietas_id')
            ->join('sibenih_mas_produsen_alamat as prodAlm', 'prodAlm.id', '=', 'sibenih_tanam_pangan.s1_produsen_alamat_id')
            //->join('pentas_sitepat_user as user', 'user.id', '=', 'sibenih_tanam_pangan.admin_id')
            ->select(
                'sibenih_tanam_pangan.*',
                'pro.nama_pt as pro_nama_pt',
                'pro.nama_pimpinan as pro_nama_pimpinan',
                'var.nama as var_nama_varietas',
                'prodAlm.s2_luas_tanah as luas_pertanaman',
                // 'user.name as admin_name'
            )
            ->where('sibenih_tanam_pangan.s1_produsen_id', \Auth::user()->id)
            ->get();

        return view('pages.sibenih.tanamPangan.daftar_permohonan', compact('tanamPangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $userId = \Auth::user()->id;

        return view('pages.sibenih.tanamPangan.form', [
            'userId' => $userId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $s1_nomor_antrian = '';

        $tanampangan = TanamPangan::all()->count();
        $depan = 'BTP';

        if ($tanampangan) {
            $number = $tanampangan + 1;
            if ($number < 10) {
                $nol = '00';
            } elseif ($number < 100) {
                $nol = '0';
            } else {
                $nol = '';
            }
            $s1_nomor_antrian = $depan . $nol . $number;
        } else {
            $s1_nomor_antrian = $depan . '001';
        }

        $validator = Validator::make($request->all(), [
            // "s1_nomor_antrian" => 'string|max:255|required',
            "s1_nomor_surat" => "string|max:255",
            "s1_nomor_lapangan" => "max:255",
            "s1_block" => "required",
            "s1_luas_tanah" => 'required',
            "s1_musim_tanam" => "required",
            "s1_komoditas_id" => "required",
            "s1_varietas_id" => "required",
            "s1_produsen_id" => "required",
            "s1_produsen_alamat_id" => "required",
            "s2_komoditas_id" => "required",
            "s2_varietas_id" => "required",
            "s2_tgl_panen" => "nullable|date|string",
            "s3_produsen" => "required",
            "s3_kelas_benih_id" => "required",
            "s3_no_kel_benih" => "required",
            "s3_no_label_sumber" => "required",
            "s3_jml_benih" => "required",
            "s2_kelas_benih_id" => "nullable",
            "kelas_benih" => "nullable",
            "tahun_musim" => "required",
            "status" => "string",
        ], [
            's1_nomor_surat.max:255' => 'Nomor surat not more than 255 characters',
            's1_nomor_lapangan.max:255' => 'Nomor lapangan not more than 255 characters',
            'block.required' => 'The block field is required',
            "s1_luas_tanah.required" => 'The luas tanah field is required',
            "s1_musim_tanam.required" => "The musim tanam field is required",
            "s1_komoditas_id.required" => "The komoditas field is required",
            "s1_varietas_id.required" => "The varietas field is required",
            "s1_produsen_id.required" => "The produsen field is required",
            "s1_produsen_alamat_id.required" => "The produsen alamat field is required",
            "s2_komoditas_id.required" => "The komoditas field is required",
            "s2_varietas_id.required" => "The varietas field is required",
            "s3_produsen.required" => "The produsen field is required",
            "s3_kelas_benih_id.required" => "The kelas benih field is required",
            "s3_no_kel_benih.required" => "The nomor kelompok benih field is required",
            "s3_no_label_sumber.required" => "The no label sumber field is required",
            "s3_jml_benih.required" => "The jumlah benih field is required",
            "tahun_musim.required" => "The tahun musim field is required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $input = Arr::except($request->all(), [
            '_token', '_method', 's6_ttd',
            's6_label_benih', 's6_dena_lokasi', 's6_surat_rekom',
            's6_surat_pengantar', 's1_alamat', 'judul'
        ]);
        $input['s1_nomor_antrian'] = $s1_nomor_antrian;

        if ($request->hasfile('s6_ttd')) {
            $fullpath = upload_file('s6_ttd', 'sibenih/tanampangan/s6_ttd');
            $input['s6_ttd'] = $fullpath;
        }

        if ($request->hasfile('s6_label_benih')) {
            $fullpath = upload_file('s6_label_benih', 'sibenih/tanampangan/s6_label_benih');
            $input['s6_label_benih'] = $fullpath;
        }

        if ($request->hasfile('s6_dena_lokasi')) {
            $fullpath = upload_file('s6_dena_lokasi', 'sibenih/tanampangan/s6_dena_lokasi');
            $input['s6_dena_lokasi'] = $fullpath;
        }

        if ($request->hasfile('s6_surat_rekom')) {
            $fullpath = upload_file('s6_surat_rekom', 'sibenih/tanampangan/s6_rekomendasi');
            $input['s6_surat_rekom'] = $fullpath;
        }

        if ($request->hasfile('s6_surat_pengantar')) {
            $fullpath = upload_file('s6_surat_pengantar', 'sibenih/tanampangan/s6_surat_pengantar');
            $input['s6_surat_pengantar'] = $fullpath;
        }

        if ($request->s7_pemeriksaan_lapangan == "Lulus") {
            $input['s7_pemeriksaan_lapangan'] = true;
        } else {
            $input['s7_pemeriksaan_lapangan'] = false;
        }

        if ($request->s7_disertifikasi == "Ya") {
            $input['s7_disertifikasi'] = true;
        } else {
            $input['s7_disertifikasi'] = false;
        }

        $input['created_at'] = now();
        $input['s2_tgl_panen'] = new Carbon($input['s2_tgl_panen']);
        $input['s2_tgl_tebar'] = new Carbon($input['s2_tgl_tebar']);
        $input['s2_tgl_tanam'] = new Carbon($input['s2_tgl_tanam']);
        $input['s2_tgl_pendhl'] = null;
        $input['s2_tgl_vegetatif'] = null;
        $input['s2_tgl_primordia'] = null;
        $input['s2_tgl_masak'] = null;
        $input['status'] = 'verified';
        $input['admin_id'] = auth()->user()->id;
        // $input['s2_tgl_pendhl'] = new Carbon($input['s2_tgl_pendhl']);
        // $input['s2_tgl_vegetatif'] = new Carbon($input['s2_tgl_vegetatif']);
        // $input['s2_tgl_primordia'] = new Carbon($input['s2_tgl_primordia']);
        // $input['s2_tgl_masak'] = new Carbon($input['s2_tgl_masak']);

        TanamPangan::insert($input);
        return back()->with('flash_success', 'Data berhasil disimpan!');
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
        $kabupatens = Kabupaten::all();
        $varietas = Varietas::all();
        $kelas_benih = KelasBenih::all();
        $komoditas = Komoditas::all();
        $produsens = Produsen::all();
        $data = TanamPangan::join('sibenih_produsen as pro', 'pro.id', '=', 'sibenih_tanam_pangan.s1_produsen_id')
            ->select('sibenih_tanam_pangan.*', 'pro.alamat_usaha as s1_alamat')
            ->where('sibenih_tanam_pangan.id', $id)->first();

        $userId = \Auth::user()->id;
        return view('pages.sibenih.tanampangan.form', compact('id', 'userId', 'data'));
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
            "status" => "string",
            "nomor_antrian" => "string|max:255",
            "s1_nomor_lapangan" => "max:255",
            "s1_nomor_antrian" => "required",
            "s1_block" => "required",
            "s1_musim_tanam" => "required",
            "s1_komoditas_id" => "required",
            "s1_varietas_id" => "required",
            "s1_produsen_id" => "required",
            "s1_produsen_alamat_id" => "required",
            "s2_komoditas_id" => "required",
            "s2_varietas_id" => "required",
            "s2_tgl_panen" => "nullable|date|string",
            "s3_produsen" => "required",
            "s3_kelas_benih_id" => "nullable",
            "s3_no_kel_benih" => "required",
            "s3_no_label_sumber" => "required",
            "s3_jml_benih" => "required",
            "s2_kelas_benih_id" => "nullable",
        ]);

        $input = Arr::except($request->all(), [
            '_token', '_method', 's6_ttd',
            's6_label_benih', 's6_dena_lokasi', 's6_surat_rekom',
            's6_surat_pengantar', 's1_alamat', 'judul'
        ]);

        if ($request->hasfile('s6_ttd')) {
            $fullpath = upload_file('s6_ttd', 'sibenih/tanampangan/s6_ttd');
            $input['s6_ttd'] = $fullpath;
        }

        if ($request->hasfile('s6_label_benih')) {
            $fullpath = upload_file('s6_label_benih', 'sibenih/tanampangan/s6_label_benih');
            $input['s6_label_benih'] = $fullpath;
        }

        if ($request->hasfile('s6_dena_lokasi')) {
            $fullpath = upload_file('s6_dena_lokasi', 'sibenih/tanampangan/s6_dena_lokasi');
            $input['s6_dena_lokasi'] = $fullpath;
        }

        if ($request->hasfile('s6_surat_rekom')) {
            $fullpath = upload_file('s6_surat_rekom', 'sibenih/tanampangan/s6_rekomendasi');
            $input['s6_surat_rekom'] = $fullpath;
        }

        if ($request->hasfile('s6_surat_pengantar')) {
            $fullpath = upload_file('s6_surat_pengantar', 'sibenih/tanampangan/s6_surat_pengantar');
            $input['s6_surat_pengantar'] = $fullpath;
        }

        if ($request->s7_pemeriksaan_lapangan) {
            $input['s7_pemeriksaan_lapangan'] = true;
        } else {
            $input['s7_pemeriksaan_lapangan'] = false;
        }

        if ($request->s7_disertifikasi) {
            $input['s7_disertifikasi'] = true;
        } else {
            $input['s7_disertifikasi'] = false;
        }

        $input['updated_at'] = now();
        $input['created_at'] = now();
        $input['s2_tgl_panen'] = new Carbon($input['s2_tgl_panen']);
        $input['s2_tgl_tebar'] = new Carbon($input['s2_tgl_tebar']);
        $input['s2_tgl_tanam'] = new Carbon($input['s2_tgl_tanam']);
        $input['admin_id'] = auth()->user()->id;
        $input['status'] = 'revision_updated';
        // $input['s2_tgl_pendhl'] = new Carbon($input['s2_tgl_pendhl']);
        // $input['s2_tgl_vegetatif'] = new Carbon($input['s2_tgl_vegetatif']);
        // $input['s2_tgl_primordia'] = new Carbon($input['s2_tgl_primordia']);
        // $input['s2_tgl_masak'] = new Carbon($input['s2_tgl_masak']);

        Tanampangan::where('id', $id)->update($input);
        return back()->with('flash_success', 'Data updated!');
    }

    public function export(Request $request)
    {
        $query = TanamPangan::join('sibenih_produsen as pro', 'pro.id', '=', 'sibenih_tanam_pangan.s1_produsen_id')
            ->leftJoin('sibenih_mas_produsen_alamat as prodAlm', 'prodAlm.id', '=', 'sibenih_tanam_pangan.s1_produsen_alamat_id')
            ->leftJoin('sibenih_mas_varietas as var1', 'var1.id', '=', 'sibenih_tanam_pangan.s1_varietas_id')
            ->leftJoin('sibenih_mas_varietas as var2', 'var2.id', '=', 'sibenih_tanam_pangan.s2_varietas_id')
            ->leftJoin('sibenih_mas_komoditas as kom', 'kom.id', '=', 'sibenih_tanam_pangan.s1_komoditas_id')
            ->leftJoin('sibenih_mas_kelas as kelas1', 'kelas1.id', '=', 'sibenih_tanam_pangan.s2_kelas_benih_id')
            ->leftJoin('sibenih_mas_kelas as kelas2', 'kelas2.id', '=', 'sibenih_tanam_pangan.s3_kelas_benih_id')
            ->leftJoin('pentas_sitepat_user as user', 'user.id', '=', 'sibenih_tanam_pangan.admin_id')
            ->select(
                'sibenih_tanam_pangan.*',
                'pro.nama_pt as pro_nama_pt',
                'pro.nama_pimpinan as pro_nama_pimpinan',
                'var1.nama as var_nama_varietas1',
                'var2.nama as var_nama_varietas2',
                'kom.nama as kom_nama_komoditas',
                'kelas1.nama as kelas1_nama_kelas',
                'kelas2.nama as kelas2_nama_kelas',
                'user.name as admin_name'
            )->get();


        $data = $query->where('id', $request->id)->first();

        $produsenAlamat = ProdusenAlamat::join('sibenih_mas_kabupaten as kabupaten', 'kabupaten.id', '=', 'sibenih_mas_produsen_alamat.s2_kabupaten_id')
            ->join('sisaras_kecamatan as kecamatan', 'kecamatan.idkecamatan', '=', 'sibenih_mas_produsen_alamat.s2_kecamatan_id')
            ->select(
                'sibenih_mas_produsen_alamat.*',
                'kabupaten.nama as kabupaten',
                'kecamatan.kecamatan as kecamatan',
            )->get();

        $produsenAlamat = $produsenAlamat->where('id', $data->s1_produsen_alamat_id)->first();

        $pdf = PDF::loadView('pages.sibenih.tanamPangan.export_tanamPangan', compact('data', 'produsenAlamat'));
        return $pdf->download("Sertifikasi Permohonan Tanampangan" . "_" . date('d-m-Y') . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TanamPangan::destroy($id);
        return back()->with('flash_success', 'Data berhasil dihapus!');
    }

    public function api_get_all(Request $request)
    {
        $all =
            DB::table('sibenih_tanam_pangan as main')
                ->selectRaw('
                    main.*,
                    prod.id as produsen_id,
                    prod.nama_pimpinan,
                    prod.alamat_usaha,
                    prod.nomor_rekomendasi as no_registrasi,
                    komoditas1.nama as komoditas_pemohon,
                    komoditas2.nama as komoditas_sebelumnya,
                    var1.nama as varietas_sertifikasi,
                    var2.nama as varietas_sebelumnya,
                    district.name as kecamatan,
                    regency.name as kabupaten,
                    province.name as provinsi,
                    kelas.nama as kelas_benih,
                    kelas2.nama as kelas_benih_asal,
                    mas_alamat.s1_alamat_lengkap as alamat_lengkap_produksi
                ')
                ->join('sibenih_produsen as prod', 'prod.id', '=', 'main.s1_produsen_id')
                ->join('sibenih_mas_komoditas as komoditas1', 'komoditas1.id', '=', 'main.s1_komoditas_id')
                ->join('sibenih_mas_komoditas as komoditas2', 'komoditas2.id', '=', 'main.s2_komoditas_id')
                ->join('sibenih_mas_varietas as var1', 'var1.id', '=', 'main.s1_varietas_id')
                ->join('sibenih_mas_varietas as var2', 'var2.id', '=', 'main.s2_varietas_id')
                ->join('sibenih_mas_produsen_alamat as mas_alamat', 'mas_alamat.s1_produsen_id', '=', 'main.s1_produsen_id')
                ->join('master_districts as district', 'district.id', '=', 'mas_alamat.s2_kecamatan_id')
                ->join('master_regencies as regency', 'regency.id', '=', 'mas_alamat.s2_kabupaten_id')
                ->join('master_provinces as province', 'province.id', '=', 'regency.province_id')
                ->join('sibenih_mas_kelas as kelas', 'kelas.id', '=', 'main.s2_kelas_benih_id')
                ->join('sibenih_mas_kelas as kelas2', 'kelas2.id', '=', 'main.s3_kelas_benih_id')
                ->whereNull('main.deleted_at')
        ;

        $sortColumn = $request->input('sort_by', 'id');
        $sortOrder = $request->input('order_by', 'ASC');
        $all = $all->orderBy($sortColumn, $sortOrder);

        if (isset($request->where)) {
            $all = $all->whereRaw($request->where);
        }

        $all = $all->get();

        $perPage = request('per_page', 25);
        $page = request('page', 1);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $all->forPage($page, $perPage),
            $all->count(),
            $perPage,
            $page,
            ['path' => url('api/tanam-pangan')]
        );

        $transformedData = $paginator->map(function ($item) {
            // Ubah format data sesuai kebutuhan
            return [
                "PRODUSEN_ID" => $item->produsen_id,
                "INSTALASI_ID" => null,
                "NO_REGISTRASI" => $item->no_registrasi,
                "NOMOR_PEMOHON" => $item->s1_nomor_lapangan,
                "PARAF_PEMOHON" => null,
                "KEPADA_PEMOHON" => "Kepala BPSB Sumsel",
                "DI_INSTALASI_PEMOHON" => "Palembang",
                "MUSIM_TANAM_PEMOHON" => $item->s1_musim_tanam === 'asep' ? 'April - September' : 'Oktober - Maret',
                "NOMOR_PERMOHONAN_PEMOHON" => $item->s1_nomor_lapangan,
                "NAMA_PEMOHON" => $item->nama_pimpinan,
                "ALAMAT_PEMOHON" => $item->alamat_usaha,
                "LUAS_PERTANAMAN_SERTIFIKASI" => $item->s1_luas_tanah,
                "KOMODITAS_PEMOHON" => $item->komoditas_pemohon,
                "VARIETAS_SERTIFIKASI" => $item->varietas_sertifikasi,
                "KELAS_BENIH_SERTIFIKASI" => $item->kelas_benih,
                "TANGGAL_TEBAR_SERTIFIKASI" => $item->s2_tgl_tebar,
                "TANGGAL_TANAM_SERTIFIKASI" => $item->s2_tgl_tanam,
                "BLOK_LETAK_TANAH" => $item->s1_block,
                "KAMPUNG_LETAK_TANAH" => null,
                "DESA_LETAK_TANAH" => $item->alamat_lengkap_produksi,
                "KECAMATAN_LETAK_TANAH" => $item->kecamatan,
                "KABUPATEN_LETAK_TANAH" => $item->kabupaten,
                "PROVINSI_LETAK_TANAH" => $item->provinsi,
                "NAMA_DESA_LETAK_TANAH" => null,
                "NAMA_KECAMATAN_LETAK_TANAH" => null,
                "NAMA_KABUPATEN_LETAK_TANAH" => null,
                "NAMA_PROVINSI_LETAK_TANAH" => null,
                "JENIS_TANAMAN_SEBELUMNYA" => $item->komoditas_sebelumnya,
                "TANGGAL_PANEN_SEBELUMNYA" => $item->s2_tgl_panen,
                "PEMERIKSAAN_LAPANGAN_SEBELUMNYA" => $item->s7_pemeriksaan_lapangan ? "Lulus" : "Tidak Lulus",
                "VARIETAS_SEBELUMNYA" => $item->varietas_sebelumnya,
                "KELAS_BENIH_SEBELUMNYA" => null,
                "DISERTIFIKASI_SEBELUMNYA" => $item->s7_disertifikasi ? "Ya" : "Tidak",
                "PRODUSEN_ASAL_BENIH" => $item->s3_produsen,
                "SUMBER_NOMOR_KELAS_ASAL_BENIH" => $item->s3_no_kel_benih,
                "NOMOR_KELOMPOK_ASAL_BENIH" => $item->s3_no_label_sumber,
                "JUMLAH_ASAL_BENIH" => $item->s3_jml_benih,
                "CATATAN_LAINLAIN" => null,
                "DIR_ttd" => $item->s6_ttd,
                "DIR_label_benih" => $item->s6_label_benih,
                "DIR_dena_lokasi" => $item->s6_dena_lokasi,
                "DIR_surat_rekom" => $item->s6_surat_rekom,
                "DIR_surat_pengantar" => $item->s6_surat_pengantar,
                "FORMULIR_TINDAKAN" => null,
                "FORMULIR_UPDATE" => null,
                "FORMULIR_CREATE" => null,
                "FORMULIR_STATUS" => null,
            ];
        })->values();

        $transformedPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $transformedData,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage()
        );

        return response()->json($transformedPaginator);
    }
}
