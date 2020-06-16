<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    // $entry -> user    Relaciòn de entradas de usuarios
    // Entry n - 1 User  Un usuario puede tener n entradas o publicaciones
    // Eager loading

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
