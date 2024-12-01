<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'timezone',
        'language',
        'currency_format',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}