<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
  protected $table = 'obats';

  public function kategori() {
    return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
  }

  public function obatkeluar() {
    return $this->hasMany(ObatKeluar::class, 'obat_id', 'id')->with('sumberobatkeluar');
  }

  public function obatmasuk() {
    return $this->hasMany(ObatMasuk::class, 'obat_id', 'id')->with('sumberobatmasuk')->orderBy('sumber_id', 'asc');
  }

  public function apotik() {
    return $this->hasMany(LaporanApotik::class, 'obat_id', 'id');
  }
}
