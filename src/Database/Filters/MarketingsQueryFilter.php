<?php

namespace NextDeveloper\Partnership\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class MarketingsQueryFilter extends AbstractQueryFilter
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

    public function isAffiliate()
    {
        return $this->builder->where('is_affiliate', true);
    }

    public function isContentMarketing()
    {
        return $this->builder->where('is_content_marketing', true);
    }

    public function isCoBranding()
    {
        return $this->builder->where('is_co_branding', true);
    }

    public function isCoMarketing()
    {
        return $this->builder->where('is_co_marketing', true);
    }

    public function isSponsorship()
    {
        return $this->builder->where('is_sponsorship', true);
    }

    public function isIncentive()
    {
        return $this->builder->where('is_incentive', true);
    }

    public function isReferral()
    {
        return $this->builder->where('is_referral', true);
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
