<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $data['title'] = 'Perhitungan';
        $alternatif = Alternatif::with('penilaian.subkriteria')->get();
        $kriteria = Kriteria::with('subkriteria')->orderBy('id','ASC')->get();
        $penilaian = Penilaian::with('subkriteria','alternatif')->get();
        if (count($penilaian) == 0)
        {
            return redirect(route('penilaian.index'));
        }

        // mencari min max
        foreach ($kriteria as $key => $value)
        {
            foreach ($penilaian as $key_1 => $value_1)
            {
                if ($value->id == $value_1->subkriteria->kriteria_id)
                {
                    if ($value->attribut == 'Benefit')
                    {
                        $minMax[$value->id][] = $value_1->subkriteria->bobot;
                    }
                    elseif ($value->attribut == 'Cost')
                    {
                        $minMax[$value->id][] = $value_1->subkriteria->bobot;
                    }
                }
            }
        }

        // normalisasi
        foreach ($penilaian as $key_1 => $value_1)
        {
            foreach ($kriteria as $key => $value)
            {
                if ($value->id == $value_1->subkriteria->kriteria_id)
                {
                    if ($value->attribut == 'Benefit')
                    {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = $value_1->subkriteria->bobot / max($minMax[$value->id]);
                    }
                    elseif ($value->attribut == 'Cost')
                    {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = min($minMax[$value->id]) / $value_1->subkriteria->bobot;
                    }
                }
            }
        }

        // perankingan
        foreach ($normalisasi as $key => $value)
        {
            foreach ($kriteria as $key_1 => $value_1)
            {
                $rank[$key][] = ($value[$value_1->id] * $value_1->bobot) / 100;
            }
        }

        $ranking = $normalisasi;
        foreach ($normalisasi as $key => $value)
        {
            $ranking[$key][] = array_sum($rank[$key]);
        }

        uasort($ranking, function ($a, $b) {
            $totalA = end($a);
            $totalB = end($b);
            return $totalA <=> $totalB;
        });

        $ranking = array_reverse($ranking, true);

        $data['bodyClass'] = 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
        return view('perhitungan.index', compact('alternatif','kriteria','normalisasi','ranking'), $data);
    }
}
