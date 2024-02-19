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
            'is_active' => 'boolean',
        'is_suspended' => 'boolean',
        'is_draft' => 'boolean',
        'is_joint_product' => 'boolean',
        'is_integration' => 'boolean',
        'is_product_extension_merger' => 'boolean',
        'is_platform' => 'boolean',
        'is_outsourcing' => 'boolean',
        'is_joint_venture' => 'boolean',
        'is_joint_research' => 'boolean',
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