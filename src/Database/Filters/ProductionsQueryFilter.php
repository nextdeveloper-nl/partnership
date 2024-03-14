<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
            

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class ProductionsQueryFilter extends AbstractQueryFilter
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

    public function isJointProduct()
    {
        return $this->builder->where('is_joint_product', true);
    }

    public function isIntegration()
    {
        return $this->builder->where('is_integration', true);
    }

    public function isProductExtensionMerger()
    {
        return $this->builder->where('is_product_extension_merger', true);
    }

    public function isPlatform()
    {
        return $this->builder->where('is_platform', true);
    }

    public function isOutsourcing()
    {
        return $this->builder->where('is_outsourcing', true);
    }

    public function isJointVenture()
    {
        return $this->builder->where('is_joint_venture', true);
    }

    public function isJointResearch()
    {
        return $this->builder->where('is_joint_research', true);
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

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    public function partnerId($value)
    {
            $partner = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($partner) {
            return $this->builder->where('partner_id', '=', $partner->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE



}
