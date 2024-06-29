<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'sub_plan_id',
        'price',
        'speed'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function subPlan()
    {
        return $this->belongsTo(SubPlan::class, 'sub_plan_id');
    }
}
