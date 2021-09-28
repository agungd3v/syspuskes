<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberObatKeluar extends Model
{
  protected $table = 'sumber_obat_keluars';

  public function obatkeluar() {
    return $this->hasMany(ObatKeluar::class, 'sumber_id', 'id');
  }
}
