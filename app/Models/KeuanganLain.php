<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeuanganLain extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'keuangan_lains';
    protected $fillable = ['nama', 'bulan_pengesahan', 'link', 'keterangan'];

}
