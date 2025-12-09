<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'display_name',
        'email',
        'password',
        'google_id',
        'plan_type',
        'subscription_ends_at',
    ];

    protected $casts = [
        'subscription_ends_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function reportSnapshots()
    {
        return $this->hasMany(ReportSnapshot::class);
    }
}
