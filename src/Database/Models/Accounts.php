<?php

namespace NextDeveloper\Partnership\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\AccountsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Accounts model.
 *
 * @package  NextDeveloper\Partnership\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property integer $iam_account_id
 * @property integer $distributor_id
 * @property string $partner_code
 * @property boolean $is_brand_ambassador
 * @property $payable_income
 * @property integer $customer_count
 * @property string $iban
 * @property integer $level
 * @property integer $reward_points
 * @property $boosts
 * @property $mystery_box
 * @property $badges
 * @property boolean $is_suspended
 * @property string $suspension_reason
 * @property boolean $is_approved
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Accounts extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'partnership_accounts';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'iam_account_id',
            'distributor_id',
            'partner_code',
            'is_brand_ambassador',
            'payable_income',
            'customer_count',
            'iban',
            'level',
            'reward_points',
            'boosts',
            'mystery_box',
            'badges',
            'is_suspended',
            'suspension_reason',
            'is_approved',
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
    'distributor_id' => 'integer',
    'partner_code' => 'string',
    'is_brand_ambassador' => 'boolean',
    'customer_count' => 'integer',
    'iban' => 'string',
    'level' => 'integer',
    'reward_points' => 'integer',
    'boosts' => 'array',
    'mystery_box' => 'array',
    'badges' => 'array',
    'is_suspended' => 'boolean',
    'suspension_reason' => 'string',
    'is_approved' => 'boolean',
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
        parent::observe(AccountsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_accounts');

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
