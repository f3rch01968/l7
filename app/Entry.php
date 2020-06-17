<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    // $entry -> user    Relaciòn de entradas de usuarios
    // Entry n - 1 User  Un usuario puede tener n entradas o publicaciones
    // Eager loading

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // mutator

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

   //public function getRouteKeyName()  Solicitamos que la bùsqueda e hiciera por slug
    //{
    //    return 'slug';
    //}

    public function getUrl()
    {
        return url(url("entries/$this->slug-$this->id"));
    }
}
