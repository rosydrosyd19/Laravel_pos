<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PurchaseDetail
 * @package App\Models
 * @version July 12, 2019, 2:35 am UTC
 *
 * @property \App\Models\Item item
 * @property \App\Models\Purchase purchase
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer purchase_id
 * @property integer item_id
 * @property integer qty
 * @property integer sub_total
 */
class PurchaseDetail extends Model
{
    use SoftDeletes;

    public $table = 'purchase_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'purchase_id',
        'item_id',
        'qty',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_id' => 'integer',
        'item_id' => 'integer',
        'qty' => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'purchase_id' => 'required',
        'item_id' => 'required',
        'qty' => 'required',
        'sub_total' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class, 'item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function purchase()
    {
        return $this->belongsTo(\App\Models\Purchase::class, 'purchase_id');
    }
}