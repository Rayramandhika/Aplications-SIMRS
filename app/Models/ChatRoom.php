<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_rooms'; // Ganti 'chat_rooms' sesuai dengan nama tabel obrolan

    // Definisikan hubungan jika diperlukan (misalnya, jika Anda memiliki hubungan antara pengguna dan obrolan)
    public function users()
    {
        return $this->hasMany(Rumahsakit::class); // Ganti 'User' dengan model pengguna yang sesuai
    }
}
