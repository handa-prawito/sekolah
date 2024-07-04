<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Models\Footer;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RangkingController extends Controller
{
    //

    public function index(){
        return view('backend.pengguna.rangking.index');
    }

    public function create(){
        return view('backend.pengguna.rangking.create');
    }

    public function indexGlobal(){
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();
        $footer = Footer::first();


        return view('frontend.program.ranking.index', compact('jurusanM', 'kegiatanM', 'footer'));
    }
}
