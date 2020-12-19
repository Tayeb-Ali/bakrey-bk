<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Bakery",
 *      required={"name", "user_id", "address", "status", "report_by"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
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
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="reason",
 *          description="reason",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="report_by",
 *          description="report_by",
 *          type="integer",
 *          format="int32"
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
class Bakery extends Model
{
    use SoftDeletes;

    public $table = 'bakeries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

//    protected $with = ['user', 'order'];
//    protected $with = ['user', 'order'];
    public $fillable = [
        'name',
        'user_id',
        'agency_id',
        'address',
        'status',
        'reason',
        'report_details',
        'type',
        'report_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer',
        'agency_id' => 'integer',
        'address' => 'string',
        'status' => 'boolean',
        'reason' => 'string',
        'type' => 'string',
        'report_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'user_id' => 'required|integer',
        'agency_id' => 'integer',
        'address' => 'required|string|max:191',
        'status' => 'boolean',
        'reason' => 'nullable|string',
        'type' => 'nullable|string|max:22',
        'report_by' => 'required|integer',
        'updated_at' => 'nullable',
        'created_at' => 'nullable'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agency()
    {
        return $this->belongsTo(User::class, 'agency_id');
    }

    public function report_by()
    {
        return $this->belongsTo(User::class, 'report_by');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'bakery_id', 'id');
    }
}
