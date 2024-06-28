<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * model dos planos
     */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'base_price', 
        'base_speed'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function subPlans()
    {
        return $this->hasMany(SubPlan::class);
    }
}
