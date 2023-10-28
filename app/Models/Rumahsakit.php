<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rumahsakit extends Authenticatable
{
    use HasFactory;

    protected $table = 'rumahsakit';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'ruangan',
        'telp'
    ];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }

}
