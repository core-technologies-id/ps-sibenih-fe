<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\Komoditas;
use App\Models\Sibenih\Varietas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VarietasController extends Controller
{
    public function get_data(Request $request)
    {
        if (isset($request->komoditas)) {
            $data = new Varietas();
            $kom = new Komoditas();
            $kom = $kom->where('id', $request->komoditas)->first();
            if ($kom) {
                return response()->json($data->where('komoditas_id', $kom->id)->get(), 200);
            }
            return response()->json([], 200);
        } else {
            $where = [];
            if ($request->session()->has('app')) {
                $module = $request->session()->get('app', $request->get('app'));
                $where[] = $module;
            }

            $query = Varietas::join('sibenih_mas_komoditas as komoditas', 'komoditas.id', '=', 'sibenih_mas_varietas.komoditas_id')
                ->select('sibenih_mas_varietas.*', 'komoditas.nama as komoditas')->get();

            return DB::of($query)
                ->addIndexColumn()
                ->editColumn("verified", function ($row) {
                    return ($row->verified == 1) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
                })
                ->editColumn("created_at", function ($row) {
                    return date('d-m-Y H:i:s', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('sibenih.varietas.edit', ['varieta' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-2" data-toogle="tooltip" title="Edit #' . $row->id . '"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<form action="' . route('sibenih.varietas.destroy', ['varieta' => $row->id]) . '" method="POST" class="d-inline-block">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-danger btn-sm delete" data-id=' . $row->id . ' data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></button>
                </form>';
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

            $data = new Varietas();
            return response()->json($data->get(), 200);
        }
    }
}
