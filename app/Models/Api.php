<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "category",
        "link"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function like()
    {
        return $this->hasOne(Like::class);
    }
}
