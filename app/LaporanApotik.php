<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanApotik extends Model
{
  protected $table = 'laporan_apotiks';

  public function obat() {
    return $this->belongsTo(Obat::class, 'obat_id', 'id');
  }
}
