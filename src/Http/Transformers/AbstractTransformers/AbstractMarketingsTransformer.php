<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Marketings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class MarketingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractMarketingsTransformer extends AbstractTransformer
{

    /**
     * @param Marketings $model
     *
     * @return array
     */
    public function transform(Marketings $model)
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
            'is_affiliate'  =>  $model->is_affiliate,
            'is_content_marketing'  =>  $model->is_content_marketing,
            'is_co_branding'  =>  $model->is_co_branding,
            'is_co_marketing'  =>  $model->is_co_marketing,
            'is_sponsorship'  =>  $model->is_sponsorship,
            'is_incentive'  =>  $model->is_incentive,
            'is_referral'  =>  $model->is_referral,
            'incentive_percentage'  =>  $model->incentive_percentage,
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
