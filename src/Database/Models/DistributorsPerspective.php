<?php

namespace NextDeveloper\Partnership\Database\Models;

use NextDeveloper\Commons\Database\Traits\HasStates;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Partnership\Database\Observers\DistributorsPerspectiveObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * DistributorsPerspective model.
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
 * @property array $technical_capabilities
 * @property string $industry
 * @property array $sector_focus
 * @property array $special_interest
 * @property array $compliance_certifications
 * @property array $target_group
 * @property string $meeting_link
 */
class DistributorsPerspective extends Model
{
    use Filterable, UuidId, CleanCache, Taggable, HasStates;

    public $timestamps = false;

    protected $table = 'partnership_distributors_perspective';


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
            'technical_capabilities',
            'industry',
            'sector_focus',
            'special_interest',
            'compliance_certifications',
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
    'technical_capabilities' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'industry' => 'string',
    'sector_focus' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'special_interest' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
    'compliance_certifications' => \NextDeveloper\Commons\Database\Casts\TextArray::class,
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
        parent::observe(DistributorsPerspectiveObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('partnership.scopes.global');
        $modelScopes = config('partnership.scopes.partnership_distributors_perspective');

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
