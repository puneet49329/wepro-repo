<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        "api_id"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function apis()
    {
        return $this->belongsTo(Api::class, 'api_id', 'id');
    }
}
