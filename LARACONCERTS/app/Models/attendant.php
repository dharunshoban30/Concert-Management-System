<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concert_name', 'full_name', 'email', 'contact_no', 'address',
    ];

    /**
     * Get the listing associated with the attendant.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'title');
    }
}

