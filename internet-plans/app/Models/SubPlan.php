<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * model de sub-planos
 */
class SubPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id', 
        'name', 
        'price', 
        'speed', 
        'description'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
