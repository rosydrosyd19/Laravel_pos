<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\BaseRepository;

/**
 * Class SaleRepository
 * @package App\Repositories
 * @version July 18, 2019, 9:02 am UTC
*/

class SaleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
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
        return Sale::class;
    }
}
