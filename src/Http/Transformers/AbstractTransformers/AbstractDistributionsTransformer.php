<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Distributions;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class DistributionsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractDistributionsTransformer extends AbstractTransformer
{

    /**
     * @param Distributions $model
     *
     * @return array
     */
    public function transform(Distributions $model)
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
            'is_cross_promotion'  =>  $model->is_cross_promotion,
            'is_bundling'  =>  $model->is_bundling,
            'is_reselling'  =>  $model->is_reselling,
            'is_co_selling'  =>  $model->is_co_selling,
            'is_lead_account_mapping'  =>  $model->is_lead_account_mapping,
            'is_licencing'  =>  $model->is_licencing,
            'is_supply_chain'  =>  $model->is_supply_chain,
            'is_shop_sharing'  =>  $model->is_shop_sharing,
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
