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
        'price',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
