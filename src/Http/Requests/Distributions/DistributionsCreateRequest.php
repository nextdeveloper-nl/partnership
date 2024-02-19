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
            'is_active' => 'boolean',
        'is_suspended' => 'boolean',
        'is_draft' => 'boolean',
        'is_cross_promotion' => 'boolean',
        'is_bundling' => 'boolean',
        'is_reselling' => 'boolean',
        'is_co_selling' => 'boolean',
        'is_lead_account_mapping' => 'boolean',
        'is_licencing' => 'boolean',
        'is_supply_chain' => 'boolean',
        'is_shop_sharing' => 'boolean',
        'leo_engineer_count' => 'integer',
        'devops_engineer_count' => 'integer',
        'software_engineer_count' => 'integer',
        'sales_engineer_count' => 'integer',
        'description' => 'nullable|string',
        'terms' => 'nullable|string',
        'tags' => '',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}