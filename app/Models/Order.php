<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Order",
 *      required={"quota", "status", "size", "qty", "total", "driver_id", "subtotal", "delivery_fees"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="request_on",
 *          description="request_on",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="arrival_on",
 *          description="arrival_on",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="quota",
 *          description="quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="agency_id",
 *          description="agency_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="size",
 *          description="size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty",
 *          description="qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total",
 *          description="total",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="driver_id",
 *          description="driver_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subtotal",
 *          description="subtotal",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="delivery_fees",
 *          description="delivery_fees",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public function setRequestOn($value)
    {

    }
//    protected $with = ['driver', 'user', 'agent', 'bakery'];// 'agent', 'bakery'];
//    protected $with = 'bakery';
    public $fillable = [
        'request_on',
        'arrival_on',
        'quota',
        'status',
        'user_id',
        'bakery_id',
        'agency_id',
        'size',
        'qty',
        'total',
        'driver_id',
        'subtotal',
        'delivery_fees'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'request_on' => 'date',
        'arrival_on' => 'date',
        'quota' => 'integer',
        'status' => 'integer',
        'bakery_id' => 'integer',
        'user_id' => 'integer',
        'agency_id' => 'integer',
        'size' => 'integer',
        'qty' => 'integer',
        'total' => 'float',
        'driver_id' => 'integer',
        'subtotal' => 'float',
        'delivery_fees' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'request_on' => 'nullable',
        'arrival_on' => 'nullable',
        'quota' => 'required|integer',
        'status' => 'nullable|integer',
        'bakery_id' => 'nullable|integer',
        'user_id' => 'nullable|integer',
        'agency_id' => 'nullable|integer',
        'size' => 'nullable|integer',
        'qty' => 'nullable|integer',
        'total' => 'nullable|numeric',
        'driver_id' => 'nullable|integer',
        'subtotal' => 'nullable|numeric',
        'delivery_fees' => 'nullable|numeric',
        'updated_at' => 'nullable',
        'created_at' => 'nullable'
    ];

    public function bakery()
    {
        return $this->belongsTo(Bakery::class, 'bakery_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agency_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

}
