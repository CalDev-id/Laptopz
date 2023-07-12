<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['title'] = 'Penilaian';
        $alternatif = Alternatif::with('penilaian.subkriteria')->get();
        $kriteria = Kriteria::with('subkriteria')->orderBy('id','ASC')->get();
        $data['countpenilaian'] = Penilaian::with('subkriteria','alternatif')->get();
        $data['countkriteria'] = Kriteria::with('subkriteria')->get();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('penilaian.index', compact('alternatif','kriteria'), $data);
    }

    public function store(Request $request)
    {
        try {
            DB::select("TRUNCATE penilaian");
            foreach ($request->subkriteria_id as $key => $value)
            {
                foreach($value as $key_1 => $value_1)
                {
                    Penilaian::create([
                        'alternatif_id'     => $key,
                        'subkriteria_id'    => $value_1
                    ]);
                }
            }

            return back()->with('msg','Berhasil menyimpan penilaian');
        } catch (Exception $e) {
            return back()->with('err','Gagal menyimpan penilaian');
        }
    }

    public function clear()
    {
        try {
            DB::select("TRUNCATE penilaian");
            return back()->with('msg','Berhasil menghapus penilaian');
        } catch (Exception $e) {
            return back()->with('err', 'Gagal menghapus penilaian');
        }
    }
}
