<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @version June 25, 2019, 6:19 am UTC
 *
 * @property string name
 * @property string phone
 * @property string address
 * @property string email
 * @property boolean gender
 */
class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'gender'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'email' => 'string',
        'gender' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'phone' => 'required|max:13',
        'address' => 'required',
        'email' => 'email|unique:customers,email',
        'gender' => 'required'
    ];

    
}
