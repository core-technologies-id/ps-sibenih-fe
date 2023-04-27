<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Produsen;
use App\Models\Sibenih\Master\Kabupaten;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProdusenControllerBak extends Controller
{
    private $mainModel;
    public function __construct()
    {
        $this->mainModel = new \App\Models\Sibenih\Produsen();
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
}
