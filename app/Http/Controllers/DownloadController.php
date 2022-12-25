<?php

namespace App\Http\Controllers;

use App\Models\MagFile;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $files = MagFile::orderBy('id', 'desc')->get();
        return view('pages.download.index', compact('files'));
    }
}
