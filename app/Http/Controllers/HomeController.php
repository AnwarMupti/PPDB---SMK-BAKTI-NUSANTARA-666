<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class HomeController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::where('aktif', true)->get();
        return view('home', compact('jurusan'));
    }

    public function showJurusan($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.detail', compact('jurusan'));
    }
}