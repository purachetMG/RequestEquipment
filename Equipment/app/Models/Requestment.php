<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EquipmentModel;

class Requestment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'equipment',
        'model',
    ];

    public function equipmentmodel()
    {
        return $this->belongsTo(EquipmentModel::class, 'model', 'model');
    }
}
