<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $news = DB::table('pentas_sitepat_news')->orderBy('id', 'DESC')->limit(6)->get();
        return view('pages.home', [
            'news' => $news
        ]);
    }

    public function detail_news($id)
    {
        $data = DB::table('pentas_sitepat_news')->where('id', $id)->first();

        return view('pages.detailNews', [
            'data' => $data
        ]);
    }

    public function all_news()
    {
        $news = DB::table('pentas_sitepat_news')->orderBy('id', 'DESC')->paginate(9);
        return view('pages.allNews', [
            'news' => $news
        ]);
    }
}
