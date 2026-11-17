<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareerCategory extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'category_name',
        'url',
        'image',
    ];

    public function careers(): HasMany
    {
        return $this->hasMany(Career::class, 'category_id');
    }
}
