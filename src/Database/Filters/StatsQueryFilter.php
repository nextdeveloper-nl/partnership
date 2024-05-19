<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class StatsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

    public function salesCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('sales_count', $operator, $value);
    }

    public function visitorCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('visitor_count', $operator, $value);
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

    public function subscriptionCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('subscription_count', $operator, $value);
    }

    public function productCount($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('product_count', $operator, $value);
    }

    public function dateStart($date)
    {
        return $this->builder->where('date', '>=', $date);
    }

    public function dateEnd($date)
    {
        return $this->builder->where('date', '<=', $date);
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
