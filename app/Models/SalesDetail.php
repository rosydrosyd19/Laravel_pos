<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SalesDetail
 * @package App\Models
 * @version July 18, 2019, 7:52 am UTC
 *
 * @property \App\Models\Item item
 * @property \App\Models\Sale sales
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer sales_id
 * @property integer item_id
 * @property integer jumlah
 * @property integer total
 */
class SalesDetail extends Model
{
    use SoftDeletes;

    public $table = 'sales_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sales_id',
        'item_id',
        'jumlah',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sales_id' => 'integer',
        'item_id' => 'integer',
        'jumlah' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sales_id' => 'required',
        'item_id' => 'required',
        'jumlah' => 'required',
        'total' => 'required'
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
    public function sales()
    {
        return $this->belongsTo(\App\Models\Sale::class, 'sales_id');
    }
}
