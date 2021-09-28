<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
  protected $table = 'obat_masuks';

  public function obat() {
    return $this->belongsTo(Obat::class, 'obat_id', 'id');
  }

  public function sumberobatmasuk() {
    return $this->belongsTo(SumberObatMasuk::class, 'sumber_id', 'id');
  }
}
