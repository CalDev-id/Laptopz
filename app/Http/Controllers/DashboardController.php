<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = User::count();
        $data['kriteria'] = Kriteria::count();
        $data['subkriteria'] = Subkriteria::count();
        $data['alternatif'] = Alternatif::count();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('dashboard.index', $data);
    }

    public function darkMode()
    {
        session(['dark-mode' => !session('dark-mode')]);
        return redirect()->back();
    }
}
