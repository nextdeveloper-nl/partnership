<?php

namespace NextDeveloper\Partnership\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\ProductionsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Productions model.
 *
 * @package  NextDeveloper\Partnership\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property boolean $is_active
 * @property boolean $is_suspended
 * @property boolean $is_draft
 * @property boolean $is_joint_product
 * @property boolean $is_integration
 * @property boolean $is_product_extension_merger
 * @property boolean $is_platform
 * @property boolean $is_outsourcing
 * @property boolean $is_joint_venture
 * @property boolean $is_joint_research
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
class Productions extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'partnership_productions';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'is_active',
            'is_suspended',
            'is_draft',
            'is_joint_product',
            'is_integration',
            'is_product_extension_merger',
            'is_platform',
            'is_outsourcing',
            'is_joint_venture',
            'is_joint_research',
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
    'is_joint_product' => 'boolean',
    'is_integration' => 'boolean',
    'is_product_extension_merger' => 'boolean',
    'is_platform' => 'boolean',
    'is_outsourcing' => 'boolean',
    'is_joint_venture' => 'boolean',
    'is_joint_research' => 'boolean',
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
        parent::observe(ProductionsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_productions');

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
