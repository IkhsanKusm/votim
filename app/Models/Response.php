<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'value_data',
        'is_processed_by_ai',
    ];

    protected $casts = [
        'value_data' => 'array',
        'is_processed_by_ai' => 'boolean',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
