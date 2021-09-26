<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  protected $table = 'kategoris';

  public function obat() {
    return $this->hasOne(Obat::class, 'kategori_id', 'id');
  }
}
