<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Purchase
 * @package App\Models
 * @version July 3, 2019, 1:24 am UTC
 *
 * @property integer supplier_id
 * @property integer user_id
 * @property integer total
 */
class Purchase extends Model
{
    use SoftDeletes;

    public $table = 'purchases';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'supplier_id',
        'user_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'supplier_id' => 'integer',
        'user_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'supplier_id' => 'required',
        'user_id' => 'required',
        'total' => 'required',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
   public function supplier()
   {
       return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id');
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
   public function purchase_detail()
   {
       return $this->hasMany(\App\Models\PurchaseDetail::class);
   }
}
