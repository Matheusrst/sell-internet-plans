<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * model do Maintenance
 */
class Maintenance extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'title',
        'description',
        'scheduled_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
