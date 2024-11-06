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

        //  This is an alias function of partnerCode
    public function partner_code($value)
    {
        return $this->partnerCode($value);
    }
        
    public function iban($value)
    {
        return $this->builder->where('iban', 'like', '%' . $value . '%');
    }

        
    public function suspensionReason($value)
    {
        return $this->builder->where('suspension_reason', 'like', '%' . $value . '%');
    }

        //  This is an alias function of suspensionReason
    public function suspension_reason($value)
    {
        return $this->suspensionReason($value);
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
     
    public function isSuspended($value)
    {
        return $this->builder->where('is_suspended', $value);
    }

        //  This is an alias function of isSuspended
    public function is_suspended($value)
    {
        return $this->isSuspended($value);
    }
     
    public function isApproved($value)
    {
        return $this->builder->where('is_approved', $value);
    }

        //  This is an alias function of isApproved
    public function is_approved($value)
    {
        return $this->isApproved($value);
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

        //  This is an alias function of distributor
    public function distributor_id($value)
    {
        return $this->distributor($value);
    }
    
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
