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
        session(['dark-mode' => false]);
        $data['title'] = 'Penilaian';
        $alternatif = Alternatif::with('penilaian.subkriteria')->get();
        $kriteria = Kriteria::with('subkriteria')->orderBy('id','ASC')->get();
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
            Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }
}