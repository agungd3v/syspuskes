<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
  protected $table = 'obat_keluars';

  public function obat() {
    return $this->belongsTo(Obat::class, 'obat_id', 'id');
  }

  public function sumberobatkeluar() {
    return $this->belongsTo(SumberObatKeluar::class, 'sumber_id', 'id');
  }
}
