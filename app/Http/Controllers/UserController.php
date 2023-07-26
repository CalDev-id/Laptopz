<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->roles !== 'Administrator') {
                abort(401, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = User::orderBy('id','ASC')->get();
        $data['adminCount'] = User::where('roles', 'Administrator')->count();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('user.index', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Alternatif';
        $data['listuser'] = User::orderBy('id','ASC')->get();
        $data['user'] = User::findOrFail($id);
        $data['adminCount'] = User::where('roles', 'Administrator')->count();
        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'email' => 'required|string',
            'roles' => 'required|string'
        ]);

        try {
            $user = User::findOrFail($id);

            $adminCount = User::where('roles', 'Administrator')->count();

            if ($adminCount > 1 || ($user->roles === 'Member' && $adminCount === 1) || ($user->roles === 'Administrator' && $request->roles !== 'Member' && $adminCount <= 1)) {
                $user->update([
                    'name'  => $request->name,
                    'email' => $request->email,
                    'roles' => $request->roles
                ]);
                return back()->with('msg','Berhasil merubah data');
            } else {
                return back()->with('erradmin','Gagal merubah data');
            }
        } catch (Exception $e) {
            return back()->with('err','Gagal merubah data');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $adminCount = User::where('roles', 'Administrator')->count();

            if ($adminCount > 1 || ($user->roles === 'Member' && $adminCount === 1)) {
                $user->delete();
            } else {
                return back()->with('err','Tidak dapat menghapus data pengguna dengan peran "Administrator" tunggal');
            }
        } catch (Exception $e) {
            return back()->with('err','Gagal menghapus data');
        }
    }
}
