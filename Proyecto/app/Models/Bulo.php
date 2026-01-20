<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bulo extends Model
{
<<<<<<< HEAD

    protected $fillable = [
        'texto_bulo',
        'texto_desmentido',
        'user_id',
=======
    protected $fillable = [
        'texto',
        'texto_desmentido'
>>>>>>> d588ac2a64f0cd160723851e0b964a89c97f87a4
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
