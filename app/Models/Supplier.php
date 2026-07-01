<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    /**
     * Attributes yang boleh diisi masal (Mass Assignment).
     */
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'kontak',
        'email',
        'alamat',
    ];

    /**
     * Relasi ke BarangMasuk (Antisipasi Fase 3 agar tidak konflik dengan modul lain)
     */
    public function barangMasuks(): HasMany
    {
        return $this->hasMany(BarangMasuk::class, 'supplier_id');
    }
}