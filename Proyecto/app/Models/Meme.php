<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    protected $fillable = [
           'meme_text',
           'fact',
           'titulo',
           'url',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
