<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\LaporanApotik;
use Barryvdh\DomPDF\Facade as PDF;

class ApotikController extends Controller
{
  public function entry() {
    $obats = Obat::orderBy('nama_obat', 'asc')->where('stok_obat', '>', 0)->get();
    return view('dashboard.apotik.entry', compact('obats'));
  }

  public function store(Request $request) {
    $request->validate([
      'obat_id' => 'required',
      'nama_pasien' => 'required',
      'jumlah' => 'required|integer',
      'dosis' => 'required'
    ]);

    $apotik = new LaporanApotik();
    $obat = Obat::find($request->obat_id);

    if ($obat) {
      $apotik->obat_id = $request->obat_id;
      $apotik->nama_pasien = $request->nama_pasien;
      $apotik->jumlah = $request->jumlah;
      $apotik->dosis = $request->dosis . '/hari';
      $apotik->created_at = $request->date;
      $apotik->save();

      $obat->stok_obat = ($obat->stok_obat - $request->jumlah);
      $obat->save();

      return redirect()->route('apotik.entry')->with('berhasil', 'Berhasil entry data');
    } else {
      return redirect()->route('apotik.entry')->with('errorMessage', 'Gagal entry data');
    }
  }

  public function laporan() {
    $laporans = LaporanApotik::orderBy('created_at', 'desc')->get();
    return view('dashboard.apotik.laporan', compact('laporans'));
  }

  public function report(Request $request) {
    if (!$request->from || !$request->to) {
      return redirect()->route('apotik.laporan')->with('errorMessage', 'Mohon untuk memilih jarak tanggal terlebih dahulu');
    }
    $from = $request->from;
    $to = $request->to;
    $laporans = LaporanApotik::orderBy('created_at', 'asc')->whereBetween('created_at', [$request->from, $request->to])->get();
    $pdf = PDF::loadview('dashboard.admin.report.apotik', compact('laporans', 'from', 'to'))->setPaper('A4', 'potrait');
    return $pdf->stream();
  }
}
