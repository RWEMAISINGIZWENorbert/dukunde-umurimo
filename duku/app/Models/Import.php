<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $table = 'imports';
    protected $primaryKey = 'Import_Id';
    public $incrementing = true;

    protected $fillable = [
        'Food_Id',
        'Import_Quantity',
        'Import_Date'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'Food_Id', 'Food_Id');
    }
}
