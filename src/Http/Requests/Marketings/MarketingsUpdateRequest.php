<?php

namespace NextDeveloper\Partnership\Http\Requests\Marketings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class MarketingsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'is_active' => 'boolean',
        'is_suspended' => 'boolean',
        'is_draft' => 'boolean',
        'is_affiliate' => 'boolean',
        'is_content_marketing' => 'boolean',
        'is_co_branding' => 'boolean',
        'is_co_marketing' => 'boolean',
        'is_sponsorship' => 'boolean',
        'is_incentive' => 'boolean',
        'is_referral' => 'boolean',
        'incentive_percentage' => '',
        'description' => 'nullable|string',
        'terms' => 'nullable|string',
        'tags' => '',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}