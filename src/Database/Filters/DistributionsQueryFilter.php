<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class DistributionsQueryFilter extends AbstractQueryFilter
{
    /**
     * Filter by tags
     *
     * @param  $values
     * @return Builder
     */
    public function tags($values)
    {
        $tags = explode(',', $values);

        $search = '';

        for($i = 0; $i < count($tags); $i++) {
            $search .= "'" . trim($tags[$i]) . "',";
        }

        $search = substr($search, 0, -1);

        return $this->builder->whereRaw('tags @> ARRAY[' . $search . ']');
    }

    /**
     * @var Builder
     */
    protected $builder;
    
    public function description($value)
    {
        return $this->builder->where('description', 'like', '%' . $value . '%');
    }
    
    public function terms($value)
    {
        return $this->builder->where('terms', 'like', '%' . $value . '%');
    }

    public function leoEngineerCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('leo_engineer_count', $operator, $value);
    }

    public function devopsEngineerCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('devops_engineer_count', $operator, $value);
    }

    public function softwareEngineerCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('software_engineer_count', $operator, $value);
    }

    public function salesEngineerCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('sales_engineer_count', $operator, $value);
    }

    public function isActive()
    {
        return $this->builder->where('is_active', true);
    }

    public function isSuspended()
    {
        return $this->builder->where('is_suspended', true);
    }

    public function isDraft()
    {
        return $this->builder->where('is_draft', true);
    }

    public function isCrossPromotion()
    {
        return $this->builder->where('is_cross_promotion', true);
    }

    public function isBundling()
    {
        return $this->builder->where('is_bundling', true);
    }

    public function isReselling()
    {
        return $this->builder->where('is_reselling', true);
    }

    public function isCoSelling()
    {
        return $this->builder->where('is_co_selling', true);
    }

    public function isLeadAccountMapping()
    {
        return $this->builder->where('is_lead_account_mapping', true);
    }

    public function isLicencing()
    {
        return $this->builder->where('is_licencing', true);
    }

    public function isSupplyChain()
    {
        return $this->builder->where('is_supply_chain', true);
    }

    public function isShopSharing()
    {
        return $this->builder->where('is_shop_sharing', true);
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

    public function partnershipAccountId($value)
    {
            $partnershipAccount = \NextDeveloper\Partnership\Database\Models\Accounts::where('uuid', $value)->first();

        if($partnershipAccount) {
            return $this->builder->where('partnership_account_id', '=', $partnershipAccount->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE










}
