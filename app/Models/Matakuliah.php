<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama_matakuliah', 'sks'];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
