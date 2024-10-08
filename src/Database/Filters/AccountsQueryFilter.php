<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class AccountsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function partnerCode($value)
    {
        return $this->builder->where('partner_code', 'like', '%' . $value . '%');
    }
    
    public function iban($value)
    {
        return $this->builder->where('iban', 'like', '%' . $value . '%');
    }
    
    public function suspensionReason($value)
    {
        return $this->builder->where('suspension_reason', 'like', '%' . $value . '%');
    }
    
    public function industry($value)
    {
        return $this->builder->where('industry', 'like', '%' . $value . '%');
    }
    
    public function meetingLink($value)
    {
        return $this->builder->where('meeting_link', 'like', '%' . $value . '%');
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

    public function isBrandAmbassador($value)
    {



        return $this->builder->where('is_brand_ambassador', $value);
    }

    public function isSuspended($value)
    {



        return $this->builder->where('is_suspended', $value);
    }

    public function isApproved($value)
    {



        return $this->builder->where('is_approved', $value);
    }

    public function isReseller($value)
    {



        return $this->builder->where('is_reseller', $value);
    }

    public function isIntegrator($value)
    {



        return $this->builder->where('is_integrator', $value);
    }

    public function isDistributor($value)
    {



        return $this->builder->where('is_distributor', $value);
    }

    public function isVendor($value)
    {



        return $this->builder->where('is_vendor', $value);
    }

    public function isAffiliate($value)
    {



        return $this->builder->where('is_affiliate', $value);
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

    public function deletedAtStart($date)
    {
        return $this->builder->where('deleted_at', '>=', $date);
    }

    public function deletedAtEnd($date)
    {
        return $this->builder->where('deleted_at', '<=', $date);
    }

    public function iamAccountId($value)
    {
            $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }

    public function distributorId($value)
    {
            $distributor = \NextDeveloper\Partnership\Database\Models\Accounts::where('uuid', $value)->first();

        if($distributor) {
            return $this->builder->where('distributor_id', '=', $distributor->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
