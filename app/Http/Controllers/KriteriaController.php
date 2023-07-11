<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class KriteriaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Kriteria';
        $data['kriteria'] = Kriteria::orderBy('id','ASC')->get();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('kriteria.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'nama_kriteria' => 'required|string',
            'attribut'      => 'required|string',
            'bobot'         => 'required|numeric'
        ]);

        try {
            $kriteria = new Kriteria();
            $kriteria->kode = $request->kode;
            $kriteria->nama_kriteria = $request->nama_kriteria;
            $kriteria->attribut = $request->attribut;
            $kriteria->bobot = $request->bobot;
            $kriteria->save();
            return back()->with('msg','Berhasil menambahkan data');
        } catch (Exception $e) {
            return back()->with('err','Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Kriteria';
        $data['listkriteria'] = Kriteria::orderBy('id','ASC')->get();
        $data['kriteria'] = Kriteria::findOrFail($id);
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('kriteria.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'nama_kriteria' => 'required|string',
            'attribut'      => 'required|string',
            'bobot'         => 'required|numeric'
        ]);

        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->update([
                'kode' => $request->kode,
                'nama_kriteria' => $request->nama_kriteria,
                'attribut'      => $request->attribut,
                'bobot'         => $request->bobot
            ]);
            return back()->with('msg','Berhasil merubah data');
        } catch (Exception $e) {
            return back()->with('err','Gagal merubah data');
        }
    }

    public function destroy($id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->delete();
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }

    public function display($id)
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Sub Kriteria';
        $data['subkriteria'] = Subkriteria::where('kriteria_id',$id)->get();
        $data['kriteria'] = Kriteria::findOrFail($id);
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('kriteria.display', $data);
    }
}
