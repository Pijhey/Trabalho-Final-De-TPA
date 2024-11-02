<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    public $table = 'Brand';

    public $primaryKey = 'idBrand';

    public $timestamps = false;

    public $fillable = [
        'Name'
    ];
}
