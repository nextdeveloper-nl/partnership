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

        //  This is an alias function of salesCount
    public function sales_count($value)
    {
        return $this->salesCount($value);
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

        //  This is an alias function of visitorCount
    public function visitor_count($value)
    {
        return $this->visitorCount($value);
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

        //  This is an alias function of subscriptionCount
    public function subscription_count($value)
    {
        return $this->subscriptionCount($value);
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

        //  This is an alias function of productCount
    public function product_count($value)
    {
        return $this->productCount($value);
    }
    
    public function dateStart($date)
    {
        return $this->builder->where('date', '>=', $date);
    }

    public function dateEnd($date)
    {
        return $this->builder->where('date', '<=', $date);
    }

    //  This is an alias function of date
    public function date_start($value)
    {
        return $this->dateStart($value);
    }

    //  This is an alias function of date
    public function date_end($value)
    {
        return $this->dateEnd($value);
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

    public function partnershipAccountId($value)
    {
            $partnershipAccount = \NextDeveloper\Partnership\Database\Models\Accounts::where('uuid', $value)->first();

        if($partnershipAccount) {
            return $this->builder->where('partnership_account_id', '=', $partnershipAccount->id);
        }
    }

        //  This is an alias function of partnershipAccount
    public function partnership_account_id($value)
    {
        return $this->partnershipAccount($value);
    }
    
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
