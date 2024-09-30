<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['contact_no', 'address', 'full_name', 'email', 'user_id'];

    /**
     * Define relationships, if any.
     */
    // Example: a ticket belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor for the created_at attribute to show a human-readable format.
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    /**
     * Scope to filter tickets by status.
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    /**
     * Scope to filter tickets by user.
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Example: Define mutators if needed.
     */
    // public function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = ucfirst($value);
    // }
}
