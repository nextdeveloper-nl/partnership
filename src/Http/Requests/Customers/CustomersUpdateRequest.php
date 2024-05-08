<?php

namespace NextDeveloper\Partnership\Http\Requests\Customers;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class CustomersUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'partner_account_id' => 'nullable|exists:partner_accounts,uuid|uuid',
        'is_active' => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}