<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctor extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'specialty',
        'room',
        'visiting_hours',
        'visiting_days',
        'qualification',
        'phone',
        'email',
        'bio',
        'image',
        'is_active',
        'employee_id',
    ];

    protected $casts = [
        'visiting_days' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the employ that owns the doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employ(): BelongsTo
    {
        return $this->belongsTo(employee::class,'employee_id','id');
    }

    /**
     * Get visiting days as formatted string
     */
    public function getVisitingDaysFormattedAttribute()
    {
        if (is_array($this->visiting_days)) {
            return implode(', ', $this->visiting_days);
        }
        return $this->visiting_days;
    }
}
