<?php

namespace NextDeveloper\Partnership\Http\Requests\Stats;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class StatsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'partnership_account_id' => 'nullable|exists:partnership_accounts,uuid|uuid',
        'date' => 'nullable|date',
        'sales_count' => 'integer',
        'visitor_count' => 'integer',
        'customer_count' => 'integer',
        'subscription_count' => 'integer',
        'product_count' => 'integer',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}