<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name','slug','description','release_date','rating','ticket_price','country','genre','photo'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
