<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;

    protected $table = 'exports';
    protected $primaryKey = 'E_Id';
    public $incrementing = true;

    protected $fillable = [
        'Food_Id',
        'Quantity',
        'ExportDate'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'Food_Id', 'Food_Id');
    }
}
