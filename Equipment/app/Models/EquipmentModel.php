<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requestment;

class EquipmentModel extends Model
{
    use HasFactory;

    protected $fillable =[
        'equipment',
        'model',
        'price'
    ];

    public function requestments()
{
    return $this->hasMany(Requestment::class, 'model', 'model');
}
}
