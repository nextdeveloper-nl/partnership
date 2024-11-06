<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;


/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class AccountsPerspectiveQueryFilter extends AbstractQueryFilter
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

    public function distributor($value)
    {
        return $this->builder->where('distributor', 'like', '%' . $value . '%');
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

    public function iban($value)
    {
        return $this->builder->where('iban', 'like', '%' . $value . '%');
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

    public function customerCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('customer_count', $operator, $value);
    }

    //  This is an alias function of customerCount
    public function customer_count($value)
    {
        return $this->customerCount($value);
    }

    public function level($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('level', $operator, $value);
    }


    public function rewardPoints($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('reward_points', $operator, $value);
    }

    //  This is an alias function of rewardPoints
    public function reward_points($value)
    {
        return $this->rewardPoints($value);
    }

    public function isBrandAmbassador($value)
    {
        return $this->builder->where('is_brand_ambassador', $value);
    }

    //  This is an alias function of isBrandAmbassador
    public function is_brand_ambassador($value)
    {
        return $this->isBrandAmbassador($value);
    }

    public function isReseller($value)
    {
        return $this->builder->where('is_reseller', $value);
    }

    //  This is an alias function of isReseller
    public function is_reseller($value)
    {
        return $this->isReseller($value);
    }

    public function isIntegrator($value)
    {
        return $this->builder->where('is_integrator', $value);
    }

    //  This is an alias function of isIntegrator
    public function is_integrator($value)
    {
        return $this->isIntegrator($value);
    }

    public function isDistributor($value)
    {
        return $this->builder->where('is_distributor', $value);
    }

    //  This is an alias function of isDistributor
    public function is_distributor($value)
    {
        return $this->isDistributor($value);
    }

    public function isVendor($value)
    {
        return $this->builder->where('is_vendor', $value);
    }

    //  This is an alias function of isVendor
    public function is_vendor($value)
    {
        return $this->isVendor($value);
    }

    public function isAffiliate($value)
    {
        return $this->builder->where('is_affiliate', $value);
    }

    //  This is an alias function of isAffiliate
    public function is_affiliate($value)
    {
        return $this->isAffiliate($value);
    }

    public function createdAtStart($date)
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdAtEnd($date)
    {
        return $this->builder->where('created_at', '<=', $date);
    }

    //  This is an alias function of createdAt
    public function created_at_start($value)
    {
        return $this->createdAtStart($value);
    }

    //  This is an alias function of createdAt
    public function created_at_end($value)
    {
        return $this->createdAtEnd($value);
    }

    public function updatedAtStart($date)
    {
        return $this->builder->where('updated_at', '>=', $date);
    }

    public function updatedAtEnd($date)
    {
        return $this->builder->where('updated_at', '<=', $date);
    }

    //  This is an alias function of updatedAt
    public function updated_at_start($value)
    {
        return $this->updatedAtStart($value);
    }

    //  This is an alias function of updatedAt
    public function updated_at_end($value)
    {
        return $this->updatedAtEnd($value);
    }

    public function deletedAtStart($date)
    {
        return $this->builder->where('deleted_at', '>=', $date);
    }

    public function deletedAtEnd($date)
    {
        return $this->builder->where('deleted_at', '<=', $date);
    }

    //  This is an alias function of deletedAt
    public function deleted_at_start($value)
    {
        return $this->deletedAtStart($value);
    }

    //  This is an alias function of deletedAt
    public function deleted_at_end($value)
    {
        return $this->deletedAtEnd($value);
    }

    public function iamAccountId($value)
    {
        $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if ($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }


    public function iamAccountTypeId($value)
    {
        $iamAccountType = \NextDeveloper\IAM\Database\Models\AccountTypes::where('uuid', $value)->first();

        if ($iamAccountType) {
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

        if ($commonDomain) {
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

        if ($commonCountry) {
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

        if ($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }


    public function distributorId($value)
    {
        $distributor = \NextDeveloper\Partnership\Database\Models\Accounts::where('uuid', $value)->first();

        if ($distributor) {
            return $this->builder->where('distributor_id', '=', $distributor->id);
        }
    }

    //  This is an alias function of distributor
    public function distributor_id($value)
    {
        return $this->distributor($value);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
