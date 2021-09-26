<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
  protected $table = 'obat_keluars';

  public function obat() {
    return $this->belongsTo(Obat::class, 'obat_id', 'id');
  }
}
