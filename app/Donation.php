<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $guarded = [];

    public function ota()
    {
        return $this->belongsTo(User::class, 'ota_id');
    }

    public function paskas()
    {
        return $this->belongsTo(User::class, 'paskas_id');
    }
}
