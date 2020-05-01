<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version June 25, 2019, 7:05 am UTC
 *
 * @property string name
 * @property string email
 * @property string city
 * @property string address
 * @property string handphone
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'city',
        'address',
        'handphone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'city' => 'string',
        'address' => 'string',
        'handphone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'city' => 'required',
        'address' => 'required',
        'handphone' => 'required'
    ];

    
}
