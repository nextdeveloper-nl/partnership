<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Productions;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class ProductionsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractProductionsTransformer extends AbstractTransformer
{

    /**
     * @param Productions $model
     *
     * @return array
     */
    public function transform(Productions $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                    $partnerId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->partner_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'is_active'  =>  $model->is_active,
            'is_suspended'  =>  $model->is_suspended,
            'is_draft'  =>  $model->is_draft,
            'is_joint_product'  =>  $model->is_joint_product,
            'is_integration'  =>  $model->is_integration,
            'is_product_extension_merger'  =>  $model->is_product_extension_merger,
            'is_platform'  =>  $model->is_platform,
            'is_outsourcing'  =>  $model->is_outsourcing,
            'is_joint_venture'  =>  $model->is_joint_venture,
            'is_joint_research'  =>  $model->is_joint_research,
            'leo_engineer_count'  =>  $model->leo_engineer_count,
            'devops_engineer_count'  =>  $model->devops_engineer_count,
            'software_engineer_count'  =>  $model->software_engineer_count,
            'sales_engineer_count'  =>  $model->sales_engineer_count,
            'description'  =>  $model->description,
            'terms'  =>  $model->terms,
            'tags'  =>  $model->tags,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            'partner_id'  =>  $partnerId ? $partnerId->uuid : null,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




}
