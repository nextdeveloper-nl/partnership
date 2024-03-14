<?php

namespace NextDeveloper\Partnership\Http\Requests\Productions;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ProductionsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'is_suspended' => 'boolean',
        'is_joint_product' => 'boolean',
        'is_integration' => 'boolean',
        'is_product_extension_merger' => 'boolean',
        'is_platform' => 'boolean',
        'is_outsourcing' => 'boolean',
        'is_joint_venture' => 'boolean',
        'is_joint_research' => 'boolean',
        'description' => 'nullable|string',
        'terms' => 'nullable|string',
        'tags' => '',
        'partner_id' => 'nullable|exists:iam_accounts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}