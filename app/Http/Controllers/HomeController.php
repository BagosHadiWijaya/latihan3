<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dataAlternatif = Alternatif::all();
        $dataKriteria = Kriteria::all();
        return view('pages.welcome', compact('dataAlternatif', 'dataKriteria'));
    }
}
