<?php

namespace App\Repositories;

use App\Models\Bakery;
use App\Repositories\BaseRepository;

/**
 * Class BakeryRepository
 * @package App\Repositories
 * @version December 15, 2020, 11:24 am UTC
*/

class BakeryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'user_id',
        'address',
        'status',
        'reason',
        'type',
        'report_by'
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
        return Bakery::class;
    }
}
