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

    public function applyPreset(Request $request)
    {
        $this->validate($request, [
            'preset' => 'required|string',
        ]);

        try {
            $preset = $request->preset;
            session(['last_preset' => $preset]);

            Kriteria::where('id', '1')->update(['bobot' => 0]);
            Kriteria::where('id', '2')->update(['bobot' => 0]);
            Kriteria::where('id', '3')->update(['bobot' => 0]);
            Kriteria::where('id', '4')->update(['bobot' => 0]);
            Kriteria::where('id', '5')->update(['bobot' => 0]);
            Kriteria::where('id', '6')->update(['bobot' => 0]);
            Kriteria::where('id', '7')->update(['bobot' => 0]);
            Kriteria::where('id', '8')->update(['bobot' => 0]);
            Kriteria::where('id', '9')->update(['bobot' => 0]);

            if ($preset === 'allrounder') {
                Kriteria::where('id', '1')->update(['bobot' => 13]);
                Kriteria::where('id', '2')->update(['bobot' => 8]);
                Kriteria::where('id', '3')->update(['bobot' => 15]);
                Kriteria::where('id', '4')->update(['bobot' => 13]);
                Kriteria::where('id', '5')->update(['bobot' => 13]);
                Kriteria::where('id', '6')->update(['bobot' => 10]);
                Kriteria::where('id', '7')->update(['bobot' => 8]);
                Kriteria::where('id', '8')->update(['bobot' => 10]);
                Kriteria::where('id', '9')->update(['bobot' => 10]);
            } elseif ($preset === 'work/business') {
                Kriteria::where('id', '1')->update(['bobot' => 10]);
                Kriteria::where('id', '2')->update(['bobot' => 8]);
                Kriteria::where('id', '3')->update(['bobot' => 10]);
                Kriteria::where('id', '4')->update(['bobot' => 15]);
                Kriteria::where('id', '5')->update(['bobot' => 13]);
                Kriteria::where('id', '6')->update(['bobot' => 8]);
                Kriteria::where('id', '7')->update(['bobot' => 13]);
                Kriteria::where('id', '8')->update(['bobot' => 13]);
                Kriteria::where('id', '9')->update(['bobot' => 10]);
            } elseif ($preset === 'gamedevelopment') {
                Kriteria::where('id', '9')->update(['bobot' => 13]);
                Kriteria::where('id', '8')->update(['bobot' => 10]);
                Kriteria::where('id', '7')->update(['bobot' => 20]);
                Kriteria::where('id', '6')->update(['bobot' => 13]);
                Kriteria::where('id', '5')->update(['bobot' => 13]);
                Kriteria::where('id', '4')->update(['bobot' => 10]);
                Kriteria::where('id', '3')->update(['bobot' => 5]);
                Kriteria::where('id', '2')->update(['bobot' => 8]);
                Kriteria::where('id', '1')->update(['bobot' => 8]);
            } elseif ($preset === 'graphicdesign') {
                Kriteria::where('id', '1')->update(['bobot' => 13]);
                Kriteria::where('id', '2')->update(['bobot' => 8]);
                Kriteria::where('id', '3')->update(['bobot' => 13]);
                Kriteria::where('id', '4')->update(['bobot' => 10]);
                Kriteria::where('id', '5')->update(['bobot' => 13]);
                Kriteria::where('id', '6')->update(['bobot' => 15]);
                Kriteria::where('id', '7')->update(['bobot' => 8]);
                Kriteria::where('id', '8')->update(['bobot' => 10]);
                Kriteria::where('id', '9')->update(['bobot' => 10]);
            }

            return back()->with('msg', 'Berhasil menerapkan preset');
        } catch (Exception $e) {
            return back()->with('err', 'Gagal menerapkan preset');
        }
    }

    public function index()
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Kriteria';
        $data['kriteria'] = Kriteria::orderBy('id','ASC')->get();
        $data['lastPreset'] = session('last_preset');
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('kriteria.index', $data);
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
