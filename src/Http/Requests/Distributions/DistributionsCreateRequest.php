<?php

namespace NextDeveloper\Partnership\Http\Requests\Distributions;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class DistributionsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'is_suspended' => 'boolean',
        'is_cross_promotion' => 'boolean',
        'is_bundling' => 'boolean',
        'is_reselling' => 'boolean',
        'is_co_selling' => 'boolean',
        'is_lead_account_mapping' => 'boolean',
        'is_licencing' => 'boolean',
        'is_supply_chain' => 'boolean',
        'is_shop_sharing' => 'boolean',
        'description' => 'nullable|string',
        'terms' => 'nullable|string',
        'tags' => '',
        'partner_id' => 'nullable|exists:iam_accounts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}