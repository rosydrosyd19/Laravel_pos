<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 * @package App\Models
 * @version July 18, 2019, 9:02 am UTC
 *
 * @property integer customer_id
 * @property integer total
 */
class Sale extends Model
{
    use SoftDeletes;

    public $table = 'sales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customer_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required',
        'total' => 'required'
    ];

    public function customer()
   {
       return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
   public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'user_id');
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
   public function sale_detail()
   {
       return $this->hasMany(\App\Models\SaleDetail::class);
   }
}
