<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class DistributionsPerspectiveQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function phoneNumber($value)
    {
        return $this->builder->where('phone_number', 'like', '%' . $value . '%');
    }
    
    public function description($value)
    {
        return $this->builder->where('description', 'like', '%' . $value . '%');
    }

    public function createdAtStart($date)
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdAtEnd($date)
    {
        return $this->builder->where('created_at', '<=', $date);
    }

    public function updatedAtStart($date)
    {
        return $this->builder->where('updated_at', '>=', $date);
    }

    public function updatedAtEnd($date)
    {
        return $this->builder->where('updated_at', '<=', $date);
    }

    public function commonDomainId($value)
    {
            $commonDomain = \NextDeveloper\Commons\Database\Models\Domains::where('uuid', $value)->first();

        if($commonDomain) {
            return $this->builder->where('common_domain_id', '=', $commonDomain->id);
        }
    }

    public function commonCountryId($value)
    {
            $commonCountry = \NextDeveloper\Commons\Database\Models\Countries::where('uuid', $value)->first();

        if($commonCountry) {
            return $this->builder->where('common_country_id', '=', $commonCountry->id);
        }
    }

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    public function iamAccountId($value)
    {
            $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }

    public function iamAccountTypeId($value)
    {
            $iamAccountType = \NextDeveloper\IAM\Database\Models\AccountTypes::where('uuid', $value)->first();

        if($iamAccountType) {
            return $this->builder->where('iam_account_type_id', '=', $iamAccountType->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
