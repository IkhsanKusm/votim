<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'folder_id',
        'type',
        'title',
        'slug',
        'status',
        'closed_at',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
        'closed_at' => 'datetime',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function forumMessages()
    {
        return $this->hasMany(ForumMessage::class);
    }

    public function aiAggregates()
    {
        return $this->hasMany(AiAggregate::class);
    }
}
