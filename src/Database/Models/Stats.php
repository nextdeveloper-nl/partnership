<?php

namespace NextDeveloper\Partnership\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\StatsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Stats model.
 *
 * @package  NextDeveloper\Partnership\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property integer $partnership_account_id
 * @property \Carbon\Carbon $date
 * @property integer $sales_count
 * @property integer $visitor_count
 * @property integer $customer_count
 * @property integer $subscription_count
 * @property integer $product_count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Stats extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'partnership_stats';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'partnership_account_id',
            'date',
            'sales_count',
            'visitor_count',
            'customer_count',
            'subscription_count',
            'product_count',
    ];

    /**
      Here we have the fulltext fields. We can use these for fulltext search if enabled.
     */
    protected $fullTextFields = [

    ];

    /**
     @var array
     */
    protected $appends = [

    ];

    /**
     We are casting fields to objects so that we can work on them better
     *
     @var array
     */
    protected $casts = [
    'id' => 'integer',
    'partnership_account_id' => 'integer',
    'date' => 'datetime',
    'sales_count' => 'integer',
    'visitor_count' => 'integer',
    'customer_count' => 'integer',
    'subscription_count' => 'integer',
    'product_count' => 'integer',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
    ];

    /**
     We are casting data fields.
     *
     @var array
     */
    protected $dates = [
    'date',
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    /**
     @var array
     */
    protected $with = [

    ];

    /**
     @var int
     */
    protected $perPage = 20;

    /**
     @return void
     */
    public static function boot()
    {
        parent::boot();

        //  We create and add Observer even if we wont use it.
        parent::observe(StatsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_stats');

        if(!$modelScopes) { $modelScopes = [];
        }
        if (!$globalScopes) { $globalScopes = [];
        }

        $scopes = array_merge(
            $globalScopes,
            $modelScopes
        );

        if($scopes) {
            foreach ($scopes as $scope) {
                static::addGlobalScope(app($scope));
            }
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
