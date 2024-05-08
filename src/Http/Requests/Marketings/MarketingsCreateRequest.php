<?php

namespace NextDeveloper\Partnership\Http\Requests\Marketings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class MarketingsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'is_suspended' => 'boolean',
        'is_affiliate' => 'boolean',
        'is_content_marketing' => 'boolean',
        'is_co_branding' => 'boolean',
        'is_co_marketing' => 'boolean',
        'is_sponsorship' => 'boolean',
        'is_incentive' => 'boolean',
        'is_referral' => 'boolean',
        'description' => 'nullable|string',
        'terms' => 'nullable|string',
        'tags' => '',
        'partnership_account_id' => 'required|exists:partnership_accounts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}