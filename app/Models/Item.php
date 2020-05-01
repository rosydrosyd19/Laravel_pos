<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models
 * @version June 21, 2019, 1:19 am UTC
 *
 * @property string name
 * @property float price
 * @property string description
 * @property string picture
 * @property integer stock
 * @property integer category_id
 */
class Item extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public $table = 'items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'price',
        'description',
        'picture',
        'stock',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'double',
        'description' => 'string',
        'picture' => 'string',
        'stock' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'category_id' => 'required'
    ];

    // public function category(){
    //     return $this->belongsTo('App\Models\Category');
    // }
    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function purchase_detail()
    {
        return $this->hasMany(\App\Models\PurchaseDetail::class);
    }
}
