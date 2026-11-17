<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Career extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'category_id',
        'career_name',
        'image',
        'description',
        'url',
        'about_career',
        'roles_responsibilities',
        'key_skills',
        'salary_demand',
        'entry_level_salary',
        'mid_level_salary',
        'senior_level_salary',
        'industry_demand',
        'demand_percentage',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }
}
