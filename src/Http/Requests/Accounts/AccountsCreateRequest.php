<?php

namespace NextDeveloper\Partnership\Http\Requests\Accounts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AccountsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'technical_capabilities' => 'nullable',
        'industry' => 'nullable|string',
        'sector_focus' => 'nullable',
        'special_interest' => 'nullable',
        'compliance_certifications' => 'nullable',
        'target_group' => 'nullable',
        'is_reseller' => 'boolean',
        'is_integrator' => 'boolean',
        'is_vendor' => 'boolean',
        'meeting_link' => 'nullable|string',
        'distributor_id' => 'nullable|exists:partnership_accounts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}