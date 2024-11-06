<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class DistributorsPerspectiveQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }

        
    public function description($value)
    {
        return $this->builder->where('description', 'like', '%' . $value . '%');
    }

        
    public function accountType($value)
    {
        return $this->builder->where('account_type', 'like', '%' . $value . '%');
    }

        //  This is an alias function of accountType
    public function account_type($value)
    {
        return $this->accountType($value);
    }
        
    public function domainName($value)
    {
        return $this->builder->where('domain_name', 'like', '%' . $value . '%');
    }

        //  This is an alias function of domainName
    public function domain_name($value)
    {
        return $this->domainName($value);
    }
        
    public function countryName($value)
    {
        return $this->builder->where('country_name', 'like', '%' . $value . '%');
    }

        //  This is an alias function of countryName
    public function country_name($value)
    {
        return $this->countryName($value);
    }
        
    public function accountOwner($value)
    {
        return $this->builder->where('account_owner', 'like', '%' . $value . '%');
    }

        //  This is an alias function of accountOwner
    public function account_owner($value)
    {
        return $this->accountOwner($value);
    }
        
    public function partnerCode($value)
    {
        return $this->builder->where('partner_code', 'like', '%' . $value . '%');
    }

        //  This is an alias function of partnerCode
    public function partner_code($value)
    {
        return $this->partnerCode($value);
    }
        
    public function industry($value)
    {
        return $this->builder->where('industry', 'like', '%' . $value . '%');
    }

        
    public function meetingLink($value)
    {
        return $this->builder->where('meeting_link', 'like', '%' . $value . '%');
    }

        //  This is an alias function of meetingLink
    public function meeting_link($value)
    {
        return $this->meetingLink($value);
    }
    
    public function iamAccountTypeId($value)
    {
            $iamAccountType = \NextDeveloper\IAM\Database\Models\AccountTypes::where('uuid', $value)->first();

        if($iamAccountType) {
            return $this->builder->where('iam_account_type_id', '=', $iamAccountType->id);
        }
    }

        //  This is an alias function of iamAccountType
    public function iam_account_type_id($value)
    {
        return $this->iamAccountType($value);
    }
    
    public function commonDomainId($value)
    {
            $commonDomain = \NextDeveloper\Commons\Database\Models\Domains::where('uuid', $value)->first();

        if($commonDomain) {
            return $this->builder->where('common_domain_id', '=', $commonDomain->id);
        }
    }

        //  This is an alias function of commonDomain
    public function common_domain_id($value)
    {
        return $this->commonDomain($value);
    }
    
    public function commonCountryId($value)
    {
            $commonCountry = \NextDeveloper\Commons\Database\Models\Countries::where('uuid', $value)->first();

        if($commonCountry) {
            return $this->builder->where('common_country_id', '=', $commonCountry->id);
        }
    }

        //  This is an alias function of commonCountry
    public function common_country_id($value)
    {
        return $this->commonCountry($value);
    }
    
    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
