<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiAggregate extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'batch_date',
        'summary_data',
    ];

    protected $casts = [
        'summary_data' => 'array',
        'batch_date' => 'date',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
