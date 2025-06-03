<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $primaryKey = 'Food_Id';
    public $incrementing = true;

    protected $fillable = [
        'Food_Name',
        'Food_OwnerName'
    ];

    public function imports()
    {
        return $this->hasMany(Import::class, 'Food_Id', 'Food_Id');
    }

    public function exports()
    {
        return $this->hasMany(Export::class, 'Food_Id', 'Food_Id');
    }
}
