<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Accounts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AccountsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractAccountsTransformer extends AbstractTransformer
{

    /**
     * @param Accounts $model
     *
     * @return array
     */
    public function transform(Accounts $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $distributorId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->distributor_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'distributor_id'  =>  $distributorId ? $distributorId->uuid : null,
            'partner_code'  =>  $model->partner_code,
            'is_brand_ambassador'  =>  $model->is_brand_ambassador,
            'payable_income'  =>  $model->payable_income,
            'customer_count'  =>  $model->customer_count,
            'iban'  =>  $model->iban,
            'level'  =>  $model->level,
            'reward_points'  =>  $model->reward_points,
            'boosts'  =>  $model->boosts,
            'mystery_box'  =>  $model->mystery_box,
            'badges'  =>  $model->badges,
            'is_suspended'  =>  $model->is_suspended,
            'suspension_reason'  =>  $model->suspension_reason,
            'is_approved'  =>  $model->is_approved,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
