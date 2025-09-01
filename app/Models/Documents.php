<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documents extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'documents';
    protected $fillable = ['nama', 'jenis', 'bulan_pengesahan', 'link', 'bukti dukung', 'bank', 'keterangan'];
}
