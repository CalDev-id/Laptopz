<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class AlternatifController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Alternatif';
        $data['alternatif'] = Alternatif::orderBy('id','ASC')->get();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('alternatif.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_alternatif' => 'required|string',
        ]);

        try {
            $alternatif = new Alternatif();
            $alternatif->nama_alternatif = $request->nama_alternatif;
            $alternatif->save();
            return back()->with('msg','Berhasil menambahkan data');
        } catch (Exception $e) {
            return back()->with('err','Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        session(['dark-mode' => false]);
        $data['title'] = 'Alternatif';
        $data['listalternatif'] = Alternatif::orderBy('id','ASC')->get();
        $data['alternatif'] = Alternatif::findOrFail($id);
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('alternatif.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_alternatif' => 'required|string',
        ]);

        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->update([
                'nama_alternatif' => $request->nama_alternatif,
            ]);
            return back()->with('msg','Berhasil merubah data');
        } catch (Exception $e) {
            return back()->with('err','Gagal merubah data');
        }
    }

    public function destroy($id)
    {
        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->delete();
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }
}
