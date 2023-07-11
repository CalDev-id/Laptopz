<?php

namespace App\Http\Controllers;

use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class SubkriteriaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_subkriteria'  => 'required|string',
            'bobot'             => 'required|numeric'
        ]);

        try {
            $subkriteria = new Subkriteria();
            $subkriteria->kriteria_id = $request->kriteria_id;
            $subkriteria->nama_subkriteria = $request->nama_subkriteria;
            $subkriteria->bobot = $request->bobot;
            $subkriteria->save();
            return back()->with('msg','Berhasil menambahkan data');
        } catch (Exception $e) {
            return back()->with('err','Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Sub Kriteria';
        $data['subkriteria'] = Subkriteria::findOrFail($id);
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('subkriteria.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $subkriteria = Subkriteria::findOrFail($id);
            $subkriteria->update([
                'nama_subkriteria'  => $request->nama_subkriteria,
                'bobot'             => $request->bobot
            ]);
            return back()->with('msg','Berhasil merubah data');
        } catch (Exception $e) {
            return back()->with('err','Gagal merubah data');
        }
    }

    public function destroy($id)
    {
        try {
            $subkriteria = Subkriteria::findOrFail($id);
            $subkriteria->delete();
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }
}
