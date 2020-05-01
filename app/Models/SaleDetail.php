<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SaleDetail
 * @package App\Models
 * @version July 18, 2019, 9:08 am UTC
 *
 * @property \App\Models\Item item
 * @property \App\Models\Sale sale
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer sale_id
 * @property integer item_id
 * @property integer qty
 * @property integer sub_total
 */
class SaleDetail extends Model
{
    use SoftDeletes;

    public $table = 'sale_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sale_id',
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
        'sale_id' => 'integer',
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
        'sale_id' => 'required',
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
    public function sale()
    {
        return $this->belongsTo(\App\Models\Sale::class, 'sale_id');
    }
}
