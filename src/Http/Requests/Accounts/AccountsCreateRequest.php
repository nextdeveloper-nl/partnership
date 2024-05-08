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
            'distributor_id' => 'nullable|exists:iam_accounts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
