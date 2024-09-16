<?php

namespace NextDeveloper\Partnership\Database\Models;

use NextDeveloper\Commons\Database\Traits\HasStates;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\AccountsPerspectiveObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * AccountsPerspective model.
 *
 * @package  NextDeveloper\Partnership\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property integer $iam_account_type_id
 * @property string $account_type
 * @property integer $common_domain_id
 * @property string $domain_name
 * @property integer $common_country_id
 * @property string $country_name
 * @property integer $iam_user_id
 * @property string $account_owner
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
 * @property array $technical_capabilities
 * @property string $industry
 * @property array $sector_focus
 * @property array $special_interest
 * @property array $compliance_certifications
 * @property boolean $is_reseller
 * @property boolean $is_integrator
 * @property boolean $is_distributor
 * @property boolean $is_vendor
 * @property boolean $is_affiliate
 * @property array $target_group
 * @property string $meeting_link
 */
class AccountsPerspective extends Model
{
    use Filterable, UuidId, CleanCache, Taggable, HasStates;

    public $timestamps = false;

    protected $table = 'partnership_accounts_perspective';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'description',
            'iam_account_type_id',
            'account_type',
            'common_domain_id',
            'domain_name',
            'common_country_id',
            'country_name',
            'iam_user_id',
            'account_owner',
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
            'technical_capabilities',
            'industry',
            'sector_focus',
            'special_interest',
            'compliance_certifications',
            'is_reseller',
            'is_integrator',
            'is_distributor',
            'is_vendor',
            'is_affiliate',
            'target_group',
            'meeting_link',
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
    'name' => 'string',
    'description' => 'string',
    'iam_account_type_id' => 'integer',
    'account_type' => 'string',
    'common_domain_id' => 'integer',
    'domain_name' => 'string',
    'common_country_id' => 'integer',
    'country_name' => 'string',
    'account_owner' => 'string',
    'partner_code' => 'string',
    'is_brand_ambassador' => 'boolean',
    'customer_count' => 'integer',
    'iban' => 'string',
    'level' => 'integer',
    'reward_points' => 'integer',
    'boosts' => 'array',
    'mystery_box' => 'array',
    'badges' => 'array',
    'technical_capabilities' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'industry' => 'string',
    'sector_focus' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'special_interest' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'compliance_certifications' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'is_reseller' => 'boolean',
    'is_integrator' => 'boolean',
    'is_distributor' => 'boolean',
    'is_vendor' => 'boolean',
    'is_affiliate' => 'boolean',
    'target_group' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'meeting_link' => 'string',
    ];

    /**
     We are casting data fields.
     *
     @var array
     */
    protected $dates = [

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
        parent::observe(AccountsPerspectiveObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_accounts_perspective');

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
