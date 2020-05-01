<?php

namespace App\Repositories;

use App\Models\Purchase;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseRepository
 * @package App\Repositories
 * @version July 3, 2019, 1:24 am UTC
*/

class PurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'supplier_id',
        'user_id',
        'total'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purchase::class;
    }
}
