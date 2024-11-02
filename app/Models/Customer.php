<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Customer
 *
 * @property int $idCustomer
 *
 * @property string $Model
 * @property string $Brand
 * @property string $Password
 */
class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory, Authenticatable;

    public $table = 'Customer';

    public $primaryKey = 'idCustomer';

    public $timestamps = false;

    public $fillable = [
        'Name',
        'Email',
        'Cellphone',
        'Password'
    ];

    /**
     * Return the Auth Password
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->Password;
    }
}
