<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Obat;

class ObatController extends Controller
{
  public function getObat() {
    $obats = Obat::with(['kategori', 'obatmasuk', 'obatkeluar'])->get();
    return response()->json([
      'status' => true,
      'data' => $obats
    ]);
  }
}
