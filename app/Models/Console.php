<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Console extends Model
{
    use HasFactory;

    public $table = 'Console';

    public $primaryKey = 'idConsole';

    public $timestamps = false;

    public $fillable = [
        'Model',
        'idBrand',
        'Price'
    ];

    public $casts = [
        'Price' => 'float'
    ];

    /**
     * Cria o relacionamento entre o modelo Console e o modelo Brand.
     *
     * @return HasOne
     */
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'idBrand', 'idBrand');
    }
}
