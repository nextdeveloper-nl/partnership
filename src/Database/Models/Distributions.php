<?php

namespace NextDeveloper\Partnership\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\DistributionsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Distributions model.
 *
 * @package  NextDeveloper\Partnership\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property boolean $is_active
 * @property boolean $is_suspended
 * @property boolean $is_draft
 * @property boolean $is_cross_promotion
 * @property boolean $is_bundling
 * @property boolean $is_reselling
 * @property boolean $is_co_selling
 * @property boolean $is_lead_account_mapping
 * @property boolean $is_licencing
 * @property boolean $is_supply_chain
 * @property boolean $is_shop_sharing
 * @property integer $leo_engineer_count
 * @property integer $devops_engineer_count
 * @property integer $software_engineer_count
 * @property integer $sales_engineer_count
 * @property string $description
 * @property string $terms
 * @property array $tags
 * @property integer $partnership_account_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Distributions extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'partnership_distribution';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'is_active',
            'is_suspended',
            'is_draft',
            'is_cross_promotion',
            'is_bundling',
            'is_reselling',
            'is_co_selling',
            'is_lead_account_mapping',
            'is_licencing',
            'is_supply_chain',
            'is_shop_sharing',
            'leo_engineer_count',
            'devops_engineer_count',
            'software_engineer_count',
            'sales_engineer_count',
            'description',
            'terms',
            'tags',
            'partnership_account_id',
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
    'is_active' => 'boolean',
    'is_suspended' => 'boolean',
    'is_draft' => 'boolean',
    'is_cross_promotion' => 'boolean',
    'is_bundling' => 'boolean',
    'is_reselling' => 'boolean',
    'is_co_selling' => 'boolean',
    'is_lead_account_mapping' => 'boolean',
    'is_licencing' => 'boolean',
    'is_supply_chain' => 'boolean',
    'is_shop_sharing' => 'boolean',
    'leo_engineer_count' => 'integer',
    'devops_engineer_count' => 'integer',
    'software_engineer_count' => 'integer',
    'sales_engineer_count' => 'integer',
    'description' => 'string',
    'terms' => 'string',
    'tags' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'partnership_account_id' => 'integer',
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
        parent::observe(DistributionsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_distribution');

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
