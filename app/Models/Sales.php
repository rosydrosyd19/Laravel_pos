<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sales
 * @package App\Models
 * @version July 17, 2019, 6:12 am UTC
 *
 * @property integer customer_id
 * @property integer item_id
 * @property integer total
 * @property integer jumlah
 */
class Sales extends Model
{
    use SoftDeletes;

    public $table = 'sales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customer_id',
        'item_id',
        'total',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'item_id' => 'integer',
        'total' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required',
        'item_id' => 'required',
        'total' => 'required',
        'jumlah' => 'required'
    ];

    public function customer()
   {
       return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
   }

   public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'user_id');
   }

   public function sales_detail()
   {
       return $this->hasMany(\App\Models\SalesDetail::class);
   }
}
