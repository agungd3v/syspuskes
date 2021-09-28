<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberObatMasuk extends Model
{
  protected $table = 'sumber_obat_masuks';

  public function obatmasuk() {
    return $this->hasMany(ObatMasuk::class, 'sumber_id', 'id');
  }
}
