<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'storage_limit',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}